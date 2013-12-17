  <?php
  
   //insert weekend members to `wknd_member` table
     function add_weekendMember($wknd_id,$user_id){
        //INSERT weekend creator INTO wknd_member table
        mysql_query("INSERT INTO `wknd_member` VALUES('',$wknd_id,'".$_SESSION['user_id']."',UNIX_TIMESTAMP())");
        foreach($user_id as $each_frd){
         //INSERT weekend member INTO wknd_member table
          mysql_query("INSERT INTO `wknd_member` VALUES('',$wknd_id,$each_frd,UNIX_TIMESTAMP())");
        }
     }
  
  
  //get user name from the user table using using user id, either friend or owner
     function getUserInfo($user_id){
      $userInfo=array();
      
      $query=mysql_query("SELECT * from `users` where `user_id`=$user_id");
      
      while($user_row=mysql_fetch_assoc($query)){
        
            $userInfo[]=array(
              'usr_id'=>$user_row['user_id'],
              'email'=>$user_row['email'],
              'name'=>$user_row['name']
            );
      } 
      return $userInfo;
     };
      
      
  //find what are the weekends each user is member off
    function member_of_weekend($user_id){
      $wkndID_list=array();
         //run query to find the weekend lists for the specific user_id
      $query=mysql_query("SELECT  * FROM  `wknd_member` WHERE  `user_id` =$user_id");
           //$wkndID_list=(mysql_numrows($query)>0)?mysql_fetch_assoc($query,0):false;
              while($weekend_row=mysql_fetch_assoc($query)){
        $wkndID_list[]=array(
                      'wknd_member_id'=>$weekend_row['wknd_member_id'],
                      'wknd_id'=>$weekend_row['wknd_id'],
                      'user_id'=>$weekend_row['user_id'],
                      'timestamp'=>$weekend_row['timestamp']
                  );
      }   
      return $wkndID_list;
    }
      
      
     // find who are the members for each weekend
      function getWknd_Members($wknd_id){
          $memberID_list=array();
         //run query to find the weekend lists for the specific user_id
      $query=mysql_query("SELECT  * FROM  `wknd_member` WHERE  `wknd_id` =$wknd_id");
           //$wkndID_list=(mysql_numrows($query)>0)?mysql_fetch_assoc($query,0):false;
              while($weekend_row=mysql_fetch_assoc($query)){
        $memberID_list[]=array(
                      'wknd_member_id'=>$weekend_row['wknd_member_id'],
                      'wknd_id'=>$weekend_row['wknd_id'],
                      'user_id'=>$weekend_row['user_id'],
                      'timestamp'=>$weekend_row['timestamp']
                  );
      }    
      return $memberID_list;  
    }
  
  ?>