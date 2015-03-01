
<form action ="sell.php" method="POST">
	<fieldset>
		<div class="form-group">
			<select class="form-control" name = "symbol">
				<option value = ""></option>
				<?php foreach($options as $option):?>
					<option value = "<?= $option['symbol'] ?>"> <?= $option['symbol'] ?></option>
				<?php endforeach?>
			</select>
			<div class="form-group">
				<button type="submit" class="btn btn-default">Sell</button>
			</div>
		</div>
	</fieldset>
</form>
