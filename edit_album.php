<?php
include 'init.php';

if (!logged_in()){
    header('location:index.php');
    exit();
}

//check get var set
if(!isset($_GET['album_id']) || empty($_GET['album_id']) || album_check($_GET['album_id']) === false){
    
    header('Location:albums.php');
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
 $album_id= $_GET['album_id'];
 $album_data = album_data($album_id,'name','description');
 
 //print_r(album_data($album_id,'name','description'));
 
 if(isset($_POST['album_name'],$_POST['album_description'])){
    
    $album_name=$_POST['album_name'];
    $album_description=$_POST['album_description'];
    
    $errors=array();
    
    if(empty($album_name) || empty($album_description)){
        
        $errors[]="Album name and description required";
    }else{
        
        if(strlen($album_name)>55 || strlen($album_description)>255){
            
            $errors[]="One or more fields contains too many charecters"; 
        }
    }
    
    if (!empty($errors)){
        
        foreach ($errors as $error){
            
            echo $error ,'<br />';
        }
    }else{
        
        edit_album($album_id,$album_name,$album_description);
        header('Location:albums.php');
        exit();
    }
 }
 ?>


<!--This is Right DIV,which is kept blank for design purpose--> 
<div class="mainDiv" id="right"></div>

<!--This is the footer template that inludes JavaScripts and Ending of All HTML elements including Footer DIV-->
<?php include "/template/footer.php" ;?>
