<template>
  <div>
    <div class="btn-row row d-flex justify-content-center align-items-center">
      <h1>Suggerimenti</h1>
    </div>
      <div class="container d-flex justify-content-around flex-wrap">
        <div class="mycard m-1" v-for="structure in this.StructuresSponsored" :key="structure.id">   
            <a class="btn m-3 mycard-body" :href="`http://127.0.0.1:8000/details?slug=${structure.slug}&contactedStructure=0`" role="button">
              <div class="mycard-img-container p-3">
                  <img class="" :src="`storage/${structure.cover_img_path}`" alt="Cover of structure">
              </div>
                <h5 class="mt-0">{{structure.name}}</h5>
            </a>  
        </div>
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
<style scoped>
 
  .mycard{
    max-width: 300px;
  }

  .mycard-body{
    margin: 0px !important;
    padding: 0px;
  }

  .mycard-img-container{
    width: 100%;
    height: 300px;
  }
  img{
    width: 100%;
    height: 100%;
  }

  .btn{
    color: #EA5C63;
    transition: .3s;
  }

  .btn:hover{
    outline: 2px solid #EA5C63;
  }

  .btn:hover .mycard-img-container{
    filter: opacity(.8);
  }
</style>