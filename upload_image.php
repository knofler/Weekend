<?php
include 'init.php';

if (!logged_in()){
    header('location:index.php');
    exit();
}

include "/template/header.php" ;


?>
<!--This is left DIV,which is kept blank for design purpose-->
<div class="mainDiv" id="left"></div>

<!--This is Main Container DIV,which contains main HTML structures for this page.-->
<div class="mainDiv" id="container" >


<h3>Upload Image</h3>

<?php

$allowed_ext=array('jpg','jpeg','png','gif');

if (isset($_FILES['image'],$_POST['album_id']) ){
    
    $album_id=$_POST['album_id'];
    
    $files=$_FILES['image'];
    
    for ($x=0; $x < count($files['name']); $x++){
        
        $image_name=$files['name'][$x];
        $image_size=$files['size'][$x];
        $image_temp=$files['tmp_name'][$x];
    
  
    $image_ext=strtolower(end(explode('.',$image_name)));
   
    
    $errors=array();
    
    if(empty($image_name) || empty($album_id)){
        $errors[]='Something is missing.';
    }else{
        
         if(in_array($image_ext,$allowed_ext)===false){
                
                $errors[]='File type not allowed';
            }
            
             if($image_size > 2097152){
                
                $errors[]='Maximum image size is 2Mb';
            }
            
            
            if(weekend_album_check($album_id)===false){
                
                $errors[]='You can\'t upload image to this album';
            }
        }
        
        if(!empty($errors)){
            
            foreach($errors as $error){
                
                echo $error , '<br />';
            }
        }else{
            
            
             upload_image($image_temp, $image_ext, $album_id);
        }
    }
      header('Location:albums.php?album_id='.$album_id);
         exit();
}

$albums=get_albums();

if(empty($albums)){
    
    echo '<p>You don\'t have any albums.<a href="create_album.php">Create an album</a></p>';
}else{
    
    ?>
<article>

<form action="" method="post" enctype="multipart/form-data">
<fieldset>
<legend>Upload Image</legend>
<label for="Upload photos"></label>
<input type="file" name="image[]" multiple/>
<label for="Album"></label>
<select name="album_id">
    <?php
    
    foreach($albums as $album){
        echo '<option value="',$album['id'],'">',$album['name'],'</option>';
    }
    ?>
</select><br />    
<input type="submit" value="Upload" />        
        

</fieldset>
</form>    

</article>
    <?php
}
?>
</div><!--End of container DIV-->


<!--This is Right DIV,which is kept blank for design purpose--> 
<div class="mainDiv" id="right"></div>

<!--This is the footer template that inludes JavaScripts and Ending of All HTML elements including Footer DIV-->
<?php include "/template/footer.php" ;?>
