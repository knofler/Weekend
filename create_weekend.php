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
    $weekend_name=fetch('wknd_name');

     //fetch weekend description
    $weekend_desc=fetch('wknd_desc');
    
    //fetch food
    $food=fetch('food');
    
       //fetch friend
    $friends=fetch('friend');
    
    //find friend's ID from `users` table to input in weekend table
   $friend_id=array();
    foreach($friends as $friend){
        $friend_id[]=findFriends($friend);
        
        //TROUBLESHOOTING
        //echo $friend_id;
    }
    
    
    //fetch place
    $place=fetch('place');
    
    //fetch date
    $date=fetch('date');
    
    // fetch cost
    $cost=fetch('cost');    
    if (is_numeric($cost)){
        $cost=(float) $cost;
    }else{
        $cost=0;
    }
    
    
     //create error array
        $errors=array();
        
        
        //check condition and populate error array
        if(empty($weekend_name) || empty($weekend_desc)){
            $errors[]='Weekend name and description required';
        }else{
            
            if (strlen($weekend_name) > 55  || strlen($weekend_desc) > 255 ){   
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
            create_weekend($weekend_name,$weekend_desc,$place,$friend_id,$date);
            header('location:weekend.php');
            exit();
        }
        
        ?>
    
 </div><!--End of container DIV-->   
<!--This is Right DIV,which is kept blank for design purpose--> 
<div class="mainDiv" id="right"></div>

<!--This is the footer template that inludes JavaScripts and Ending of All HTML elements including Footer DIV-->
<?php include "/template/footer.php" ;
}
?>
