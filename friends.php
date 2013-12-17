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
            <div id="weekend_head">Friends
            <div class="create_click">Create Friends</div>
            </div>
        
             <?php
             
                echo
                 '<div class="slidingDiv" id="create_weekend_show">               
                       <article>
                   <form class="weekend_form" action="create_friend.php" method="post" enctype="multipart/form-data">      
                  <fieldset class="weekend_fieldset">
                  <legend>Create Friend</legend>
                  <label for="Friend Name"></label>
                   <input class="weekend_input" type="text" name="frnd_name" maxlength="55" required placeholder="Friend Name"/><br />
                  <label for="Friend Email"></label>
                  <input class="weekend_input" type="email" name="frnd_email" maxlength="55" required placeholder="Friend Email"/><br />
                <input class="weekend_input" id="button" type="submit" value="Add Friend" />
                  </fieldset>    
                  </form>
                  </article>
                  </div>';
                
                $my_friends=getFriends($_SESSION['user_id']);
              
            
             foreach ($my_friends as $each_frnd){
                
            
                if (empty($each_frnd)){
                    echo '<p>you don\'t have any Friends,Please Create Friends</a></p>';
                }else{
            //echo print_r($each_frnd['my_frd_usrid']);
                    
                    
                echo '
                <div id="weekend_div_wrapper">
                    <div class="webkit_wrap">';
                    
                        echo '
                        <div id="slide_del"><a target="_top" class="slideremove" href="delete_friend.php?friend_id='.$each_frnd['frd_usr_id'].'">Delete</a></div>
                            <div class="show_hide_edit" id="',$each_frnd['frd_usr_id'],'">Edit</div>
                           <div class="show_hide_image" id="show_hide_image',$each_frnd['my_frd_usrid'],'">
                                <strong>',ucfirst(strtolower($each_frnd['frnd_name'])),'</strong>'.' ',ucfirst(strtolower($each_frnd['frnd_email'])),
                           '</div>     
                        </div>            
                    </div>
        
        
                                            
                        <div class="slidingEditDiv" id="editslide',$each_frnd['frd_usr_id'],'">
                        <article>
                        <form class="weekend_form" action="edit_weekend.php?wknd_id=',$each_frnd['frd_usr_id'],'" method="post"> 
                        <fieldset class="weekend_fieldset">
                        <legend class="weekend_legend">Edit WeekEnd</legend>
                        <label for="Weekend Name"></label>
                        <input class="weekend_input" type="text" name="f_name" maxlength="55" required value="',ucfirst(strtolower($each_frnd['frnd_name'])),'"/><br />
                        <label for="Description"></label>
                        <textarea class="weekend_teaxtArea" id="create_weekend" name="weekend_description" rows="6" cols="35" maxlength="255" required>',ucfirst(strtolower($weekend['wknd_desc'])),'</textarea><br/>
                        <input class="weekend_input" id="button" type="submit" value="Edit" />
                        </fieldset>    
                        </form>
                        </article>
                        </div>';
                     
                echo '<div class="imageDiv" id="imageDiv',$each_frnd['my_frd_usrid'],'">
                           
                            <h4 id="wk_dis">',ucfirst(strtolower($each_frnd['frnd_name'])),'</h4>
               
                            <div id="about_wknd">
                                <div id="desc">',ucfirst(strtolower($each_frnd['frnd_email'])),'</div>
                                </div>
                                </div>';
                        
        
       }
       
  };

?>
       
</div><!--End of container DIV-->
<!--div to popup with question if user wants to remove weekends-->
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
