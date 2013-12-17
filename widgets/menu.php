<?php
?>
<div class="menuDiv" id="home"><a class="menu_a" href="index.php">Home</a></div>
<?php
if (logged_in()){
?>
<ul class="menu_ul">
    <!--<li class="menu_li"><a class="menu_a" href="create_album.php"><div class="menuDiv" id="div1">Create Album </div></a></li>-->
        <li class="menu_li"><a class="menu_a" href="albums.php"><div class="menuDiv" id="div2">Albums </div></a></li>
    <li class="menu_li"><a class="menu_a" href="weekend.php"><div class="menuDiv" id="div2">Weekend</div></a></li>
   
        <ul class="menu_ul_sub"><a class="menu_a" href="friends.php"><div class="menuDiv" id="div3">Friends</div></a>
            
              <!--<li class="menu_li_sub"><a class="menu_a" href="create_friend.php"><div class="menuDiv" id="div3_sub">Add Friends</div></a></li>-->
          </ul>
   
    <!--<li class="menu_li"><a class="menu_a" href="upload_image.php"><div class="menuDiv" id="div3">Upload Image </div></a></li>-->
   <li class="profile_menu_ul"><?php include '/widgets/profile.php' ; ?>

<?php    
}else{
    ?>
<ul class="menu_ul">
    <li class="menu_li"><a class="menu_a" href="register.php"><div class="menuDiv" id="div2">Register </div></a></li>
    <li class="menu_li"><a class="menu_a" href="./widgets/login.php"><div class="menuDiv" id="login_click">Login </div></a></li>
</ul>
    
<?php    
}
?>
