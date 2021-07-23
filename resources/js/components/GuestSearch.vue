<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- <text-input
                    label="Titolo"
                    v-model="filters.name"
                ></text-input> -->
                <h1>Ricerca: {{name}}</h1>
                <div v-for="result in results" :key="result.id">
                    <h3>{{result.name}}</h3>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
   export default {
    name: "GuestSearch",
    props: {
        name: String,
    },
       data() {
        return {
            results: [],
            structures: [],
            filter: {
                name: this.name,
            }
        };
    },
    computed: {
    },
    mounted() {
        axios
            get("/api/structures/filter", {
                params: this.filter
            })
            .then((resp) => {
                this.structures = resp.data;
            })
            .catch(er => {
                console.error(er);
                alert("Errore in fase di filtraggio dati.");
            });
    }
}
</script>