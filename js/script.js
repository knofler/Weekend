 var input_1=document.getElementById("input_1");
input_1.addEventListener("click",get_alert);

function get_alert(e){
    
    var prompt_get=prompt("where are you now?");
    
    getPOI_latlon(prompt_get);
console.log(prompt_get);
}



function getPOI_latlon(name){
  
      var poi_srv={
        "Blacktown":"-31.775765299999996,151.11610779999998",
        "Ryde":"-31.775765299999996,152.11610779999998",
        "Sydney":"-32.775765299999996,150.11610779999998",
        "Macquire Park":"-33.775765299999996,151.11610779999998"
         
    };
    
    for (poi_name in poi_srv) {
      if (name==poi_name) {
        var latlon_use= poi_srv[poi_name]
      }
    }
    console.log("I got " +latlon_use+" now so I can use it");
    return latlon_use;
  }
  