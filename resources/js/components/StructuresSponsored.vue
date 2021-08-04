<template>
  <div class="container">
    <div class="position-relative py-2">
      <div class="btn-row row d-flex justify-content-center align-items-center">
        <h2>Suggerimenti</h2>
      </div>
      <div @click="prev()" class="control-prev-btn">
        <i class="fas fa-chevron-left"></i>
      </div>

      <div
        id="slider-container"
        class="slider d-flex">
        <a
          :href="`http://127.0.0.1:8000/details?slug=${structure.slug}&contactedStructure=0`"
          class="slide my-1"
          v-for="structure in this.StructuresSponsored"
          :key="structure.id">
          <div class="mycard-img-container">
            <img
              class=""
              :src="`storage/${structure.cover_img_path}`"
              alt="Cover of structure"
            />
          </div>
          <div class="myslidercardtext text-center">
            <h5 class="my-1">{{ structure.name }}</h5>
          </div>
        </a>
      </div>

      <div class="overlay"></div>
      <div @click="next()" class="control-next-btn">
        <i class="fas fa-chevron-right"></i>
      </div>
    </div>
  </div>
</template>
<script>

export default {
  name: "StructuresSponsored",
  props: {
  },
  data() {
    return {
      StructuresSponsored: [],
    };
  },
  methods:{
    prev(){
      document.getElementById('slider-container').scrollLeft -= 270;
    
    },
    next(){
      document.getElementById('slider-container').scrollLeft += 270;
      

}
    
  },
  mounted() {
    axios.get("/api/structures/sponsoredstructure").then((resp) => {
      this.StructuresSponsored = resp.data.results;
    });
  },
};
</script>

<style scoped>

.mycontainer{
 background: white;
}

#slider-container{
  height: 220px;
}

 .slider {
   display: flex;
	 max-height: auto;
	 overflow-y: hidden;
	 overflow-x: scroll !important;
	 padding: 16px;
	 transform: scroll(calc(var(--i,0)/var(--n)*-100%));
	 scroll-behavior: smooth;
	 padding: 0 50px;
}

 .slider::-webkit-scrollbar {
	 height: 5px;
	 width: 150px;
	 display: none;
}
 .slider::-webkit-scrollbar-track {
	 background: transparent;
}
 .slider::-webkit-scrollbar-thumb {
	 background: #888;
}
 .slider::-webkit-scrollbar-thumb:hover {
	 background: #555;
}

 .slide {
	 position: relative;
   border: 4px solid #ffdadb;
   border-radius: 20px;
   width: 200px;
   height: 200px;
   margin: 0 20px;
   overflow-y: clip;
}

.slide:first-child{
  margin-left: 0;
}

.slide:hover{
  text-decoration: none;
}

.mycard-img-container{
   width: 210px;
   height: 210px;
}

.mycard-img-container img{
    width: 100%;
    height: 100%;
}
 .control-prev-btn, .control-next-btn{
	 position: absolute;
	 top: 50%;
	 text-align: center;
	 user-select: none;
	 color:  #EA5C63;
	 cursor: pointer;
   z-index: 3;
}

.control-prev-btn{
   left: 0;
}

.control-next-btn{
   right: 0;
}

.fas{
  font-weight: 700;
  font-size: 32px;
}

.myslidercardtext{
 width: 100%;
 position: absolute;
 bottom: -5px;
 left: 50%;
 transform: translateX(-50%);
 overflow: hidden;
 white-space: nowrap;
 text-overflow: ellipsis;
 background: linear-gradient(180deg, rgba(255,255,255,0) 0%, rgba(255,218,219,1) 50%);
}
h2{
  color:  #EA5C63
}

h5 {
  padding-top: 1px;
  color: black;
  font-size: 16px;
  overflow: hidden;
  white-space: nowrap;
  text-overflow: ellipsis;
}
.position-relative{
  position: relative;
}
 @media only screen and (max-width: 420px) {
   #slider-container{
     height: 160px;
   }

	 .slider {
		 padding: 0;
	}

	 .slide {
		 width: 150px;
     height: 150px;
	}
  
  .slide:first-child{
  margin-left: 50px;
  }

  h2{
    font-size: 18px;
  }
}

</style>