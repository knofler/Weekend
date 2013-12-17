<?php
include 'init.php';
function get_location(){
    
   $query=mysql_query("Select * from location");
   $num=mysql_numrows($query);
   mysql_close();
   
   if ($num>0){
    $i=0;
    while ($i<$num){
        
        $suburbs=mysql_result($query,$i,"locationName");
        $lat=mysql_result($query,$i,"latitude");
        $longitude=mysql_result($query,$i,"longitude");
        
        $latlon=$lat.','.$longitude;
        $i++;
        
    }/*end of while*/
   
   }/*end of if*/
   return $suburbs;
}//end of function
?>
<p id="display">
    This is where to display data 
</p>
<?php
echo "<br/>I am here";
$loc=get_location();
echo $loc;
?>



