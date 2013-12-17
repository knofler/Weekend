<?php
include 'init.php';

if (logged_in()){
    header('location:index.php');
    exit();
}

include "/template/header.php" ;

?>
<!--This is left DIV,which is kept blank for design purpose-->
<div class="mainDiv" id="left"></div>

<!--This is Main Container DIV,which contains main HTML structures for this page.-->
<div class="mainDiv" id="container" >
    
  <!--//capture form input and pass into php function,in this case pass it to user_func  -->
  <?php
  
  if(isset($_POST['email'],$_POST['name'],$_POST['pass1'])){
    
      $name=$_POST['name'];
      $email=$_POST['email'];
      $password=$_POST['pass1'];
     
     $errors=array();
     
     if (empty($name) || empty($email) || empty($password)){
        
        $errors[]="All fields required";
     } else{
     
     if(user_exists($email)===true){
        
        $errors[]="Email address already exist,please try different account.";
     }
    } 
    if (!empty($errors)){
        
        foreach ($errors as $error){
            
            echo $error,'<br/>';
        }
     }else{
        
      $register= user_register($email,$name,$password);   
     
     $_SESSION['user_id']=$register;
     //echo $_SESSION['user_id'];
     header('location:index.php');
     exit();
     }
     
  }
  
?>    
    <div id="form">
        
    
<h3>Register Account</h3>

<article>
    
<form id="register" action="" method="post" autocomplete="off">
    <fieldset id="form_fieldset">
        <legend>Register</legend>
    
    <!--Name-->
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" autofocus required /><br/>
    
    <!--email-->
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required /><br/>
    
    <!--password-->
    <label for="pass1">Password:</label>
    <input type="password" id="pass1" name="pass1" required nocache />
    <span id="strength"></span><br/>
    
    <!--Retype Password-->
    <label for="pass2">Retype:</label>
    <input type="password" id="pass2" name="pass2" required /><br/>
    <span id="match"></span><br/>
    
    <button id="submit_btn" type="submit">Register</button>
    
    
    </fieldset>
</form>

</article>
 
</div>
</div><!--End of container DIV-->


<!--This is Right DIV,which is kept blank for design purpose--> 
<div class="mainDiv" id="right"></div>

<!--This is the footer template that inludes JavaScripts and Ending of All HTML elements including Footer DIV-->
<?php include "/template/footer.php" ; ?>
