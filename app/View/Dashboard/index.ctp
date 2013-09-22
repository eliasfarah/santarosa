<div style="width: 1000px;">   
    <div id="entregas" style="width: 500px; float:left;">
        <h1 align="center">Últimos Pedidos</h1>
        <table>            
            <tr>
                <th>Data</th>
                <th>Cliente</th>
                <th>Telefone</th>
                <th>Celular</th>
            </tr>
            <?php foreach($orders as $order): ?>
                <tr>
                    <td><?php echo date('d/m/Y H:i' , strtotime($order['Order']['created'])) ?></td>
                    <td><?php echo $order['Customer']['nome'] ?></td>
                    <td><?php echo $order['Customer']['telefone_residencial'] ?></td>
                    <td><?php echo $order['Customer']['celular'] ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <div  style="width: 500px; float: left;">

    </div>
    <div style="clear: both;"></div>
</div>
