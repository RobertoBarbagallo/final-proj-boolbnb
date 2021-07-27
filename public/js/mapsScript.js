const APPLICATION_NAME = 'BoolBnb';
const APPLICATION_VERSION = '1.0';
 
    tt.setProductInfo(APPLICATION_NAME, APPLICATION_VERSION); 

let structureMap = [ lng, lat ];
console.log(API_KEY);

var map = tt.map({
    key: API_KEY,
    container: 'map-div',
    center: structureMap,
    // style: 'tomtom://vector/1/basic-main',
    zoom: 12
});

var marker = new tt.Marker()
.setLngLat([lng, lat])
.addTo(map);
