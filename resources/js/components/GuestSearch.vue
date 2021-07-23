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
        <button type="submit" class="btn btn-primary">Filtra</button>
      </form>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div v-for="result in this.filterResults" :key="result.id">
                    <h3>{{result.name}}</h3>
                    <h4>{{result.beds}}</h4>

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
            results : [],
            filterBeds: "",
            filterResults: [],
        };
    },
    computed: {
    },
    methods: {

        avancedSearch(){
            return  this.filterResults = this.results.filter((el)=>el.beds > this.filterBeds)
        }

    },
    mounted() {
    let params = new URLSearchParams(this.search).toString()
       axios
                .get("/api/structures/filter?" + params)
                .then(resp => {
                    this.results = resp.data.results;
                    this.filterResults = resp.data.results;
                })
                .catch(er => {
                    console.error(er);
                    alert("Errore in fase di filtraggio dati.");
                    
                });
        },
};
</script>