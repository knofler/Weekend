<!--This is the header template that inludes HTML head,CSS files and Starting of the body element including Header DIV-->
<?php

include 'init.php';

if(logged_in()){
include "/template/header.php" ;

//get weekend information to auto populate list for user

$weekends=getWeekend($_SESSION['user_id']);



?>


<!--This is left DIV,which is kept blank for design purpose-->
<div class="mainDiv" id="left"></div>

<!--This is Main Container DIV,which contains main HTML structures for this page.-->
<div class="mainDiv" id="container" >
    
    <article>
        
        <form id="calc" action="./api/calc_db.php" method="post" >
            
            <fieldset>
                <legend>Weekend Calculator</legend>
                    <label class="wkd_exp" for="Place">Place</label>
                    <?php
             if (empty($weekends)){
                echo '<p>you don\'t have any weekend entry,Please <a href="create_weekend.php">Create Weekend here</a></p>';
            }else{
               
            
                     foreach($weekends as $weekend){
                        //$weekend_data=weekend_data($weekend['wknd_id'], 'date','place', 'food','cost');
                        
                                echo '<select class="weekend_select" id="select_id" name="weekend_id"><option value="',$weekend['wknd_id'],'">' ,$weekend['place'],'</option>
                                </select>
                                <label class="wkd_exp" for="Date">Date</label>
                    <select class="weekend_select" name="weekend_date"><option value="',$weekend['date'],'">' ,$weekend['date'],'</option> </select><br />
                     <label class="wkd_exp" for="Food">Food</label>
                     <select class="weekend_select" name="weekend_food"><option value="',$weekend['food'],'">' ,$weekend['food'],'</option> </select><br />
                     <label class="wkd_exp" for="Cost">Cost</label>
                     <select class="weekend_select" name="weekend_cost"><option value="',$weekend['cost'],'">' ,$weekend['cost'],'</option> </select><br />';
                               
                      };//end of for each
                     
            }//end of else
                ?>
                    
                    
                    <label class="wkd_exp" for="quick"><input type="checkbox" id="quick" checked="checked"/>Quick Calculation</label>
                    <input type="hidden" name="format" value="json"/>
                    
                    <button type="submit">Submit</button>
            </fieldset>
            
        </form>
        
        <div id="output">
          
                <table>
                    <tr><th>Place</th><td></td></tr>
                    <tr><th>Food </th><td></td></tr>
                    <tr><th>Total Expense</th><td></td></tr>
                    <tr><th>Each Share </th><td></td></tr>
                    <tr><th>People </th><td></td></tr>
                    <tr><th>Date </th><td></td></tr>
                    <tr><th>My Share</th><td></td></tr>
                </table>

        </div>
    </article>
 </div><!--End of container DIV-->   
<!--This is Right DIV,which is kept blank for design purpose--> 
<div class="mainDiv" id="right"></div>

<!--This is the footer template that inludes JavaScripts and Ending of All HTML elements including Footer DIV-->
<?php include "/template/footer.php" ;
}
?>
