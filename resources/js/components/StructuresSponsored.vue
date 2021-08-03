<template>
  <div class="container">
    <div class="position-relative">
      <div class="btn-row row d-flex justify-content-center align-items-center">
        <h1>Suggerimenti</h1>
      </div>
      <div onclick="prev()" class="control-prev-btn">
        <i class="fas fa-arrow-left"> < </i>
      </div>
      <div
        id="slider-container"
        class="slider container d-flex  "
      >
        <div
          class="slide mycard m-4"
          v-for="structure in this.StructuresSponsored"
          :key="structure.id"
        >
          <div class="mycard-img-container p-3">
            <img
              class="immagine"
              :src="`storage/${structure.cover_img_path}`"
              alt="Cover of structure"
            />
          </div>
          <div class="card-body">
            <h5 class="mt-0">{{ structure.name }}</h5>
          </div>
          <div class="card-footer text-center">
            <a
              class="btn m-3 mycard-body"
              :href="`http://127.0.0.1:8000/details?slug=${structure.slug}&contactedStructure=0`"
              role="button"
              >Dettagli...</a
            ><br />
          </div>
        </div>
      </div>

      <div class="overlay"></div>
      <div onclick="next()" class="control-next-btn">
        <i class="fas fa-arrow-right"> > </i>
      </div>
    </div>
  </div>
  <!-- <div>
    <h1>Strutture Sponsorizzate</h1>

      <div class="card-deck">
        <div class="card mycard my-4" v-for="structure in this.StructuresSponsored" :key="structure.id">
          <img v-if="structure.cover_img_path" class="card-img-top myimg" :src="`asset(storage/ ${structure.cover_img_path})`" alt="Cover of structure">
            <div class="card-body">
              <h5 class="mt-0">{{structure.name}}</h5>
            </div>
            <div class="card-footer text-center">
              <a class="btn btn-outline-primary my-1" :href="`http://127.0.0.1:8000/details?slug=${structure.slug}&contactedStructure=0`" role="button">Dettagli...</a><br>
            </div>
        </div>
      </div>
      
  </div> -->
</template>
<script>
export default {
  name: "StructuresSponsored",
  data() {
    return {
      StructuresSponsored: [],
    };
  },
  mounted() {
    axios.get("/api/structures/sponsoredstructure").then((resp) => {
      this.StructuresSponsored = resp.data.results;
    });
  },
};
</script>