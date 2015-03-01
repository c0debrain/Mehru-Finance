
<h3>
	<?php 
	if(isset($price)&& isset($name)&&isset($symbol)){
		$price = number_format($price, 2);
		
		echo "Today's price of $name ($symbol) is $$price";
		
	}



	?>
</h3>
