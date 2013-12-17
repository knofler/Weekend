  //Select the dom to manupulate
  var chkin_btn=document.getElementById("chkin_btn");
  
  
  //create the event listener
  chkin_btn.addEventListener("click",getLocation);
  
  
  
  var x=document.getElementById("display_msg");
  
  //function to find the coordinate of the location from html navigator glocation property.
  
  //pass the event to the function
  function getLocation(e)
  {
      //if(e.type=="mouseout") x.innerHTML=" ";
      
        if (navigator.geolocation)
          {
          navigator.geolocation.getCurrentPosition(showPosition,showError);
          }
        else{x.innerHTML="Geolocation is not supported by this browser.";}
  }
  
  
  //function to display checkin location result on google map 
  function showPosition(position)
    {
    var lat=position.coords.latitude;
    var longitude=position.coords.longitude;
    var latlon=position.coords.latitude+","+position.coords.longitude;
  
  var POI=[];
  
    if (lat && longitude) {
    
    //document.getElementById("display_msg").innerHTML='<a href="#"><div id="loc"><p id="loc_auto'+count+'"><input class="add_checkin" id="new_loc" type="button" value="Add" />'+latlon+'</p></div></a>';
  POI.push("Macquarie University","Rydes","Chatswood");
  
  
   var count=0;
  for (var i=0;i<POI.length;i++)  {
    count+=0;
    document.getElementById("display_msg").innerHTML+='<a href="#"><div id="loc"><p id="loc_auto'+count+'"><input class="add_checkin" id="new_loc" type="button" value="Add" />'+POI[i]+latlon+'</p></div></a>';
    
      }

    var checkin_cord=document.getElementById("loc_auto")[count];
  console.log(checkin_cord);
  
     //create the event listener
      checkin_cord.addEventListener("mouseover",showMap);
      checkin_cord.addEventListener("mouseout",showMap); 
    //on click event collect the lat long to insert to database through the form
    checkin_cord.addEventListener("click",getLatlon);
    
    }
    
   
  function showMap(e){
  
   
    
     var img_url="http://maps.googleapis.com/maps/api/staticmap?center="
    +latlon+"&zoom=14&size=640x200&sensor=true";
    document.getElementById("mapholder").innerHTML="<object><img src='"+img_url+"'></object>";
    
     
      if (e.type=="mouseout") {
       document.getElementById("mapholder").innerHTML="";
      }
  
  };
  
  function getLatlon(e){

      
      //assign values to chkin_btn input html element
      document.getElementById("chkin_btn").value=latlon;
      
      //show values to chkin_result div
      document.getElementById("checkin_div").innerHTML=latlon;
      $("#checkin_div").show();
      return latlon;
  };
  
}
    
    
  
    
    
  //define error handling here  
  function showError(error)
    {
    switch(error.code) 
      {
      case error.PERMISSION_DENIED:
        x.innerHTML="User denied the request for Geolocation."
        break;
      case error.POSITION_UNAVAILABLE:
        x.innerHTML="Location information is unavailable."
        break;
      case error.TIMEOUT:
        x.innerHTML="The request to get user location timed out."
        break;
      case error.UNKNOWN_ERROR:
        x.innerHTML="An unknown error occurred."
        break;
      }
    }
  
   