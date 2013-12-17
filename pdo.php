<?php

$config['db'] =array(

    'host'     =>'localhost',
    'username' =>'root',
    'password' =>'testfbe',
    'dbname'   =>'weekend'
);
 
 $db=new PDO('mysql:host='.$config['db']['host'].';dbname='.$config['db']['dbname'],$config['db']['username'],$config['db']['password'].'');

 $query=$db->query("SELECT `status`.`status_ID`,`status`.`status` FROM `status`");
 
 //print_r($query);
 $row=$query->fetchAll(PDO::FETCH_ASSOC);
 
 echo '<pre>',print_r($row,true),'</pre>';
 
 //while($row){
 //   
 //   echo $row ,'<br />';
 //}
?>