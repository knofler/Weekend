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
    
    <div id="album_head">Albums
    <div class="create_click">Create Album</div>
    </div>
    
    
     <?php
     
     //print_r(get_albums());
    
     $albums=get_albums();
     echo
      '<div class="slidingDiv" id="create_album_show">
                                
                                   <article>
                                    <form class="album_form" action="create_album.php" method="post">
                                        
                                    <fieldset class="album_fieldset">
                                        <legend class="album_legend">Create Album</legend>
                                        <label for="Album Name"></label>
                                        <input class="album_input" type="text" name="album_name" maxlength="55" required placeholder="Album Name"/><br />
                                        <label for="Description"></label>
                                        <textarea class="album_teaxtArea" id="create_album" name="album_description" rows="6" cols="35" maxlength="255" required placeholder="Write about the photos,Your story"></textarea><br/>
                                        <input class="album_input" id="button" type="submit" value="Create" />
                                    </fieldset>    
                                        
                                    </form>
                                       
                                    </article>
                                </div>'; 
     
     
     if (empty($albums)){
        echo '<p>you don\'t have any album,Please Create Album </p>';
     }else{
        
        foreach ($albums as $album){
            
            $album_data=album_data($album['id'], 'name', 'description');
            $images=get_images($album['id']);
            
            
                echo '
            <div id="album_div_wrapper">
            
                <div class="webkit_wrap">
                   
                    <div id="slide_del"><a target="_top" class="slideremove" href="delete_album.php?album_id='.$album['id'].'">Delete</a></div>
                        <div class="show_hide_edit" id="',$album['id'],'">Edit</div>
                        <div class="show_hide_upload" id="',$album['id'],'">Upload</div>
                        <div class="show_hide_image" id="show_hide_image',$album['id'],'"><strong>',$album['name'],'</strong>'.' ',$album['description'],'</div>
                            
                </div>            
             </div>     
            
            <div class="slidingDiv" id="upload',$album['id'],'">
                
                    <article>
                   <form class="album_form" action="upload_image.php" method="post" enctype="multipart/form-data">
                    <fieldset class="album_fieldset">
                    <legend class="album_legend">Upload Image</legend>
                    <label for="Upload photos"></label>
                    <input class="album_upload" type="file" name="image[]" multiple/>
                    <label for="Album"></label>
                    <select class="album_select" name="album_id"><option value="',$album['id'],'">',$album['name'],'</option></select><br />    
                    <input class="album_input" id="button" type="submit" value="Upload" />        
                       </fieldset>
                    </form>    
                    </article>      
                </div>
                                
            <div class="slidingEditDiv" id="editslide',$album['id'],'">
            <article>
            <form class="album_form" action="edit_album.php?album_id=',$album['id'],'" method="post">
                    
                    
            <fieldset class="album_fieldset">
            <legend class="album_legend">Edit Album</legend>
            <label for="Album Name"></label>
            <input class="album_input" type="text" name="album_name" maxlength="55" required value="',$album['name'],'"/><br />
            <label for="Description"></label>
            <textarea class="album_teaxtArea" id="create_album" name="album_description" rows="6" cols="35" maxlength="255" required>',$album_data['description'],'</textarea><br/>
            <input class="album_input" id="button" type="submit" value="Edit" />
                </fieldset>    
                    
                </form>
                   
                </article>
                </div>'
                                
             ;
             
             echo '<div class="imageDiv" id="imageDiv',$album['id'],'">
                                
                    <h3>',$album_data['name'],'</h3> <p>',$album_data['description'],'</p>
                    <div id="image_container">';
                  if(empty($images)){
                    
                    echo '<div id="empty_image">You dont have any images in this album.Please  <div class="show_hide" id="',$album['id'],'">Upload</div></div>';
                  }
             foreach($images as $image){
            
               
                          echo     
                            '<a href="uploads/',$image['album'],'/',$image['id'],'.',$image['ext'],'">
                            <div id="each_thumb"><img id="img_thumbs" src="uploads/thumbs/',$image['album'],'/',$image['id'],'.',$image['ext'],'" title="Uploaded ',date('D M Y /h:i', $image['timestamp']), '" /></a></div> [<a href="delete_image.php?image_id=',$image['id'],'">x</a>]';
                        
                        }
             
             echo '</div></div>';
             
            }
       
     }
     ?>
    
     
    </div><!--End of container DIV-->
    
    
    
    
    <!--div to popup with question if user wants to remove albums-->
           <div id="dialog-confirm"> 
                <p class="message">Are you sure, you want to delete this Album?</p>
                <div class="buttons"> 
                    <a class="cancel" href="#"><input type="button" class="button" id="confirm" value="Cancel"/></a>
                    <a class="ok" href="#"><input type="button" class="button" id="confirm" value="Ok"/></a>
                </div> 
            </div>
    
    
    <!--This is Right DIV,which is kept blank for design purpose--> 
    <div class="mainDiv" id="right"></div>
    
    <!--This is the footer template that inludes JavaScripts and Ending of All HTML elements including Footer DIV-->
    <?php include "/template/footer.php" ;?>
