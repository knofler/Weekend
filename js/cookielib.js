//cookie library

var Cookie=Cookie || (function(){
    
    //parse cookies
    //create cookie list variable to get cookie input then split it into each cookie with (;),later split it into name value pair with (=).
    var
        cookieList={},
        eachCoockie=document.cookie.split(";"),
        cookieName,i;
    
    for (i=0;i<eachCoockie.length;i++){
        
        cookieName=eachCoockie[i].split["="];
        if (cookieName.length>1) {
            cookieList[cookieName[0].trim()]=unescape(cookieName[1]);
        }
    }
    
    //set cookies
    
    function SET(name,value,expiry,path){
        
        var cookieExpiry=cookiePath="";
        
        if (expiry) {
          var date=new Date();
          date.setTime(date.getTime() + expiry * 60000);
          cookieExpiry="; expires="+date.toGMTString();
        }
        
        if (path) {
          cookiePath="; path="+path;
        }
        
      //store cookie
      
      document.cookie=name + "="+escape(value) + cookieExpiry + cookiePath;
      
      //update cookieList
      
      if (expiry && expiry <0) {
          //delete cookie
          delete cookieList[name];
      }
      else{
          
          //ADD COOKIE
          cookieList[name]=value;
      }   
        
    };
    
    //delete cookie function
    function Delete(name) {
        Set(name,"",-1);
    }
    
    //create cookie function
    function Get(name) {
        return cookieList[name] || undefined ;
    }

//return module results    
    return {
        Set:Set,
        Delete:Delete,
        Get:Get
    }
    
}());
    