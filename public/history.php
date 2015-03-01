<?php

    // configuration
require("../includes/config.php"); 
$userid = $_SESSION['id'];
$history = query("Select * from history where id=$userid");
    //dump($history);
if($history === false || empty($history)){
    apologize("You have not made any transactions yet");
}else{  
         //dump($history); 
    
    render("history_view.php",["history"=>$history,"title"=> "Transaction History"]);
}



?>
