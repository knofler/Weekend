<?php

$config['db']=array(
    
  'host' => 'localhost',
  'username' => 'root',
  'password' => 'testfbe',
  'dbname'  => 'weekend'
);

$db= new PDO('mysql:host='.$config['db']['host'].';dbname='.$config['db']['dbname'],$config['db']['username'],$config['db']['password'].'');

//$db->getAttribute(PDO::errorCode,PDOException);
//$query=$db->query("SELECT `status`.`status_ID`,`status`.`status` FROM `status`");

$query=$db->prepare("SELECT `status`.`status` from `status` where `status` like '%this%'");



$query->execute();

$row=$query->fetchAll(PDO::FETCH_ASSOC);

echo '<pre>',print_r($row),'</pre>';


echo $db->rowCount();

?>

