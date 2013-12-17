<?php
include 'init.php';

if (!logged_in()){
    header('location:index.php');
    exit;
}

//This is the header template that inludes HTML head,CSS files and Starting of the body element including Header DIV

include "/template/header.php" ;
?>

<!--This is left DIV,which is kept blank for design purpose-->
<div class="mainDiv" id="left"></div>

<!--This is Main Container DIV,which contains main HTML structures for this page.-->
<div class="mainDiv" id="container" >


<!--this section is to grab the form data and submit into database-->
        <?php
        
        //variables to grab form inputs
        $album_id=$_GET['album_id'];
        $image_id=$_GET['image_id'];
        
        //create error array
        $errors=array();
        
        
        //check condition and populate error array
        if(empty($album_name) || empty($album_description)){
            $errors[]='Album name and description required';
        }else{
            
            if (strlen($album_name) > 55  || strlen($album_description) > 255 ){   
            $errors='One or more fields contains too many characters';    
            }
        }
        
        //check if error array has any entry, then output error
        if (!empty($errors)){
            
            foreach ($errors as $error){ 
                echo $error, '<br/>' ;
            }
        }
        //if no error found call create album function to insert form data to database table(Album here).
        else{
            show_image($album_id,$image_id);
            header('location:albums.php');
            exit();
        }
        ?>
        
    <div id="show_image">

    
</div>
</div><!--End of container DIV-->


<!--This is Right DIV,which is kept blank for design purpose--> 
<div class="mainDiv" id="right"></div>

<?php include "/template/footer.php" ; ?>
