<?php

//fetch GET value
function fetch($name){
    return (isset ($_GET[$name]) ? $_GET[$name] : '');
}
    
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
    // fetch people
    
    $people=fetch('people');
    
    if (is_numeric($people)){
        $people;
    }else{
        $people=1;
    }
    
    //fetch i_paid
    
    $i_paid=fetch('i_paid');
    
    
    
    $calc_cost=$cost/$people;

    $my_share=$calc_cost-$i_paid;
    
    
     //insert to calc table
    
    function addWeekend($place,$date,$food,$cost){
        
        //connect to Database
        mysql_connect('localhost','root','testfbe') or die("Could not connect to host");
        mysql_select_db('weekend') or die("Could not connect to database");
        
        //INSERT INTO DB
       mysql_query("INSERT INTO `calc` VALUES('','$place','$date','$food','$cost')");
       
       echo "DB updated";

    };
    
    
    
     //output values
    $out =array(
        'place'=>$place,
        'food'=>$food,
        'totalexp'=>$cost,
        'cost'=>$calc_cost,
        'people'=>$people,
        'date'=>$date,
        'myshare'=>$my_share
        
    );
    
    addWeekend($place,$date,$food,$cost);

//output correct format
switch(strtolower(fetch('format'))){
    
    //plain text
        case 'text':
            header('Content-Type:text/plain; charset=UTF-8');
            foreach ($out as $n => $v){
                echo $n,':',$v,'\n';
            }
            break;
        
        // Output HTML
        case 'html':
            header('Content-Type:text/HTML; charset=UTF-8');
            echo "<table>\n";
            foreach($out as $n => $v){
                echo '<tr><th>',$n,'</th><td>',number_format($v,2),'</td></tr>\n';
            }
            echo "</table>";
            break;
        
        // Output XML
        case 'xml':
            header('Content-Type:text/xml; charset=UTF-8');
          $xml=new SimpleXMLElement('<cost/>');
          array_walk($out,create_function('$i,$k','global $xml;$xml->addChild($k,$i);'));
          echo $xml->asXML();
          break;
        case 'jsonp':
            header('Content-Type:application/javascript;charset=UTF');
            echo fetch('callback'),'(',json_encode($out),');';
            break;
        default:
            header('Content-Type:application/json; charset=UTF-8');
            echo json_encode($out);
            break;
}



?>
