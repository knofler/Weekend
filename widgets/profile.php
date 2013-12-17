<a class="menu_a" href="profile.php"><div class="profile_menuDiv" id="logged_in">
<?php
//print_r(user_data('name','email'));

//$name returns $args from user_data function, which is an associative array.
$name=user_data('name');
//so echo $name array with key 'name' to get the user name outputed.
echo $name['name'];
?>
</div></a>
<ul>
   <li class="profile_menu_li"><a class="profile_a" href="create_album.php"><div class="profile_submenu" id="div1"><p class="sub_profile_p" id="with_border">Profile</p></div></a></li>
   <li class="profile_menu_li"><a class="profile_a" href="create_album.php"><div class="profile_submenu" id="div2"><p class="sub_profile_p"id="with_border">Settings</p> </div></a></li>
   <li class="profile_menu_li"><a class="profile_a" href="logout.php"><div class="profile_submenu" id="div3"><p class="sub_profile_p" id="last_section">Logout</p> </div></a></li>
</ul>
</li>
</ul>