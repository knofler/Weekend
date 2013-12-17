<?php
?>
<form action="" method="post" autocomplete="off">
    <p>
        Email: <input type="email" name="login_email" required/>
        Password: <input type="password" name="login_password" required/>
        <input type="submit" value="log in" />
    </p>
    
    
</form>
<?php

//grab login form data
if(isset($_POST['login_email'],$_POST['login_password'])){

    
    $email=$_POST['login_email'];
    $password=$_POST['login_password'];
    
    $login= login_check($email,$password);  
    $errors=array();
        
    if (empty($email) || empty($password)){
        
        $errors[]="All fields required";
    }else{
        if ($login===false){
            
            $errors[]="User name and password is not correct";
        }
        
        //echo $login=login_check($email,$password);
        
    }
    
    if (!empty($errors)){
        
        foreach($errors as $error){
            
            echo $error ,'<br />';
        }
    }else{
        
        $_SESSION['user_id']=$login;
        header('location:index.php');
        //exit();
        
    }
}

?>