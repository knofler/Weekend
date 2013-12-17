    <?php
    
      //insert to weekend table function
        function create_food($wknd_id,$food_name,$cost){
            //connect to Database
            mysql_connect('localhost','root','testfbe') or die("Could not connect to host");
            mysql_select_db('weekend') or die("Could not connect to database");
            //INSERT INTO DB
           mysql_query("INSERT INTO `food` VALUES('','$wknd_id','".$_SESSION['user_id']."','$food_name','$cost', UNIX_TIMESTAMP())");
            header('location:weekend.php');
            exit();
        };
            
?>