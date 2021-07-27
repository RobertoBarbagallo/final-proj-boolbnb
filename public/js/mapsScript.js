const API_KEY = 'Yt7Qt2t3MRFVjylnAAnd3ZIq4QfWadz4';
// const API_KEY = getenv('TOMTOM_API_KEY');
const APPLICATION_NAME = 'BoolBnb';
const APPLICATION_VERSION = '1.0';
 
    tt.setProductInfo(APPLICATION_NAME, APPLICATION_VERSION); 

let structureMap = [ lng, lat ];
// var marker = new tt.Marker().setLngLat(ADDRESS).addTo('map-div');
// console.log(API_KEY);

var map = tt.map({
    key: API_KEY,
    container: 'map-div',
    center: structureMap,
    // style: 'tomtom://vector/1/basic-main',
    zoom: 12
});
