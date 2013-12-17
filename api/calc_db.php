<?php

include '../init.php';

//fetch GET value
function fetch($name){
    return (isset ($_POST[$name]) ? $_POST[$name] : '');
}

    //fetch food
    $weekend_name=fetch('wknd_name');

    //fetch food
    $food=fetch('food');
    
    //fetch place
    $place=fetch('place');
    
    //fetch date
    $date=fetch('date');
    
    // fetch cost
    $cost=fetch('cost');    
    if (is_numeric($cost)){
        $cost=(float) $cost;
    }else{
        $cost=0;
    }

    //add weekend cost to database
    addWeekend($weekend_name,$place,$date);
    //addFood($food,$cost);


?>
