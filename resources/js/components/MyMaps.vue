<template>
<div>
  <div class="small" id="map-div"></div>
</div>
</template>
<script>
import { EventBus } from './bus.js';
export default {
    name: "MyMaps",
    props: {
    latitude: String,
    longitude: String,
    finalarray: Array,
    typeofshow: String,
    tomtomkey: String,
  },
    data() {
    return {
      findStructures: this.finalarray,
      key: this.tomtomkey,
      lat: parseFloat(this.latitude),
      lng: parseFloat(this.longitude),
      oneResult: parseInt(this.typeofshow),
      newfindStructures: [],
      zoom: 10,
    };
  },
  methods:{
    generateMap(array, newLat, newlng){
      const APPLICATION_NAME = 'BoolBnb';
          const APPLICATION_VERSION = '1.0';
        
          tt.setProductInfo(APPLICATION_NAME, APPLICATION_VERSION); 

          // if (this.radius > 39000) {
          //   this.zoom = 4
          // }
            
          
          let structureMap = [ this.lng, this.lat ];
            var map = tt.map({
                key: this.key,
                container: 'map-div',
                center: structureMap,
                // style: 'tomtom://vector/1/basic-main',
                zoom: this.zoom
            });
            if(parseInt(this.oneResult) === 0){
                var toMarkFindStructures = []
                array.forEach(element => {
                    var latLngObject ={ lat: element.lat, lng: element.lng}
                    toMarkFindStructures.push(latLngObject)   
                });
                toMarkFindStructures.forEach(function (child) {
                    var result = document.createElement('div');
                    result.id = 'customStructureMarker';
                    new tt.Marker({element: result}).setLngLat(child).addTo(map);
                })
            var element = document.createElement('div');
            element.id = 'customTownMarker';

            var marker = new tt.Marker({element: element})
            .setLngLat([this.lng, this.lat])
            .addTo(map);

            }else{
                var element = document.createElement('div');
                element.id = 'customStructureMarker';

            var marker = new tt.Marker({element: element})
            .setLngLat([this.lng, this.lat])
            .addTo(map);
            }      
    }
  },
  created() {
    EventBus.$on('reloadMap', data => {
    this.newfindStructures = []  
    this.newfindStructures = data.array
    this.lat = data.lat
    this.lng = data.lng
    this.generateMap(this.newfindStructures)
    });
  },
   mounted() {
     this.generateMap(this.findStructures)
      },
}
</script>