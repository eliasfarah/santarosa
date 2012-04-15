<style>
    body{
        font-size: 12px;
        font-family: Arial;
    }
    table tr td{
        font-size: 12px;
        font-family: Arial;
    }
</style>
<div id="cabecalho_cliente">
    <?php echo $template ?>
</div>
<div id="pedido">
    <fieldset style="width:500px;">
        <legend><b>Dados do pedido</b></legend>
        <table>
            <thead>
                <tr>
                    <td><b>Qtd</b></td>
                    <td><b>Produto</b></td>
                    <td><b>Valor Unitário</b></td>
                    <td><b>Subtotal</b></td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($order['Stock'] as $stock): ?>
                    <tr>
                        <td><?php echo $stock['OrdersStock']['qtd']?></td>
                        <td><?php echo $stock['Product']['Manufacturer']['nome']." ".
                                    $stock['Product']['ProductType']['tipo']." ".
                                    $stock['Product']['nome']." ".
                                    $stock['Color']['cor']
                            ?>
                        </td>
                        <td><?php echo "R$ ".number_format( (float)$stock['Product']['valor'], 2, ',', '.'); ?></td>
                        <td><?php echo "R$ ".number_format( (float)$stock['Product']['valor'] * (float)($stock['OrdersStock']['qtd']), 2, ',', '.' ) ?></td>
                    </tr>
                <?php endforeach;  ?>      
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>                
                <tr>
                    <td></td>
                    <td></td>
                    <td><b>Subtotal:</b></td>
                    <td><?php echo 'R$ '.number_format($order['Order']['subtotal'], 2, ',', '.'); ?></td>
                </tr>                
                <tr>
                    <td></td>
                    <td></td>
                    <td><b>Acréscimo:</b></td>
                    <td><?php echo 'R$ '.number_format($order['Order']['acrescimo'], 2, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><b>Desconto:</b></td>
                    <td><?php echo 'R$ '.number_format($order['Order']['desconto'], 2, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><b>Total:</b></td>
                    <td><?php echo 'R$ '.number_format($order['Order']['total'], 2, ',', '.'); ?></td>
                </tr>                
            </tbody>
        </table>
    </fieldset>   
</div>