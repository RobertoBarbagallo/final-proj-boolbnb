const API_KEY = 'Yt7Qt2t3MRFVjylnAAnd3ZIq4QfWadz4';
const APPLICATION_NAME = 'BoolBnb';
const APPLICATION_VERSION = '1.0';
 
    tt.setProductInfo(APPLICATION_NAME, APPLICATION_VERSION); 

const ADDRESS = { lng, lat };
var marker = new tt.Marker().setLngLat(ADDRESS).addTo('map-div');
// console.log(lat);

var map = tt.map({
    key: API_KEY,
    container: 'map-div',
    center: ADDRESS,
    zoom: 12
});
