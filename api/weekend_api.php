            <?php
    
                echo
                 '<div class="slidingDiv" id="create_weekend_show">               
                       <article>
                   <form class="weekend_form" action="create_weekend.php" method="post" enctype="multipart/form-data">      
                  <fieldset class="weekend_fieldset">
                  <legend>Create Weekend</legend>
                  <label for="Weekend Name"></label>
                   <input class="weekend_input" type="text" name="wknd_name" maxlength="55" required placeholder="Weekend Name"/><br />
                  <label for="Description"></label>
                  <textarea class="weekend_teaxtArea" id="create_weekend" name="wknd_desc" rows="6" cols="35" maxlength="255" required placeholder="Write about the weekend story"></textarea><br/>
                  <label for="Weekend Place"></label>
                  <select class="weekend_select" id="e2_2" name="place" placeholder="Select a Suburb">
                  <option></option>';
                  foreach($places as $each_place){
                    echo '<option value="',$each_place['suburb'],'">',$each_place['suburb'],'</option>';
                  }
                  echo
                  '</select><br />
                  
                <label for="Weekend People"></label>
                  <select class="weekend_input" multiple id="e9" name="friend[]" tabindex="-1">';
                          
                  foreach($my_friends as $each_frnd){
                    echo '<option value="',$each_frnd['frnd_email'],'">',$each_frnd['frnd_name'],'</option>';
                  }
                  echo
                  '</select><br />
                  <label for="Weekend Date"></label>
                   <input class="weekend_input" type="date" name="date" required/><br />
                  <input class="weekend_input" id="button" type="submit" value="Create" />
                  </fieldset>    
                  </form>
                  </article>
                  </div>';
                
              $weekend_list=member_of_weekend($_SESSION['user_id']);//rumman is member of 3 weekends
              
             //TROUBLE SHOOTING 
                //foreach($weekend_list as $testar)
                //{
                //   $weekend_friends=getUserInfo($testar['wknd_id']);
                //   
                //   foreach($weekend_friends as $frd_name){
                //       
                //       echo $frd_name['name'],'<br />';
                //   }
                //}
                
             foreach ($weekend_list as $each_wknd){
                
                //echo print_r($each_wknd), '<br />';
                $weekends=getWeekend($each_wknd['wknd_id']);
                
                //TROUBLE SHOOTING
                //echo print_r($weekends), '<br />';
                //echo print_r($each_wknd['wknd_id']), '<br />';
                
            
                if (empty($each_wknd)){
                    echo '<p>you don\'t have any Weekend,Please Create Weekend</a></p>';
                }else{
                
                foreach ($weekends as $weekend){
                    
                    $expense_data=expense_data($weekend['wknd_id']);
                    $images=get_weekend_images($each_wknd['wknd_id']);
                    
                    //echo print_r($weekend['wknd_id']), '<br />';
                    
                    echo '
                    <div id="weekend_div_wrapper">
                    <div class="webkit_wrap">';
                            
                    // $weekend['wknd_id'] is each weekend rumman member off
                                
                    if(weekend_check($weekend['wknd_id'])){
                            
                    echo '
                    <div id="slide_del"><a target="_top" class="slideremove" href="delete_weekend.php?weekend_id='.$weekend['wknd_id'].'">Delete</a></div>
                        <div class="show_hide_edit" id="',$weekend['wknd_id'],'">Edit</div>
                       <div class="show_hide_upload" id="',$weekend['wknd_id'],'">Upload</div>
                       <div class="show_hide_exp" id="',$weekend['wknd_id'],'">Expense</div>
                       <div class="show_hide_image" id="show_hide_image',$weekend['wknd_id'],'">
                       <strong>',ucfirst(strtolower($weekend['wknd_name'])),'</strong>'.' ',ucfirst(strtolower($weekend['place'])),'</div>     
                    </div>            
                    </div>';
                    
                    }else{
                                
                    echo '
                    <div id="slide_gap"></div>
                    <div id="slide_gap"></div>
                    <div class="show_hide_upload" id="',$weekend['wknd_id'],'">Upload</div>
                    <div class="show_hide_exp" id="',$weekend['wknd_id'],'">Expense</div>
                    <div class="show_hide_image" id="show_hide_image',$weekend['wknd_id'],'">
                    <strong>',ucfirst(strtolower($weekend['wknd_name'])),'</strong>'.' ',ucfirst(strtolower($weekend['place'])),'</div>            
                    </div>            
                     </div>';
                     }//end of else
                           
                            
                    echo '
                    
                    <div class="slidingDiv" id="upload',$weekend['wknd_id'],'">    
                    <article>
                   <form class="weekend_form" action="upload_image.php" method="post" enctype="multipart/form-data">
                    <fieldset class="weekend_fieldset">
                    <legend class="weekend_legend">Upload Image</legend>
                    <label for="Upload photos"></label>
                    <input class="weekend_upload" type="file" name="image[]" multiple/>
                    <label for="Album"></label>
                    <select class="weekend_select" name="album_id"><option value="',$each_wknd['wknd_id'],'">',ucfirst(strtolower($weekend['wknd_name'])),'</option></select><br />    
                    <input class="weekend_input" id="button" type="submit" value="Upload" />        
                    </fieldset>
                    </form>    
                    </article>      
                    </div>
                        
                        
                    <div class="slidingDiv" id="expense',$weekend['wknd_id'],'">    
                    <article>
                    <form class="weekend_form" action="wknd_expense.php" method="post">                         
                    <fieldset class="weekend_fieldset">
                        <legend>Weekend Expense</legend>
                            <label for="Weekend Name"></label>
                             <input class="weekend_input" type="text" name="food_name" maxlength="55" required placeholder="Food Name"/><br />
                       <label for="Cost"></label>
                             <input class="weekend_input" type="text" name="cost" maxlength="55" required placeholder="Expenses"/><br />
                             <label for="Weekend"></label>
                        <select class="weekend_select" name="wknd_id"><option value="',$weekend['wknd_id'],'">',ucfirst(strtolower($weekend['wknd_name'])),'</option></select><br />   
                              <input class="weekend_input" id="button" type="submit" value="Expenses" />
                    </fieldset>    
                    </form>
                    </article>     
                    </div>
                                        
                    <div class="slidingEditDiv" id="editslide',$weekend['wknd_id'],'">
                    <article>
                    <form class="weekend_form" action="edit_weekend.php?wknd_id=',$weekend['wknd_id'],'" method="post"> 
                    <fieldset class="weekend_fieldset">
                    <legend class="weekend_legend">Edit WeekEnd</legend>
                    <label for="Weekend Name"></label>
                    <input class="weekend_input" type="text" name="weekend_name" maxlength="55" required value="',ucfirst(strtolower($weekend['wknd_name'])),'"/><br />
                    <label for="Description"></label>
                    <textarea class="weekend_teaxtArea" id="create_weekend" name="weekend_description" rows="6" cols="35" maxlength="255" required>',ucfirst(strtolower($weekend['wknd_desc'])),'</textarea><br/>
                    <input class="weekend_input" id="button" type="submit" value="Edit" />
                    </fieldset>    
                    </form>
                    </article>
                    </div>';
                     
echo '<div class="imageDiv" id="imageDiv',$weekend['wknd_id'],'">
                           
                    <h4 id="wk_dis">',ucfirst(strtolower($weekend['wknd_name'])),'</h4>
               
                <div id="about_wknd">
                            <div id="desc">',ucfirst(strtolower($weekend['wknd_desc'])),'</div>';
                            
        $wknd_memberList=getWknd_Members($each_wknd['wknd_id']);
        //echo print_r($wknd_memberList['wknd_id']), '<br />';
               
                    echo '<div id="wk_info">';
                                
                                $weekend_owner=getUserInfo($weekend['user_id']);
                                foreach($weekend_owner as $each_info){
                                   echo '<div id="wk_crt">Weekend creator: ',$each_info['name'],
                                            '</div>';
                                }
                                echo '<div id="wk_date">Date: ',$weekend['date'],'</div>
                                <ul id="ul_wkn_mbr">';
                               foreach($wknd_memberList as $wknd_member){
                                   $weekend_friends=getUserInfo($wknd_member['user_id']);
                                   //echo print_r($wknd_member['user_id']), '<br />';
                                       foreach($weekend_friends as $each_frd){
                                           echo '<li id="each_mbr">',$each_frd['name'],'</li>';
                                       }  
                               };
                              
                               echo '</ul>                                        
                            </div>
                            <div id="wk_gap_1"></div>
                            <div class="wk_loc" id="wk_loc',$weekend['wknd_id'],'">',$weekend['place'],'</div><div id="wk_gap"></div>
                            <div class="show_loc_map" id="show_loc_map',$weekend['wknd_id'],'"></div>
                            <div id="wk_gap_2"></div>
                </div>';
            
            echo '<div id="wk_table">
                        <table class="wk_exp">
                            <tr id="exp_tr_head">
                                <td id="exp_td_head">Food</td>
                                <td id="exp_td_head">Person Paid</td>
                                <td id="exp_td_head">Cost</td>
                            </tr>';
                        
            foreach($expense_data as $expense){
                        $user_paid=getUserInfo($expense['usr_id']);
                foreach($user_paid as $userP_name){
                       
                        echo '
                            <tr id="exp_tr_data">
                               <td id="exp_td_data">',$expense['food_name'] ,'</td>
                               <td id="exp_td_data"> ',$userP_name['name'],'</td>
                               <td id="exp_td_data">',' $',number_format($expense['cost'],2),'</td>
                            </tr>';
                }
            }
               
               $totalCost=costCalc($weekend['wknd_id']);
               $youSpent=youSpent($weekend['wknd_id'],$_SESSION['user_id']);
               $eachShare=eachShare($weekend['wknd_id']);
               
                        //echo '<p>Total Cost for this weekend is:  $',$totalCost,'</p>';
                        echo '
                            <tr id="tr_total_odd">
                                <td id="td_total_name" colspan=2>Total Cost for this weekend is</td>
                                <td id="td_total_val">$',number_format($totalCost,2),'</td>
                            </tr>';
                        echo '
                            <tr id="tr_total_even">
                                <td id="td_total_name" colspan=2>You have Spent for this weekend is</td>
                                <td id="td_total_val">$',number_format($youSpent,2),'</td>
                            </tr>';
                        echo '
                            <tr id="tr_total_odd">
                                <td id="td_total_name" colspan=2>Each Person share for this weekend is</td>
                                <td id="td_total_val">$',number_format($eachShare,2),'</td>
                            </tr>';
                            
               $yourShare=yourShare($weekend['wknd_id']);
               
                        echo $yourShare;
                        echo '</table>
                    </div>';
               
               
              echo '<div id="image_container">';
             if(empty($images)){
              
               echo '<div id="empty_image">You dont have any images in this weekend.Please  <div class="show_hide" id="',$weekend['id'],'">Upload</div></div>';
             }
        foreach($images as $image){
        
                     echo     
                       '<a href="uploads/',$image['album'],'/',$image['id'],'.',$image['ext'],'">
                       <div id="each_thumb"><img id="img_thumbs" src="uploads/thumbs/',$image['album'],'/',$image['id'],'.',$image['ext'],'" title="Uploaded ',date('D M Y /h:i', $image['timestamp']), '" /></a></div> [<a href="delete_image.php?image_id=',$image['id'],'" style="color:red;font-size:bold">x</a>]';
                   
                   }
        
        echo '</div>
    </div>';
        
       }
       
  }
  
}
?>
 <!--This is the footer template that inludes JavaScripts and Ending of All HTML elements including Footer DIV-->
            <?php include "/template/footer.php" ;?>

