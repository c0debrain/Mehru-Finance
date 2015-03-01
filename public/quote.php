<?php

  // configuration
require("../includes/config.php");
      // if user reached page via GET (as by clicking a link or via redirect)
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
        // else render form
  render("quote_form.php", ["title" => "Quote Lookup"]);
}

    // else if user reached page via POST (as by submitting a form via POST)
else if ($_SERVER["REQUEST_METHOD"] == "POST")
{

  $symbol = htmlspecialchars($_POST['symbol']);
  $stock = lookup($symbol);
  if($stock=== false){
   apologize("Symbol not found.");
 }else{
   $stockprice = $stock['price'];
   $stockname = $stock['name'];
   $stocksymbol = $stock['symbol'];
   render("quote_display.php",["price" => "$stockprice",
     "name"=>"$stockname", "symbol" => "$stocksymbol"]);
 }
 
}
?>
