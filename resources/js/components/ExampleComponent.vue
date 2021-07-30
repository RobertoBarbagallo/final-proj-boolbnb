<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>
                    <div id="map-div"></div>
                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
   export default {
  name: "ExampleComponent",
  props: {
    finalArray: Array,
    latitude: Number,
    longitude: Number
  },
  data() {
    return {
        // results:this.finalArray,
        // lat: this.latitude,
        // lng: this.longitude,
    };
  },
  computed: {},
  // methods: {
  //   upgradeFunction() {
  //     this.filterResults = [];
  //     this.finalArrayToPrint = [];

  //     if (this.filterBeds > 1) {
  //       this.upgrade = true;
  //     } else {
  //       this.upgrade = false;
  //     }

  //     if (this.matchingStructures.length > 0) {
  //       this.results.forEach((value) => {
  //         if (value.beds >= this.filterBeds) {
  //           this.filterResults.push(value);
  //           this.finalArrayToPrint.push(value);
  //         }
  //       });
  //       this.controlValues();
  //     } else {
  //       this.results.forEach((value) => {
  //         if (value.beds >= this.filterBeds) {
  //           this.filterResults.push(value);
  //           this.finalArrayToPrint.push(value);
  //         }
  //       });
  //     }
  //   },

  //   avancedSearch(event) {
  //     if (event.target.checked) {
  //       this.filters.filterServices.push(event.target.value);
  //     } else if (!event.target.checked) {
  //       const index = this.filters.filterServices.indexOf(event.target.value);
  //       if (index > -1) {
  //         this.filters.filterServices.splice(index, 1);
  //       }
  //     }
  //     this.matchingStructures = [];
  //     this.finalArrayToPrint = [];

  //     let params = new URLSearchParams(this.filters).toString();
  //     this.filterServicesExist = true;
  //     axios
  //       .get(this.requestUrl + "&" + params)
  //       .then((resp) => {
  //         if (this.filters.filterServices.length > 0) {
  //           this.matchingStructures = resp.data.lastFilteredData;
  //           this.finalArrayToPrint = this.matchingStructures;
  //           this.controlValues();
  //         } else {
  //           this.matchingStructures = resp.data.results;
  //           this.finalArrayToPrint = this.matchingStructures;
  //         }
  //       })
  //       .catch((er) => {
  //         console.error(er);
  //         alert(
  //           "Le strutture per la città selezionata non includono i servizi richiesti"
  //         );
  //       });
  //     if (this.filters.filterServices.length < 1) {
  //       this.filterServicesExist = false;
  //     }
  //   },

  //   objects_to_array_of_id(array) {
  //     let resultArray = [];
  //     array.forEach((element) => {
  //       resultArray.push(element.id);
  //     });
  //     return resultArray;
  //   },

  //   controlValues() {
  //     if (this.upgrade && this.filterServicesExist) {
  //       this.finalArrayToPrint = [];
  //       this.doubleFilteredArrayIds = [];
  //       this.filterResultsIds = [];
  //       this.doubleFilteredArray = [];
  //       this.filterResultsIds = this.objects_to_array_of_id(this.filterResults);
  //       this.matchingStructuresIds = [];
  //       this.matchingStructuresIds = this.objects_to_array_of_id(
  //         this.matchingStructures
  //       );
  //       this.doubleFilteredArrayIds = this.intersect_safe(
  //         this.filterResultsIds,
  //         this.matchingStructuresIds
  //       );
  //       this.results.forEach((element) => {
  //         if (this.doubleFilteredArrayIds.includes(element.id)) {
  //           this.doubleFilteredArray.push(element);
  //           this.finalArrayToPrint.push(element);
  //         }
  //       });
  //     }
  //   },

  //   intersect_safe(a, b) {
  //     var ai = 0,
  //       bi = 0;
  //     var result = [];
  //     while (ai < a.length && bi < b.length) {
  //       if (a[ai] < b[bi]) {
  //         ai++;
  //       } else if (a[ai] > b[bi]) {
  //         bi++;
  //       } /* they're equal */ else {
  //         result.push(a[ai]);
  //         ai++;
  //         bi++;
  //       }
  //     }
  //     return result;
  //   },
  // },
}
    
</script>
