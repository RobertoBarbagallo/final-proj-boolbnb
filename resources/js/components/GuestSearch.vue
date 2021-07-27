<template>
  <div class="container">
    <form>
      <div class="mb-3">
        <label for="beds">Numero di Ospiti</label>
        <input
          @input="upgradeFunction()"
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
            
          />
          {{service.name}}
        </label>
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
      <div  v-else-if="this.filterServicesExist && this.upgrade == false" class="col-md-8">
        <div v-for="result in this.matchingStructures" :key="result.id" class="my-3">
          <h3>{{ result.name }}</h3>
          <h4>{{ result.beds }}</h4>
        </div>
      </div>
      <div  v-else class="col-md-8">
        <div v-for="result in this.doubleFilteredArray" :key="result.id" class="my-3">
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
    lat: Number,
    lng: Number
  },
  data() {
    return {
      latitude: this.lat,
      longitude: this.lng,
      results: [],
      upgrade: false,
      filterResults: [],
      servicesList: [],
      requestUrl: "",
      filterServicesExist: false,
      matchingStructures: [],
      filterResultsIds: [],
      matchingStructuresIds: [],
      doubleFilteredArrayIds: [],
      doubleFilteredArray: [],
      finalArrayToPrint: [],
      filterBeds: 1,
      filters: {
        filterServices: [],
      },
    };
  },
  computed: {},
  methods: {
    upgradeFunction() {
      this.filterResults = [];
      this.finalArrayToPrint = [];

      if (this.filterBeds > 1) {
        this.upgrade = true;
      } else {
        this.upgrade = false;
      }

      if (this.matchingStructures.length > 0) {
        this.results.forEach((value) => {
          if (value.beds >= this.filterBeds) {
            this.filterResults.push(value);
            this.finalArrayToPrint.push(value);
          }
        });
        this.controlValues();
      } else {
        this.results.forEach((value) => {
          if (value.beds >= this.filterBeds) {
            this.filterResults.push(value);
            this.finalArrayToPrint.push(value);
          }
        });
      }
    },

    avancedSearch(event) {
      if (event.target.checked) {
        this.filters.filterServices.push(event.target.value);
      } else if (!event.target.checked) {
        const index = this.filters.filterServices.indexOf(event.target.value);
        if (index > -1) {
          this.filters.filterServices.splice(index, 1);
        }
      }
      this.matchingStructures = [];
      this.finalArrayToPrint = [];

      let params = new URLSearchParams(this.filters).toString();
      this.filterServicesExist = true;
      axios
        .get(this.requestUrl + "&" + params)
        .then((resp) => {
          if (this.filters.filterServices.length > 0) {
            this.matchingStructures = resp.data.lastFilteredData;
            this.finalArrayToPrint = this.matchingStructures;
            this.controlValues();
          } else {
            this.matchingStructures = resp.data.results;
            this.finalArrayToPrint = this.matchingStructures;
          }
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
    },

    objects_to_array_of_id(array) {
      let resultArray = [];
      array.forEach((element) => {
        resultArray.push(element.id);
      });
      return resultArray;
    },

    controlValues() {
      if (this.upgrade && this.filterServicesExist) {
        this.finalArrayToPrint = [];
        this.doubleFilteredArrayIds = [];
        this.filterResultsIds = [];
        this.doubleFilteredArray = [];
        this.filterResultsIds = this.objects_to_array_of_id(this.filterResults);
        this.matchingStructuresIds = [];
        this.matchingStructuresIds = this.objects_to_array_of_id(
          this.matchingStructures
        );
        this.doubleFilteredArrayIds = this.intersect_safe(
          this.filterResultsIds,
          this.matchingStructuresIds
        );
        this.results.forEach((element) => {
          if (this.doubleFilteredArrayIds.includes(element.id)) {
            this.doubleFilteredArray.push(element);
            this.finalArrayToPrint.push(element);
          }
        });
      }
    },

    intersect_safe(a, b) {
      var ai = 0,
        bi = 0;
      var result = [];
      while (ai < a.length && bi < b.length) {
        if (a[ai] < b[bi]) {
          ai++;
        } else if (a[ai] > b[bi]) {
          bi++;
        } /* they're equal */ else {
          result.push(a[ai]);
          ai++;
          bi++;
        }
      }
      return result;
    },
  },

  mounted() {
    console.log(this.latitude);
    console.log(this.longitude);
    // let params = new URLSearchParams(this.search).toString();
    // axios
    // .get("/api/structures/services")
    // .then((resp) => {
    // this.servicesList = resp.data.results;
    // })
    // .catch((er) => {
    // console.error(er);
    // alert("Errore in fase di filtraggio dati.");
    // });

    // axios
    //   .get("/api/structures/filter?" + params)
    //   .then((resp) => {
    //     this.requestUrl = resp.data.url  
    //     this.results = resp.data.results;
    //   })
    //   .catch((er) => {
    //       console.error(er);
    //     alert("Errore in fase di filtraggio dati.");
    //   });

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
        this.requestUrl = resp.data.url;
        this.results = resp.data.results;
      })
      .catch((er) => {
        console.error(er);
        alert("Errore in fase di filtraggio dati.");
      });
  },
};
</script>