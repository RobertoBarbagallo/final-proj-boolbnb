<template>
  <div class="container">
    <form>
      <div class="mb-3">
          <label for="town">Città</label>
          <input
            @keyup.enter="avancedSearch()"
            type="text"
            class="form-control"
            id="town"
            v-model="filters.town"
            required
          />
      </div>
      <div class="mb-3">
        <label for="beds">Numero di Ospiti</label>
        <input
          @input="avancedSearch()"
          type="number"
          class="form-control"
          id="beds"
          placeholder="beds"
          v-model="filterBeds"
        />
      </div>
      <label>Servizi</label>
      <div class="form-check row mb-3">
        <label  v-for="service in this.servicesList" :key="service.id" class="form-check-label col-3 mb-1">
          <input
            @change="avancedSearch($event)"
            name="services[]"
            class="form-check-input"
            type="checkbox"
            :value="service.id"  
            v-model="marksArray"
          />
          {{service.name}}
        </label>
      </div>
       <div class="mb-3">
        <label for="radius">Distanza</label>
        <input type="range" class="custom-range" min="5000" max="200000" id="radius"
        :value= this.filters.radius
        @change="avancedSearch($event.target.value)"
        >     
      </div>
    </form>
    <structures-sponsored></structures-sponsored>
     <div class="card-deck">
            <div v-for="result in this.showArray" :key="result.id" class="card mycard my-4">
                <img v-if="result.cover_img_path" class="card-img-top myimg" :src="`asset(storage/ ${result.cover_img_path})`" alt="Cover of structure">
                <div class="card-body">
                    <h5 class="mt-0">{{result.name}}</h5>
                </div>
                <div class="card-footer text-center">
                    <a class="btn btn-outline-primary my-1" :href="`http://127.0.0.1:8000/details?slug=${result.slug}&contactedStructure=0`" role="button">Dettagli...</a><br>
                </div>
            </div>
        </div>
 </div>
</template>
<script>
import StructuresSponsored from './StructuresSponsored.vue';
import axios from "axios";
import { EventBus } from './bus.js';
export default {
  name: "GuestSearch",
  components: {
    StructuresSponsored
  },
  props: {
    finalarray: Array,
    oldtown: String,
    oldradius: String,
    latitude: String,
    longitude: String,
    fromwelcomepage: Boolean,

  },
  data() {
    return {
      fromWichPage: this.fromwelcomepage,
      lat: parseFloat(this.latitude),
      lng: parseFloat(this.longitude),
      emptyObj: {},
      marksArray: [],
      showArray: this.finalarray,
      servicesList: [],
      filterBeds: 1,
      curretTown: "",
      filters: {
        filterServices: [],
        town: "",
        radius: 20000,
      },
    };
  },
  computed: {},
  methods: {
    avancedSearch(arg) {
      if(this.curretTown != this.filters.town){
         this.filters.radius = 20000
         this.filters.filterServices = []
         this.marksArray =[]
      }
      if(arg){
        if(typeof arg == 'string'){
          this.filters.radius = parseInt(arg)
        }
        if(typeof arg == 'object'){
          if (arg.target.checked) {
            this.filters.filterServices.push(arg.target.value);
          } else if (!arg.target.checked) {
            const index = this.filters.filterServices.indexOf(arg.target.value);
            if (index > -1) {
              this.filters.filterServices.splice(index, 1);
            }
          }
        }
      }
      this.emptyObj = {}
      let params = {
        town: this.filters.town,
        radius: this.filters.radius,
        filterservices: this.filters.filterServices,
        fromguestsearch: true,
        beds: this.filterBeds,
      }
      params = new URLSearchParams(params)
      this.filterServicesExist = true;
      axios
        .get("/api/structures/search/?" + params.toString())
        .then((resp) => {
            this.showArray = resp.data.finalArray,
            this.mytest = resp.data.test,
            this.emptyObj ={
              array: this.showArray,
              lat: resp.data.lat,
              lng: resp.data.lng,

            }
            EventBus.$emit('reloadMap', this.emptyObj);
        })
        .catch((er) => {
          console.error(er);
          alert(
            "Le strutture per la città selezionata non includono i servizi richiesti"
          );
        });
      if (this.filters.filterServices.length < 1) {
        this.filterServicesExist = false;
      }
    this.curretTown = this.filters.town
    },
  },
  mounted() {
    this.filters.town= this.oldtown
    axios
      .get("/api/structures/services")
      .then((resp) => {
        this.servicesList = resp.data.results;
      })
      .catch((er) => {
        console.error(er);
        alert("Errore in fase di filtraggio dati.");
      });
  },
};
</script>