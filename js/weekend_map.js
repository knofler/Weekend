 function weekend_map(location,display) {

         console.log("I have received" + location);
         //use target as the latlon input for google api map url
          var img_url="http://maps.googleapis.com/maps/api/staticmap?center="+location+"&zoom=14&size=380x240&sensor=true";
          //use map url image to display map on mapholder DOM
          display.innerHTML="<object><img src='"+img_url+"'></object>";
          console.log("I have processed" + location);
        }