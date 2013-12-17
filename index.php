<!--This is the header template that inludes HTML head,CSS files and Starting of the body element including Header DIV-->
<?php

include "init.php" ;
include "/template/header.php" ;

//echo '<img src="images/landing.png" alt="Register a free account today" />';


?>


<!--This is left DIV,which is kept blank for design purpose-->
<div class="mainDiv" id="left"></div>

<!--This is Main Container DIV,which contains main HTML structures for this page.-->
<div class="mainDiv" id="container" >
    <div id="form">
    <h1><span style="color:#e35d35">Howzzz</span><span style="color:#11471c">!!!</span><span style="color:#c9c316">WeekEnd</span><span style="color:#367be3"> ???</span></h1>
    <p id="first_para">Did you have hangover? or long drive? <br />how about dinner with mates?</p>
	<form class="weekend_form" id="mainform" action="process_weekend.php" method="post" enctype="multipart/form-data">
	    <div class="textDiv"><textarea class="main_textarea" id="brag" name="brag" required placeholder="How is your weekend going? Brag about it."></textarea><br/></div>
	    <div class="container" id="resultDiv">
		<!--<div class="result" id="mates_div">Mates selection results display here,usually hidden,display only data available</div>-->
		<!--<div class="result" id="checkin_div">checkin selection results display here,usually hidden,display only data available</div>-->
		<!--<div class="result" id="wknd_photos_div">photos selection results display here,usually hidden,display only data available</div>-->
	    </div>
	    <div class="iconDiv" id="container">
		<a href="#"><div class="section" id="mates"><img id="icons" src="./img/frd.png"></div></a>
		<a href="#"><div class="section" id="checkin"><input class="fileInput" id="chkin_btn" type="text" name="checkin"><img id="icons" src="./img/check.png"></div></a>
		<a href="#"><div class="section" id="photos"><input class="fileInput" id="wknd_photos" type="file" name="wknd_photos"/><img id="icons" src="./img/photo.png" /></div></a>
		<a href="#"><div class="section" id="section_4"><img id="icons" src="./img/tag.png"></div></a>
		<a href="#"><div class="section" id="section_5"><img id="icons" src="./img/music.png"></div></a>
		<a href="#"><div class="section" id="section_6"><img id="icons" src="./img/mic.png"></div></a>
		<div class="section" id="section_7"><input type="submit" class="submit" id="main" value="post" /></div>
	    </div>
	</form>
	<!--<div id="test">
	    
	    <input id=test" type="button" value="click" onclick="get_location()" />
	</div>-->
        <div id="display_msg">
	<ul id="links"></ul>
    </div>
    <div id="mapholder"></div>
    <!--<div id="dropbox" class="yes">-->
	<!--    <span class="message">Drag and Drop your weekend shots here. <br /><i>(they will only be visible to you)</i></span>-->
    <!--</div>-->
</div>   
</div><!--End of container DIV-->

<pre id="response"></pre>

<!--This is Right DIV,which is kept blank for design purpose--> 
<div class="mainDiv" id="right"></div>

<!--This is the footer template that inludes JavaScripts and Ending of All HTML elements including Footer DIV-->
<?php include "/template/footer.php" ; ?>
