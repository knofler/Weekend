<?php

$weekend ={
    
    //fields
    
    
    //constructors
    
    
    //methods
    
    //insert to friend table
    function create_friend($friend_usr_id,$friend_name,$friend_email){
        //INSERT INTO DB
       mysql_query("INSERT INTO `friend` VALUES('','$friend_usr_id','".$_SESSION['user_id']."',UNIX_TIMESTAMP(),'$friend_name','$friend_email')");
       echo "DB updated";

    },


 //insert to weekend table function
    function create_weekend($weekend_name,$weekend_desc,$place,$friend_id,$date){
        
        //connect to Database
        mysql_connect('localhost','root','testfbe') or die("Could not connect to host");
        mysql_select_db('weekend') or die("Could not connect to database");
        
        //INSERT INTO DB
       mysql_query("INSERT INTO `weekend` VALUES('','".$_SESSION['user_id']."','$friend_id', UNIX_TIMESTAMP(),'$weekend_name','$weekend_desc','$place','$date')");
       
       echo "DB updated";

    },
    
    
     //insert to weekend table function
    function create_food($wknd_id,$food_name,$cost){
        
        //connect to Database
        mysql_connect('localhost','root','testfbe') or die("Could not connect to host");
        mysql_select_db('weekend') or die("Could not connect to database");
        
        //INSERT INTO DB
       mysql_query("INSERT INTO `food` VALUES('','$wknd_id','".$_SESSION['user_id']."','$food_name','$cost', UNIX_TIMESTAMP())");
       
       echo "DB updated";

    },
    
    
  //get weekend function
  function getWeekend($user_id){
    
    $weekend=array();
    $user_id=$_SESSION['user_id'];
    
    //run query to find the weekend lists for the specific user_id
    $query=mysql_query("SELECT * from `weekend` WHERE `user_id`=$user_id  OR `frnd_id`=$user_id ORDER BY `date`");
    
    
     while($weekend_row=mysql_fetch_assoc($query)){
      
      $weekend[]=array(
                    'wknd_id'=>$weekend_row['wknd_id'],
                    'usr_id'=>$weekend_row['user_id'],
                    'frnd_id'=>$weekend_row['frnd_id'],
                    'timestamp'=>$weekend_row['timestamp'],
                    'wknd_name'=>$weekend_row['wknd_name'],
                    'wknd_desc'=>$weekend_row['wknd_desc'],
                    'place'=>$weekend_row['place'],
                    'date'=>$weekend_row['date']
                );
    }
    
    return $weekend;
  },
  
  
  //get weekend data from weekend table to use as data for display results
  function weekend_data($weekend_id){
    $weekend_id=(int)$weekend_id;
    
    $args=func_get_args();
    unset($args[0]);
    $fields='`'.implode('`, `',$args).'`';

    $query=mysql_query("SELECT $fields FROM `weekend` WHERE `wknd_id`='$weekend_id'");
    $query_result=mysql_fetch_assoc($query);
    
    foreach ($args as $field){
        
        $args[$field]=$query_result[$field];
    }
    
    return $args;
},


  //get expense data from food table to use as expense data for weekend results
  function expense_data($weekend_id){
    $expenses=array();
    $weekend_id=(int)$weekend_id;
    
    $query=mysql_query("SELECT * FROM `food` WHERE `wknd_id`=$weekend_id");
    
        while($expense_row=mysql_fetch_assoc($query)){ 
       $expenses[]=array(
                    'food_id'=>$expense_row['food_id'],
                    'wknd_id'=>$expense_row['wknd_ID'],
                    'usr_id'=>$expense_row['user_id'],
                    'food_name'=>$expense_row['food_name'],
                    'cost'=>$expense_row['cost'],
                    'timestamp'=>$expense_row['timestamp']
                );
        }
        return $expenses;
},
  
  //calculte total cost
  function costCalc($weekend_id){
    $totalCost=0;
    $costs=array();
    $weekend_id=(int)$weekend_id;
   
     $query=mysql_query("SELECT `cost` FROM `food` WHERE `wknd_ID`=$weekend_id");   
     while($costs_row=mysql_fetch_assoc($query)){ 
    $costs[]=array(
                   'cost'=>$costs_row['cost']
                   );
    //print_r($costs);
$totalCost+=$costs_row['cost'];
     }
  return $totalCost;
  },
  
  
    //calculte eachShare cost and individual cost
  function eachShare($weekend_id){
    $totalCost=0;
    
    $costs=array();
    $weekend_id=(int)$weekend_id;
   
     $query=mysql_query("SELECT `cost` FROM `food` WHERE `wknd_ID`=$weekend_id");   
     $query2=mysql_query("SELECT COUNT(`frnd_id`)  from `weekend` where `wknd_id`=$weekend_id");
     $totalMember=(mysql_result($query2,0)==1)?mysql_result($query2,0):false;
     while($costs_row=mysql_fetch_assoc($query)){ 
    $costs[]=array(
                   'cost'=>$costs_row['cost']
                   );
    //print_r($costs);
$totalCost+=$costs_row['cost'];
     }
     $eachShare=$totalCost/$totalMember;
//print_r($totalMember);
  return $eachShare;

  },
  
  
  //user spent for each weekend
  function youSpent($weekend_id,$user_id){
    $youSpent=0;
    $weekend_id=(int)$weekend_id;
    $user_id=(int)$user_id;
    
    $query=mysql_query("SELECT `cost` FROM `food` WHERE `wknd_ID`=$weekend_id AND `user_id`=$user_id");   
     while($costs_row=mysql_fetch_assoc($query)){ 
    $costs[]=array(
                   'cost'=>$costs_row['cost']
                   );
    //print_r($costs);
$youSpent+=$costs_row['cost'];
     }
  return $youSpent;
  },
  
  
  
      //calculte yourShare
  function yourShare($weekend_id){
    $totalCost=0;
    
    $costs=array();
    $weekend_id=(int)$weekend_id;
   
     $query=mysql_query("SELECT `cost` FROM `food` WHERE `wknd_ID`=$weekend_id");   
     $query2=mysql_query("SELECT COUNT(`frnd_id`)  from `weekend` where `wknd_id`=$weekend_id");
     $totalMember=(mysql_result($query2,0)==1)?mysql_result($query2,0):false;
     while($costs_row=mysql_fetch_assoc($query)){ 
    $costs[]=array(
                   'cost'=>$costs_row['cost']
                   );
    //print_r($costs);
$totalCost+=$costs_row['cost'];
     }
     
     $eachShare=$totalCost/$totalMember;
//print_r($totalMember);
  return $eachShare;

  },
  
  
  
  //find friends user id from users table
  function findFriends($email){
  $frnd_usr_id;
    $query=mysql_query("SELECT `user_id` FROM `users` WHERE `email`='$email'");
    while($user_id=mysql_fetch_assoc($query)){
      $frnd_usr_id=$user_id['user_id'];
    }
  //print_r($frnd_usr_id);
    return $frnd_usr_id;
  }
}


?>


