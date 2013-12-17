<?php

include 'init.php';

if(!logged_in()){
    
    header('Location:index.php');
    exit();
}

if(weekend_check($_GET['weekend_id'])===false){
    
    header('Location:weekend.php');
    exit();
}

if(isset($_GET['weekend_id'])){
    $wknd_id=$_GET['weekend_id'];
    delete_weekend($wknd_id);
    header('Location:weekend.php');
    exit();
}

?>