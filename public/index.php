<?php

    // configuration
require("../includes/config.php"); 


$userid = $_SESSION['id'];
    //get all the stock symbols and number of shares    
$rows = query("Select `symbol`, `shares`  from `stocks` where `id` = $userid");
$usercash = query("Select `cash` from `users` where `id`=$userid");
$usercash = $usercash[0]['cash'];
$networth = 0;
$positions = [];
foreach ($rows as $row)
{
  $stock = lookup($row["symbol"]);
  if ($stock !== false)
  {
    $positions[] = [
    "name" => $stock["name"],
    "price" => $stock["price"],
    "shares" => $row["shares"],
    "symbol" => $row["symbol"]
    ];
    $networth += $row["shares"] * $stock["price"];
  }
}
$networth += $usercash;
    // render portfolio
render("portfolio.php", ["networth"=>$networth,"title" => "Portfolio", "positions" =>$positions, "totalcash" => $usercash]);

?>
