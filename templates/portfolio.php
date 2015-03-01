<div>
    <h3>Net-Worth: <?= "$".number_format($networth, 2); ?>  </h3>
</div>


<?php if(!empty($positions)){?>
<table class="table table-striped">
   <thead>
       <tr>
           <th>Stock Symbol</th>
           <th>Company Name</th>
           <th>Shares Owned</th>
           <th>Market Price</th>
           <th>Total Value</th>
       </tr>
   </thead>
   <tbody>
       <?php }else{echo "<h4>You don't own any stocks.</h4>";} ?>
       <?php foreach ($positions as $position): ?>

        <tr>
            <td><?= $position["symbol"] ?></td>
            <td><?= $position["name"] ?></td>        
            <td><?= number_format($position["shares"],0) ?></td>
            <td><?= "$".number_format($position["price"],2) ?></td>
            <td><?= "$".number_format($position["shares"] * $position["price"],2); ?></td>        
        </tr>

    <?php endforeach ?>
    <tr><td>CASH</td>
        <td></td>
        <td></td>
        <td></td>
        <td><?= "$".number_format($totalcash, 2); ?></td>     
    </tr>
</tbody>
</table>

