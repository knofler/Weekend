<!--This is the header template that inludes HTML head,CSS files and Starting of the body element including Header DIV-->
<?php

include 'init.php';

if(logged_in()){
include "/template/header.php" ;

//fetch GET value
function fetch($name){
    return (isset ($_POST[$name]) ? $_POST[$name] : '');
}

    //fetch weekend name
    $food_name=fetch('food_name');

    // fetch cost
    $cost=fetch('cost');    
   
    
    //fetch weekend id
    $wknd_id=fetch('wknd_id');
    
     //create error array
        $errors=array();
        
        
        //check condition and populate error array
        if(empty($food_name) || empty($cost)){
            $errors[]='Food name and cost required';
        }else{
            
            if (strlen($food_name) > 55 ){   
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
            create_food($wknd_id,$food_name,$cost);
              header('location:weekend.php');
            exit();
        }
        
        ?>



<!--This is left DIV,which is kept blank for design purpose-->
<div class="mainDiv" id="left"></div>

<!--This is Main Container DIV,which contains main HTML structures for this page.-->
<div class="mainDiv" id="container" >
    <div class="wknd_item">
           <article>
             <form class="album_form" action="wknd_expense.php" method="post">
                                        
                    <fieldset class="album_fieldset">
                        <legend>Weekend Expense</legend>
                            <label for="Weekend Name"></label>
                             <input class="album_input" type="text" name="food_name" maxlength="55" required placeholder="Food Name"/><br />
                            <label for="Cost"></label>
                             <input class="album_input" type="text" name="cost" maxlength="55" required placeholder="Expenses"/><br />
                             <label for="Weekend"></label>
                        <select class="album_select" name="wknd_id"><option value="',$weekend['wknd_id'],'">',$weekend['wknd_name'],'</option></select><br />   
                              <input class="album_input" id="button" type="submit" value="Expenses" />
                    </fieldset>    
                    </form>
                </article>
        
    </div>
    
 </div><!--End of container DIV-->   
<!--This is Right DIV,which is kept blank for design purpose--> 
<div class="mainDiv" id="right"></div>

<!--This is the footer template that inludes JavaScripts and Ending of All HTML elements including Footer DIV-->
<?php include "/template/footer.php" ;
}
?>
