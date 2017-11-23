/**
* Theme: Adminox Admin Template
* Author: Coderthemes
* Google Maps
*/

!function(t){"use strict"
var n=function(){}
n.prototype.createMarkers=function(t){var n=new GMaps({div:t,lat:-12.043333,lng:-77.028333})
return n.addMarker({lat:-12.043333,lng:-77.03,title:"Lima",details:{database_id:42,author:"HPNeo"},click:function(t){console.log&&console.log(t),alert("You clicked in this marker")}}),n.addMarker({lat:-12.042,lng:-77.028333,title:"Marker with InfoWindow",infoWindow:{content:"<p>HTML Content</p>"}}),n},n.prototype.init=function(){var n=this
t(document).ready(function(){n.createMarkers("#gmaps-markers")})},t.GoogleMap=new n,t.GoogleMap.Constructor=n}(window.jQuery),function(t){"use strict"
t.GoogleMap.init()}(window.jQuery)