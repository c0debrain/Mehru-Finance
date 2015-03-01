<table class="table table-striped">

    <thead>
        <tr>
            <th>Transaction</th>
            <th>Date/Time</th>
            <th>Symbol</th>
            <th>Shares</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($history as $row):?>
            <tr> 
                <td><?=$row['type']?></td>
                <td><?= date("n/j/Y | g:i:sA",strtotime($row['datetime']))?></td>
                <td><?=$row['symbol']?></td>
                <td><?=number_format($row['shares'],0)?></td>
                <td><?="$".number_format($row['price'],2)?></td>
                
            </tr>    
        <?php endforeach?>
    </tbody>

</table>

