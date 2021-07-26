<template>
  <div class="container">
    <form @submit.prevent="avancedSearch">
      <div class="mb-3">
        <label for="beds">Numero di Ospiti</label>
        <input
          type="number"
          class="form-control"
          id="beds"
          placeholder="beds"
          v-model="filterBeds"
        />
      </div>
      <div class="form-group">
        <label>Servizi</label>
        <div class="form-check form-check-inline">
          <label  v-for="service in this.servicesList" :key="service.id" class="form-check-label">
            <input
              name="services[]"
              class="form-check-input"
              type="checkbox"
              :value="service.id"
              v-model="filterServices"
            />
            {{service.name}}
          </label>
        </div>
      </div>
      <button type="submit" class="btn btn-primary">Filtra</button>
    </form>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div v-for="result in this.filterResults" :key="result.id">
          <h3>{{ result.name }}</h3>
          <h4>{{ result.beds }}</h4>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
<<<<<<< HEAD
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
      filterResults: [],
      servicesList: [],
      matchingStructures: [],
      requestUrl: "",
       filters: {
                filterBeds: null,
                filterServices: null,
            },
    };
  },
  computed: {},
  methods: {
    avancedSearch() {
    // this.filterResults = this.results.filter(
    //     (el) => el.beds >= this.filterBeds); 
=======
   export default {
    name: "GuestSearch",
    props: {
        name: Object,
    },
       data() {
        return {
            search: this.name,
            results : [],
            filterBeds: "",
            filterResults: [],
        };
    },
    computed: {
    },
    methods: {
>>>>>>> 566fe4b3244553d1cf9c8670de442e08dc0e8387

    // this.filterResults.forEach(element => {
    //     console.log(element)


    let params = new URLSearchParams(this.filters).toString();

    axios
    .get(this.url + params)
    .then((resp) => {
        this.matchingStructures = resp.data.results;
    })
    .catch((er) => {
    console.error(er);
    alert("Errore in fase di filtraggio dati.");
    });    

    //ELEMENT OVVERO LE STRUTTURE CON NUMERO DI LETTI SELEZIONATI IN REALTA' NON HANNO UNA CHIAVE "SERVIZI" POICHE' LA RELAZIONE ESISTE IN PHP MA NON IN JS (al momento)
    //SUGGERISCO DI PENSARE AD UN MODO PER INTERROGARE NUOVAMENTE L'API

    //mi salverei l'url della prima ricerca in una varialbile, poi passerei i vuovi filtri alla api che gestirà tutti i campi es:
        // let params = new URLSearchParams(this.filters).toString();



    // if(element.services.some(r=> selectedServices.indexOf(r) >= 0)){
    //     element.push(matchingStructures)
    // }    
    }

  },
  mounted() {
    let params = new URLSearchParams(this.search).toString();
    axios
    .get("/api/structures/services")
    .then((resp) => {
    this.servicesList = resp.data.results;
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
        this.filterResults = resp.data.results;
          this.matchingStructures = resp.data.results;
      })
      .catch((er) => {
          console.error(er);
        alert("Errore in fase di filtraggio dati.");
      });

  },
};
</script>