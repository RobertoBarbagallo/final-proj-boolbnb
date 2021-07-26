
const API_KEY = 'Yt7Qt2t3MRFVjylnAAnd3ZIq4QfWadz4';
const APPLICATION_NAME = 'BoolBnb';
const APPLICATION_VERSION = '1.0';
 
    tt.setProductInfo(APPLICATION_NAME, APPLICATION_VERSION); 
    
$params = 14

// https://api.tomtom.com/search/2/geocode/Via%20Spin%20111.json?limit=1&key=Yt7Qt2t3MRFVjylnAAnd3ZIq4QfWadz4

axios
  .get('https://api.tomtom.com/search/2/geocode/Via%20Spin%20111.JSON?limit=1&key=' + API_KEY, { headers: '' })
  .then(coordinates => {
    respLat = coordinates.data.results[0].position.lat
    respLng = coordinates.data.results[0].position.lon
    console.log(coordinates.data.results[0].position)
  })


    // const GOLDEN_GATE_BRIDGE = {lng: $respLat, lat: $respLng};
    // console.log(this.data.respLat)
 
// var map = tt.map({
//   key: API_KEY,
//   container: 'map-div',
//   center: GOLDEN_GATE_BRIDGE,
//   zoom: 12
// });
