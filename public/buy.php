<?php

    // configuration
require("../includes/config.php"); 
    //ifshares and symbol are not set or are empty
if(!isset($_POST['symbol']) || empty($_POST['symbol']) ||
	!isset($_POST['shares']) || empty($_POST['shares'])){
	
	render("buy_form.php", ["title"=>"Buy Stocks"]);

}else{
       //do all the buying activity here
	$userid = $_SESSION['id'];
	$cash = query("Select `cash` from `users` where `id`=$userid");
	$cash = $cash[0]['cash']; 
	$symbol = strtoupper($_POST['symbol']);
	$shares = preg_match("/^\d+$/", $_POST["shares"])?$_POST['shares']:0;
	$stock = lookup($symbol);
	if($stock !== false){
		$price = $stock['price'];
		$buyvalue = $price * $shares;
		if($buyvalue <= $cash && $buyvalue >0){
                 //make the buy
                 //add stock to database
			query("INSERT INTO stocks (id, symbol, shares) VALUES($userid, '$symbol', $shares) ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)");
			
                 //update user's cash
			query("UPDATE users SET cash = cash - $buyvalue WHERE id = $userid");  
                //add to history
			query("INSERT INTO history (id, type, symbol, shares, price) VALUES($userid, 'BUY', '$symbol', $shares, $price)");
		}elseif($buyvalue ==0){
			apologize("Invalid number of shares.");
			
		}else{
			apologize("You can't afford it!");
		}
	}else{
		apologize("Symbol not found");
		
	}
	
	
       //all buying is complete redirect to portfolio
	redirect("index.php");
	
}

?>
