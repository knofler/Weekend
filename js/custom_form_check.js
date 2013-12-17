//custom controls


//DOM Nodes

var form ={
   
    register:document.getElementById("register"),
    email: document.getElementById("email"),
    pass1:document.getElementById("pass1"),
    pass2:document.getElementById("pass2"),
    strength:document.getElementById("strength") ,
    match:document.getElementById("match"),
    submit_btn:document.getElementById("submit_btn") 
}

//form Submit
form.register.addEventListener("submit",CheckForm);


//Check email field
form.email.addEventListener("change",function(e){
    if (e.target.value=="") alert("you forgot to enter your email address");       
    }
)


//password strength
form.pass1.addEventListener("keyup",checkPassStrength)

//space charecter as password
form.pass1.addEventListener("keypress", NoSpace ); 
form.pass2.addEventListener("keypress", NoSpace );


//check password match in second password field
form.pass2.addEventListener("keyup",passMatch);


//check password strength

var strText=["weak","Average","Strong"];
var strColor=["#c00","#f80","#080"];


//check password match variable
var matchText=["Password doesn't match", "Password Matches"];
var matchColor=["#c00","#080"];

//Stop empty space keystroke on password field
function NoSpace(e){
    
    if (e.charCode==32) e.preventDefault();
    
    }


function checkPassStrength(e){
    
    //set the global variable for pass1 field value 
    var pass=form.pass1.value;
    
    //check Upper Case using regular expression
    var uc=pass.match(/[A-Z]/g);
    uc= (uc && uc.length || 0);
    
    //check Numebrs using regular expression
    var nm=pass.match(/\d/g);
    nm=(nm && nm.length || 0);
    
    //check Symbols using regular expression
    var smbl=pass.match(/\W/g);
    smbl=(smbl && smbl.length || 0);
    
    //Score the total complexity of the password
    
    var s=pass.length + uc + (nm * 2) + (smbl * 3);
    
    //Average the complexity meter between 0-2
    
    s= Math.min(Math.floor(s/10));
    
    //run this newly found complexity meter between 0-2 against complexity range array and color
    
    form.strength.textContent=strText[s];
    form.strength.style.color=strColor[s];    
    
    }
    
 //password match check
 
 function passMatch(e) {
    
    var m;
    
   if (form.pass1.value != form.pass2.value) {
        m=0;
    form.submit_btn.disabled='disabled';    
   }else{
    m=1;
     form.submit_btn.removeAttribute('disabled');    
   }
   
   form.match.textContent=matchText[m];
   form.match.style.color=matchColor[m];
 }
    
    
//form submit validation

function CheckForm(e) {
    
    
    var msg="";
    //check both password are same
    
    if (form.pass1.value=="" || form.pass1.value != form.pass2.value) {
    
    //msg+="\nyour passwords";
    
     e.preventDefault();
    }
    
    //complete message
    
    if (msg !="") {
        msg="Please check "+ msg;
    }
    else{
        
    //document.getElementById("form").innerHTML="done";    
    //msg="Submiting form..";    
    }
    
   
    
    
    
}
    