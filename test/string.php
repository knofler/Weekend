<?php

$text="This is text";

$inject='<script>alert("hello");</script>';

$sanitised=htmlentities($inject);
$length=strlen($text);

$number=number_format(1990,0);

$lower=strtolower($text);

$no_gap=trim($text);

echo $length,"<br />";

echo $no_gap , "<br />";

echo $lower , "<br />";

echo $sanitised, '<br />';

echo $number , '<br />';

echo 'total &dollar;' ,$number, '<br />';


if(isset($_POST['text'])){
    
    $san_text=htmlentities($_POST['text']);
    echo nl2br($san_text);
}

?>
<form action="" method="POST">
<textarea name="text"></textarea>    
<input type="submit">    
</form>
