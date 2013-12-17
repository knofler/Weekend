    <?php
    
    //insert to friend table
        function create_friend($friend_usr_id,$friend_name,$friend_email){
        
            //INSERT INTO DB
           mysql_query("INSERT INTO `friend` VALUES('','$friend_usr_id','".$_SESSION['user_id']."',UNIX_TIMESTAMP(),'$friend_name','$friend_email')");
           header('location:friends.php');
           exit();
           //TROUBLESHOOTING
           //echo "DB updated";
        };
        
        
    //find friend's user id from users table
      function findFriends($email){
      $frnd_usr_id;
        $query=mysql_query("SELECT `user_id` FROM `users` WHERE `email`='$email'");
        while($user_id=mysql_fetch_assoc($query)){
          $frnd_usr_id=$user_id['user_id'];
        }
      //print_r($frnd_usr_id);
        return $frnd_usr_id;
      }
      
    
    //get each users friendlist for adding to weekend purpose
     function getFriends($user_id){
       $frnd_list=array();
        $query=mysql_query("SELECT `friend_usr_id`,`timestamp`,`frnd_name`,`frnd_email` FROM `friend` WHERE `user_id`='$user_id'");
        while( $frnd_list_row=mysql_fetch_assoc($query)){
          $frnd_list[]=array(
                            'frd_usr_id'=>$frnd_list_row['user_id'],
                            'my_frd_usrid'=>$frnd_list_row['friend_usr_id'],
                            'timestamp'=>$frnd_list_row['timestamp'],
                            'frnd_name'=>$frnd_list_row['frnd_name'],
                            'frnd_email'=>$frnd_list_row['frnd_email']  
                             );
        }
        //print_r($frnd_usr_id);
        return $frnd_list;
     }
    
    //Accept friend request
    function ask_friendship($user_id){
      
      
      
      
    }
    ?>