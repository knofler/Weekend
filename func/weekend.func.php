  <?php
  
  //insert to weekend table function
      function create_weekend($weekend_name,$weekend_desc,$place,$friend_id,$date){
          //INSERT INTO weekend table
         mysql_query("INSERT INTO `weekend` VALUES('','".$_SESSION['user_id']."',UNIX_TIMESTAMP(),'$weekend_name','$weekend_desc','$place','$date')");
         //get just created weekend id from the below query
         $wknd_id=mysql_insert_id();
         add_weekendMember($wknd_id,$friend_id);
          
          mysql_query("INSERT INTO `albums` VALUES ('','".$_SESSION['user_id']."', UNIX_TIMESTAMP(),'$weekend_name','$weekend_desc')");
          mkdir('uploads/'.mysql_insert_id(),0744);
          mkdir('uploads/thumbs/'.mysql_insert_id(),0744);
          
         //echo $wknd_id;
      };
  
  //function to edit weekend for each user
   function edit_weekend($wknd_id,$wknd_name,$wknd_desc){
      $wknd_id=(int)$wknd_id;
      $wknd_name=mysql_real_escape_string($wknd_name);
      $wknd_desc=mysql_real_escape_string($wknd_desc);
      mysql_query("UPDATE `weekend` SET `wknd_name`='$wknd_name', `wknd_desc`='$wknd_desc' WHERE `wknd_id`=$wknd_id AND `user_id`=".$_SESSION['user_id']);
  }
  
  //Delete weekend entry from weekend and wknd_member table   
  function delete_weekend($wknd_id){
      $wknd_id=(int)$wknd_id;
      //delete directory from server using recurssive methods here---
      mysql_query("DELETE FROM `weekend` WHERE `wknd_id`=$wknd_id AND `user_id`=".$_SESSION['user_id']);
      mysql_query("DELETE FROM `wknd_member` WHERE `wknd_id`=$wknd_id AND `user_id`=".$_SESSION['user_id']);    
  }   
      
  //run query to find if current user is the creator of the supplied weekend id
      function weekend_check($wknd_id){
      $wknd_id=(int)$wknd_id;
      $query=mysql_query("SELECT COUNT(`wknd_id`) FROM `weekend` WHERE `wknd_id`=$wknd_id AND `user_id`=".$_SESSION['user_id']);
      return (mysql_result($query,0)==1)?true:false;
  };
     
  //get weekend data from weekend table to use as data for  various form calculation and display results, similar function as getWeekend(), could be used interchangebly 
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
  }
  
  //get weekend function
    function getWeekend($wknd_id){
      $weekend=array();
      $user_id=$_SESSION['user_id'];
      //run query to find the weekend lists for the specific user_id
      $query=mysql_query("SELECT * from `weekend` WHERE `wknd_id`=$wknd_id ORDER BY `date`");
       while($weekend_row=mysql_fetch_assoc($query)){
        $weekend[]=array(
                      'wknd_id'=>$weekend_row['wknd_id'],
                      'user_id'=>$weekend_row['user_id'],
                      'timestamp'=>$weekend_row['timestamp'],
                      'wknd_name'=>$weekend_row['wknd_name'],
                      'wknd_desc'=>$weekend_row['wknd_desc'],
                      'place'=>$weekend_row['place'],
                      'date'=>$weekend_row['date']
                  );
      }
      return $weekend;
    };
  
  ?>