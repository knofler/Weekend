(function(){

    // querySelector, jQuery style
    var $ = function (selector) {
         return document.querySelector(selector);
    };//end of querySelector function

    
    //Select the dom to manupulate
     var chkin_btn=document.getElementById("chkin_btn");
     
    //create the event listener
    chkin_btn.addEventListener("click",getLocation,true);
    
    //Select the dom for display
    var x=document.getElementById("display_msg");
    
    

//function to find the coordinate of the location from html navigator glocation property.
//pass the event to the function
function getLocation(e){

        if (navigator.geolocation){
         navigator.geolocation.getCurrentPosition(getPosition,showError);
        }else{
         x.innerHTML="Geolocation is not supported by this browser.";
        };   
};//end of getLocation function


//function to display checkin location result on google map
function getPosition(position){
    
    //Grab Lanitude and longitude information using google map api.
    var lat=position.coords.latitude;
    var longitude=position.coords.longitude;
    var latlon=position.coords.latitude+","+position.coords.longitude;

    console.log(latlon);
    //POI ARRAY Manually Created- AS AN EXAMPLE
    var POI={
        "Macquire Park":"-33.775765299999996,151.11610779999998",
        "Ryde":"-31.775765299999996,152.11610779999998",
        "Blacktown":"-31.775765299999996,151.11610779999998",
        "Sydney":"-29.775765299999996,150.11610779999998"
    }//end of POI array
    

    //For loop to put POI name into each <li> element so, mouseover and mouseout event on each POI display maps
    for (var lat_loc in POI) {

            // Create the links with the input value as innerHTML
            var li = document.createElement('li');
            li.className = 'dynamic-map';
            li.innerHTML =lat_loc;

            // Append it and attach the event (via onclick)
            $('#links').appendChild(li);
    }//end of for loop.
    

    //use querySelector to target #links and then get tag names <li>
    var links= $('#links').getElementsByTagName('li');
    
    //iterate over #links <li>
        
        //For each <li> inside #links
        for (var i=0;i<links.length;i++) {
            
            var link =links[i];
            
            //Get POI latlon value for each POI
            var link_val=link.innerHTML;
            console.log(link_val);

            //Add event listener on each POI element on <li>        
            link.addEventListener("mouseover",showMap);
            link.addEventListener("mouseout",showMap);
    
            //on click event collect the lat long to insert to database through the form
            link.addEventListener("click",getLatlon);
        }//end of #links iteration for loop
      

    //function to convert suburb name to co-ordinate ---not used
    function getPOI_latlon(e){

    var target=e.target.innerHTML;
        console.log(target);

          var poi_srv={
            "Blacktown":"-31.775765299999996,151.11610779999998",
            "Ryde":"-31.775765299999996,152.11610779999998",
            "Sydney":"-32.775765299999996,150.11610779999998",
            "Macquire Park":"-33.775765299999996,151.11610779999998"
        }//end of poi_srv array
    
        //POI loop iteration
        for (poi_name in poi_srv) {
          if (name==poi_name) {
            var latlon_use= poi_srv[poi_name]
          }//end of if.
        }//end of for.
        return latlon_use;
    
    }//end of get_POI_latlon function.


    //function to show maps for selected POI on mouseover
    function showMap(e){

        //capture target <li> element on to a variable for later use.    
         var target=e.target.innerHTML;
         
        //use target as the latlon input for google api map url
        var img_url="http://maps.googleapis.com/maps/api/staticmap?center="+target+"&zoom=14&size=640x200&sensor=true";
        
        //use map url image to display map on mapholder DOM
        document.getElementById("mapholder").innerHTML="<object><img src='"+img_url+"'></object>";

        //On mouseout event display no map
        if (e.type=="mouseout") {
         document.getElementById("mapholder").innerHTML="";
        }//end of if
        
    }//end of showMap function

    
    //function to get latlon info to update mysql DB 
    function getLatlon(e){
    
        //get event target and captute value on a target variable
        var target=e.target.innerHTML;

        //assign values to chkin_btn input html element to post to mysql db.
          document.getElementById("chkin_btn").value=target;

        //create dynamic div with checkin result --not used here
        /*var target_div=document.createElement('div');
        target_div.className="result";
        target_div.innerHTML='<input id="chkin_msg" type="text"/>'+' - at <span id="chkin_dis">'+target+"."+'</span>'+POI[target]*/;

        // Append it and attach the event (via onclick)
              //$('#resultDiv').appendChild(target_div);

        //get textarea by id and then change the value with checkin data
        document.getElementById("brag").value='- at '+target+'.';
    
    }//end of getLatlon function

};// end of getPosition(position) function.


//create function outside loop-example
function dynamicEvent() {
    this.innerHTML="text Changed";
    this.className +='dynamic-map';
};//end of dynamicEvent function.



//define error handling here
function showError(error){
   switch(error.code){
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
    }//end of switch
    
};//end of showError function. 

})();