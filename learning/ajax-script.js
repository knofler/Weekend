 //Script insertion
 var Lib =Lib || {};
 
 Lib.Ajax = (function(){
    
    //hijac form
    function Hijak(form,callback ) {
        
        var args={};
        
        for (var i=0;i<form.elements.length;i++) {
            var f=form.elements[i];
            if (f.name) args[f.name]=f.value;
        }
        
        //make ajax call
        Call(form.action, args, form.method, callback);
    }
    
    //call web services
    function Call(url, args, type, callback) {
        
        //check type (GET or POST)
        type=(type || "GET").toUpperCase();
        
        //create argument list
        args=args || {};
        var arglist="";
        
        for (var n in args) {
            arglist += "&" + n + "=" + escape(args[n]);
        }
        
        if (arglist.length>0) {
            arglist =arglist.substr(1);
        }
        
        //append args to GET URL
        if (type=="GET") {
            url +="?" +arglist;
            arglist=null;
        }
        
        //XMLHttpRequest object
        var xhr= new XMLHttpRequest();
        xhr.open(type,url,true);
        
        //callback function
        if (callback) {
            xhr.onreadystatechange = function(){
                if (xhr.readyState==4 && xhr.status==200) {
                    callback(xhr.responseText);
                }
            };
        }
        
        //open request
        
        xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8");
        xhr.setRequestHeader("X-Requested-With","XMLHttpRequest");
        xhr.send(arglist);
    }
    
    return {
                Hijack:Hijack,
                Call:Call
    };

 }());
 
 
 //Start
 
 var
    
    calcform=document.getElementById("calc"),
    output=document.getElementById("output"),
    td=output.getElementsByTagName("td");
    
 //form submit  - direct to Ajax Call
 calcform.addEventListener("submit",function(e){
    e.preventDefault();
    Lib.Ajax.Hijack(calcform,function(r){
       
        r=JSON.parse(r);
        td[0].textContent = r.cost;
    });
 
 });
    
    
        
 
 