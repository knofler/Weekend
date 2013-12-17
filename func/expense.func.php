<?php

//get expense data from food table to use as expense data for weekend results
  function expense_data($weekend_id){
    $expenses=array();
    $weekend_id=(int)$weekend_id;
    $query=mysql_query("SELECT * FROM `food` WHERE `wknd_id`=$weekend_id");
      while($expense_row=mysql_fetch_assoc($query)){ 
       $expenses[]=array(
                    'food_id'=>$expense_row['food_id'],
                    'wknd_id'=>$expense_row['wknd_ID'],
                    'usr_id'=>$expense_row['user_id'],
                    'food_name'=>$expense_row['food_name'],
                    'cost'=>$expense_row['cost'],
                    'timestamp'=>$expense_row['timestamp']
                );
        }
        return $expenses;
}
  
//calculte total cost
  function costCalc($weekend_id){
    $totalCost=0;
    $costs=array();
    $weekend_id=(int)$weekend_id;
     $query=mysql_query("SELECT `cost` FROM `food` WHERE `wknd_ID`=$weekend_id");   
     while($costs_row=mysql_fetch_assoc($query)){ 
    $costs[]=array(
                   'cost'=>$costs_row['cost']
                   );
    //print_r($costs);
$totalCost+=$costs_row['cost'];
     }
  return $totalCost;
  }
  
  
//calculte eachShare cost and individual cost
  function eachShare($weekend_id){
    $totalCost=costCalc($weekend_id);
     $query2=mysql_query("SELECT COUNT(`user_id`)  from `wknd_member` where `wknd_id`=$weekend_id");
     $totalMember=(mysql_result($query2,0)>0)?mysql_result($query2,0):false;
     $eachShare=$totalCost/$totalMember;
  return $eachShare;
  }
  
  
//user spent for each weekend
  function youSpent($weekend_id,$user_id){
    $youSpent=0;
    $weekend_id=(int)$weekend_id;
    $user_id=(int)$user_id;
    $query=mysql_query("SELECT `cost` FROM `food` WHERE `wknd_ID`=$weekend_id AND `user_id`=$user_id");   
     while($costs_row=mysql_fetch_assoc($query)){ 
    $costs[]=array(
                   'cost'=>$costs_row['cost']
                   );
    //print_r($costs);
$youSpent+=$costs_row['cost'];
     }
  return $youSpent;
  };
  
  
  //calculte yourShare
  function yourShare($weekend_id){
    $eachShare=eachShare($weekend_id);
    $youSpent=youSpent($weekend_id,$_SESSION['user_id']);
  
        if ($youSpent>$eachShare){
          
          $credit=$youSpent-$eachShare;
          echo ' <tr id="tr_total_even">
                      <td id="td_your_credit" colspan=3>You will get   $',number_format($credit,2), ' from weekend team.</td>
                    </tr>';
        }else{
          
          $debit=$eachShare-$youSpent;
          echo '<tr id="tr_total_even">
                    <td id="td_your_debit" colspan=3>You will have to pay  $', number_format($debit,2), '  to the weekend team.</td>
                  </tr>';
        }
  };
?>