<?php

    // configuration
require("../includes/config.php"); 
$userid = $_SESSION['id'];
$options = query("select `symbol` from `stocks` where `id` = $userid");

if(!isset($_POST['symbol']) || empty($_POST['symbol'])){
  render("sell_form.php", ["options" => $options,"title" => "Sell"]);
  
}else{
        //do all the selling activities here
  
  $symbol = $_POST['symbol'];         
  $shares = query("select `shares` from `stocks` where `id`=$userid and `symbol`= '$symbol'");
  
  $shares = $shares[0]['shares'];
  $stock = lookup($symbol);          
  if($stock !== false){
    $price = $stock['price'];
    $sellvalue=  $price * $shares;
          //delete stock from stocks table
    query("DELETE from `stocks` where `id`= $userid and `symbol`='$symbol'");
    
          //add sell value to cash table
    query("UPDATE `users` set `cash` = cash + $sellvalue where `id`=$userid");
          //add to history
    query("INSERT INTO history (id, type, symbol, shares, price) VALUES($userid, 'SELL', '$symbol', $shares, $price)");  
    
  }
  
        //all done, now redirect to the portfolio
  redirect("index.php");
  
}
?>
