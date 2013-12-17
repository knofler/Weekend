<?php

//output buffering
ob_start();

//session_check
session_start();

//connect database
mysql_connect('localhost','root','testfbe') or die("Could not connect to host");
mysql_select_db('weekend') or die("Could not connect to database");


//include Album related functionsf
include 'func/album.func.php';
include 'func/image.func.php';
include 'func/user.func.php';
include 'func/thumb.func.php';

//include weekend related functions
include 'func/expense.func.php';
include 'func/friend.func.php';
include 'func/item.func.php';
include 'func/member.func.php';
include 'func/weekend.func.php';
include 'func/place.func.php';
?>