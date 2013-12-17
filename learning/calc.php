<?php

//fetch GET value
function fetch($name){
    return (isset ($_GET[$name]) ? $_GET[$name] : '');
}

    //output values
    $out =array{
        'food'=>null,
        'cost'=>null,
        'date'=>null,
        'people'=>null,
        'place'=>null
    }
    
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
    
    $calc_cost=$cost/$people;


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
        case:'HTML'
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
