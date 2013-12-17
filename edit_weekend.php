<?php
include 'init.php';

if (!logged_in()){
    header('location:index.php');
    exit();
}

//check get var set
if(!isset($_GET['wknd_id']) || empty($_GET['wknd_id']) || weekend_check($_GET['wknd_id']) === false){
    
    header('Location:weekend.php');
    exit();
}

//check album belongs to user


include "/template/header.php" ;

?>

<!--This is left DIV,which is kept blank for design purpose-->
<div class="mainDiv" id="left"></div>

<!--This is Main Container DIV,which contains main HTML structures for this page.-->
<div class="mainDiv" id="container" >

 

 <?php
 $wknd_id= $_GET['wknd_id'];
 //print_r($wknd_id);
 $wknd_data = weekend_data($wknd_id,'wknd_name','wknd_desc');
 
 //print_r(album_data($album_id,'name','description'));
 
 if(isset($_POST['weekend_name'],$_POST['weekend_description'])){
    
    $wknd_name=$_POST['weekend_name'];
    $wknd_desc=$_POST['weekend_description'];
  
    $errors=array();
    
    if(empty($wknd_name) || empty($wknd_desc)){
        
        $errors[]="Album name and description required";
    }else{
        
        if(strlen($wknd_name)>55 || strlen($wknd_desc)>255){
            
            $errors[]="One or more fields contains too many charecters"; 
        }
    }
    
    if (!empty($errors)){
        
        foreach ($errors as $error){
            
            echo $error ,'<br />';
        }
    }else{
        
        edit_weekend($wknd_id,$wknd_name,$wknd_desc);
        header('Location:weekend.php');
        exit();
    }
 }
 ?>


</div><!--End of container DIV-->


<!--This is Right DIV,which is kept blank for design purpose--> 
<div class="mainDiv" id="right"></div>

<!--This is the footer template that inludes JavaScripts and Ending of All HTML elements including Footer DIV-->
<?php include "/template/footer.php" ;?>
