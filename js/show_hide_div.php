<?php
?>
<script>
$(document).ready(function(){
	     
	 $(".header_loginDiv").hide()
	 $('#mates_div').hide();
	 //$("#checkin_div").hide();
	 $("#wknd_photos_div").hide();
	 
	 //Hide profile submenu div on page load
	  $(".profile_submenu").hide();
	  
	 
	 //click on profile to show sub menu tabs
	 $(".profile_menuDiv").click(function(e){
	 $(".profile_submenu").show(400,function(){
	    $(".profile_menuDiv").click(function(e){
	       $(".profile_submenu").hide()});
		     e.preventDefault();
	    });
   e.preventDefault();
	 });
	  //click on login to show sub menu tabs
	 $("#login_click").click(function(e){
	 $(".header_loginDiv").show(400,function(){
	    $("#login_click").click(function(e){
	       $(".header_loginDiv").hide()});
		     e.preventDefault();
	    });
   e.preventDefault();
	 });
   
	 //Hide .slidingDiv class and .slidingEditDiv class div on page load
	$(".slidingDiv").hide();
	$(".slidingEditDiv").hide();
	
	 
	//Show upload image,display album,create album and Edit Album click button div on page load
	 $(".show_hide_upload").show();
	 $(".show_hide_exp").show();
	 $(".show_hide_edit").show();
	 $(".show_hide_image").show();
	 $(".create_album_click").show();
	 
	 
	 //Hide display image div on page load
	$(".imageDiv").hide();
	  
   
      //UPLOAD IMAGE-grab class of sliding div and combined its ID with variable and call slideToggle function on that element to get the sliding effect   
      $(".show_hide_upload").click(function(){
       var $str = $(this).attr("id");
       console.log($str);
       var $index = $str.replace('show_hide', '');
	 console.log($index);
       var divName = "#upload" + $index;
	console.log(divName);
       $(divName).slideToggle();
   
   });
      
	 //Weekend expense-grab class of sliding div and combined its ID with variable and call slideToggle function on that element to get the sliding effect   
      $(".show_hide_exp").click(function(){
       var $str = $(this).attr("id");
       console.log($str);
       var $index = $str.replace('show_hide', '');
	 console.log($index);
       var divName = "#expense" + $index;
	console.log(divName);
       $(divName).slideToggle();
   
   });
   
      //Edit Album-grab class of sliding div and combined its ID with variable and call slideToggle function on that element to get the sliding effect   
      $(".show_hide_edit").click(function(){
       var $str = $(this).attr("id");
       console.log($str);
       var $index = $str.replace('show_hide', '');
	 console.log($index);
       var divName = "#editslide" + $index;
	console.log(divName);
       $(divName).slideToggle();
   
   });
      //click to show create album/create weekend tab. this time .create_album_show will diplay div.   
      $(".create_click").click(function(){
       $('#create_album_show').slideToggle();
         $('#create_weekend_show').slideToggle();
   });
      
      //DISPLAY IMAGE-grab class of sliding div and combined its ID with variable and call slideToggle function on that element to get the sliding effect   
      $(".show_hide_image").click(function(){
       var $str = $(this).attr("id");
       console.log($str);
       var $index = $str.replace('show_hide_image', '');
	 console.log($index);
       var divName = "#imageDiv" + $index;
	console.log(divName);
       $(divName).slideToggle();   
   });
      
      //var select_id=document.getElementById("select_id");
   console.log($("#select_id option:selected").text());
   console.log($("#select_id").val());
   var weekend_id=$("#select_id").val();
      });
	 
	 
   var click=document.getElementById("profile_menuDiv");
   var show=document.getElementById("profile_submenu");
   click.addEventListener("click",function(e){
       show.show();
       e.preventDefault; 
   });
   
   </script>
   <?php
   
   ?>
   