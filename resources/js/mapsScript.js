const APPLICATION_NAME = 'BoolBnb';
const APPLICATION_VERSION = '1.0';
 
    tt.setProductInfo(APPLICATION_NAME, APPLICATION_VERSION); 

    // var marker = new tt.Marker().setLngLat(ADDRESS).addTo('map-div');
    
  
let structureMap = [ lng, lat ];
var map = tt.map({
    key: 'zGpRnKqGAShOxxJjdntDZPbGQcLCqqvN',
    container: 'map-div',
    center: structureMap,
    // style: 'tomtom://vector/1/basic-main',
    zoom: 12
});

if(!oneResult){
    var toMarkFindStructures = []
    findStructures.forEach(element => {
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
.setLngLat([lng, lat])
.addTo(map);

}else{
    var element = document.createElement('div');
    element.id = 'customStructureMarker';

    var marker = new tt.Marker({element: element})
    .setLngLat([lng, lat])
    .addTo(map);
}
