<?php
include 'init.php';

if (!logged_in()){
    header('location:index.php');
    exit();
}

if(!isset($_GET['album_id']) || empty($_GET['album_id']) || album_check($_GET['album_id'])===false){
    
    header('location:albums.php');
    exit();
}

include "/template/header.php" ;

?>
<!--This is left DIV,which is kept blank for design purpose-->
<div class="mainDiv" id="left"></div>

<!--This is Main Container DIV,which contains main HTML structures for this page.-->
<div class="mainDiv" id="container" >

 <?php
$album_id=$_GET['album_id'];

$album_data=album_data($album_id, 'name', 'description');

 echo '<h3>',$album_data['name'],'</h3> <p>',$album_data['description'],'</p>';

$images=get_images($album_id);

if(empty($images)){
    echo 'There are no images in this album';
}else{

    //print_r($images);
    foreach($images as $image){
        
       echo '<a href="uploads/',$image['album'],'/',$image['id'],'.',$image['ext'],'"><img src="uploads/thumbs/',$image['album'],'/',$image['id'],'.',$image['ext'],'" title="Uploaded ',date('D M Y /h:i', $image['timestamp']), '" /></a> [<a href="delete_image.php?image_id=',$image['id'],'">x</a>]';   
    }
}    
 
?>
</div><!--End of container DIV-->


<!--This is Right DIV,which is kept blank for design purpose--> 
<div class="mainDiv" id="right"></div>

<!--This is the footer template that inludes JavaScripts and Ending of All HTML elements including Footer DIV-->
<?php include "/template/footer.php" ;?>
