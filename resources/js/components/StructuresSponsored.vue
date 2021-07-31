<template>
  <div>
    <h1>Strutture sponsorizzate</h1>
    <div
      v-for="structure in this.StructuresSponsored"
      :key="structure.id"
      class="my-3"
    >
      <h3>{{ structure.name }}</h3>
      <h4>{{ structure.beds }}</h4>
    </div>
  </div>
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