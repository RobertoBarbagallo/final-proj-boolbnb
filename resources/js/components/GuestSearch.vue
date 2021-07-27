<template>
  <div class="container">
    <form >
      <div class="mb-3">
        <label for="beds">Numero di Ospiti</label>
        <input
          @input="upgradeFunction()"
          type="number"
          class="form-control"
          id="beds"
          placeholder="beds"
          v-model="filters.filterBeds"
        />
      </div>

      <label>Servizi</label>
      <div class="form-check row mb-3">
        <label  v-for="service in this.servicesList" :key="service.id" class="form-check-label col-3 mb-1">
          <input
            @change="avancedSearch()"
            name="services[]"
            class="form-check-input"
            type="checkbox"
            :value="service.id"
            v-model.lazy="filters.filterServices"
          />
          {{service.name}}
        </label>
      </div>
      <div class="row justify-content-center">
        <button type="submit" class="btn btn-primary">Filtra</button>
      </div>
    </form>
    <div class="row justify-content-center">
      <div v-if="this.filterServicesExist == false && this.upgrade == false" class="col-md-8">
        <div v-for="result in this.results" :key="result.id" class="my-3">
          <h3>{{ result.name }}</h3>
          <h4>{{ result.beds }}</h4>
        </div>
      </div>
       <div v-else-if="this.filterServicesExist == false && this.upgrade" class="col-md-8">
        <div v-for="result in this.filterResults" :key="result.id" class="my-3">
          <h3>{{ result.name }}</h3>
          <h4>{{ result.beds }}</h4>
        </div>
      </div>
      <div v-else-if="this.filterServicesExist && this.upgrade == false" class="col-md-8">
        <div v-for="result in this.matchingStructures" :key="result.id" class="my-3">
          <h3>{{ result.name }}</h3>
          <h4>{{ result.beds }}</h4>
        </div>
      </div>
      <div v-else-if="this.filterServicesExist && this.upgrade" class="col-md-8">
        <div v-for="result in this.matchhingStructuresFiltered" :key="result.id" class="my-3">
          <h3>{{ result.name }}</h3>
          <h4>{{ result.beds }}</h4>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "GuestSearch",
  props: {
    name: Object,
  },
  data() {
    return {
      search: this.name,
      results: [],
      upgrade: false,
      filterResults: [],
      servicesList: [],
      matchingStructures: [],
      matchhingStructuresFiltered: [],
      requestUrl: "",
      filterServicesExist: false,     
       filters: {
                filterBeds: null,
                filterServices: [],
            },
    };
  },
  computed: {},
  methods: {
    upgradeFunction(){
      this.upgrade = true;
      this.filterResults =[];

      if(this.matchingStructures.length>0){
         this.matchingStructures.forEach((value) => {
          if(value.beds >= this.filters.filterBeds){
            this.matchhingStructuresFiltered.push(value);
          }
        })
      }else{
        this.results.forEach((value) => {
          if(value.beds >= this.filters.filterBeds){
            this.filterResults.push(value);
          }
        })

      }

    
    },
    avancedSearch() {  
    let params = new URLSearchParams(this.filters).toString();

if(this.filters.filterServices.length > 0){
  this.filterServicesExist = true
  axios
  .get(this.requestUrl + "&" + params)
  .then((resp) => {
      this.matchingStructures = resp.data.lastFilteredData
  })
  .catch((er) => {
  console.error(er);
  alert("Le strutture per la città selezionata non includono i servizi richiesti");
  });      
  }

}

  },
  mounted() {
    this.upgrade = false
    let params = new URLSearchParams(this.search).toString();

    axios
    .get("/api/structures/services")
    .then((resp) => {
    this.servicesList = resp.data.results;
    console.log(resp.data.results)
    })
    .catch((er) => {
    console.error(er);
    alert("Errore in fase di filtraggio dati.");
    });

    axios
      .get("/api/structures/filter?" + params)
      .then((resp) => {
        this.requestUrl = resp.data.url  
        this.results = resp.data.results;
        // this.filterResults = resp.data.results;
      })
      .catch((er) => {
          console.error(er);
        alert("Errore in fase di filtraggio dati.");
      });

  }
}
</script>