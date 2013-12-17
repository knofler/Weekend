<!--This is the header template that inludes HTML head,CSS files and Starting of the body element including Header DIV-->
<?php

include 'init.php';

if(logged_in()){
include "/template/header.php" ;

//fetch GET value
function fetch($name){
    return (isset ($_POST[$name]) ? $_POST[$name] : '');
}

    //fetch friend name
    $friend_name=fetch('frnd_name');

     //fetch friend email address
    $friend_email=fetch('frnd_email');
    
    //get friends user id from user table and using friends email address
    $friend_usr_id=findFriends($friend_email);
    
     //create error array
        $errors=array();
        
        
        //check condition and populate error array
        if(empty($friend_name) || empty($friend_email)){
            $errors[]='Friend name and Email address required';
        }else{
            
            if (strlen($friend_name) > 55){   
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
            create_friend($friend_usr_id,$friend_name,$friend_email);
            header('location:friends.php');
            exit();
        }
        
        ?>



<!--This is left DIV,which is kept blank for design purpose-->
<div class="mainDiv" id="left"></div>

<!--This is Main Container DIV,which contains main HTML structures for this page.-->
<div class="mainDiv" id="container" >
    
 </div><!--End of container DIV-->   
<!--This is Right DIV,which is kept blank for design purpose--> 
<div class="mainDiv" id="right"></div>

<!--This is the footer template that inludes JavaScripts and Ending of All HTML elements including Footer DIV-->
<?php include "/template/footer.php" ;
}
?>
