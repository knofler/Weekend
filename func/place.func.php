    <?php
    
  //get each users friendlist for adding to weekend purpose
     function getSuburbs($place){
       $place_list=array();
        $query=mysql_query("SELECT `postcode`,`suburb`,`state_fn`,`states`,`city`,`latitude`,`longitude` FROM `ausuburb` WHERE `suburb`like '%$place%'");
        while( $place_list_row=mysql_fetch_assoc($query)){
          $place_list[]=array(
                            'postcode'=>$place_list_row['postcode'],
                            'suburb'=>$place_list_row['suburb'],
                            'state_fn'=>$place_list_row['state_fn'],
                            'states'=>$place_list_row['states'],
                            'city'=>$place_list_row['city'],
                            'latitude'=>$place_list_row['latitude'],
                            'longitude'=>$place_list_row['longitude']
                             );
        }
        //print_r($frnd_usr_id);
        return $place_list;
     }
    
    ?>