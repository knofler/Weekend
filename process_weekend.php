<!--This is the header template that inludes HTML head,CSS files and Starting of the body element including Header DIV-->
<?php
include 'init.php';



include "/template/header.php" ;




//capture submited form in these variables

$get_status=$_POST['brag'];
$get_checkin=$_POST['checkin'];
//$get_status=$_POST['brag'];
//$get_status=$_POST['brag'];
//$get_status=$_POST['brag'];

//if (isset ($_FILES['image'])){
//    
//    $image_name=$_FILES['image']['name'];
//    $image_size= $_FILES['image']['size'];
//    $image_temp= $_FILES['image']['tmp_name'];
//    
//    $allowed_ext=array{'jpg','jpeg,''png','gif'};
//    $image_ext=strtolower(end(explode('.',$image_name)));
//}

//insert data into database

 //Insert static values into users table
                             
 $dbt="status";
 
$sql_insert="INSERT INTO $dbt VALUES ('','$get_status','$get_checkin')";

//RUN SQL INSERT QUERY
$sql_result=mysql_real_escape_string(mysql_query($sql_insert));

echo "Data submited to DB";

//This is the footer template that inludes JavaScripts and Ending of All HTML elements including Footer DIV
include "/template/footer.php" ;


?>