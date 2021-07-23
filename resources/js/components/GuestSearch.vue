<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{name}}</h1>
                <h3>{{this.name}}</h3>
                <div v-for="result in results" :key="result.id">
                    <h3>{{result.name}}</h3>
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
        name: String,
    },
       data() {
        return {
            results: [],
            name: this.name
        };
    },
    computed: {
    },
    mounted() {
    this.results = []
       axios
                .get("/api/structures/filter", {
                    params: this.name
                })
                .then(resp => {
                    this.results = resp.data.results;
                })
                .catch(er => {
                    console.error(er);
                    alert("Errore in fase di filtraggio dati.");
                });
        },
};
</script>