<?php  
echo $ui->autoComplete('Stock'.$item_number.'Stock', array('source'=>$this->Html->url(array('controller'=>'stocks','action'=>'stocks_ajax')),'select'=>"if(ui.item.qtd <= 0){ alert('Produto indisponivel no estoque'); return false; } var encontrado = false; $('.stock_ids').each(function(){            if($(this).attr('id') != 'Stock".$item_number."StockId'){          if($(this).val()== ui.item.id ){            encontrado = true;      }   }   }); if(encontrado){    $('#Stock".$item_number."StockId').val('');     $(this).val(''); alert('Produto ja foi adicionado'); return false; } $('#Stock".$item_number."StockId').val(ui.item.id); $('#Stock".$item_number."LValor').html('Valor: '+ui.item.valor); $('#Stock".$item_number."Valor').val(ui.item.valor); $('#Stock".$item_number."Qtd').attr('max',ui.item.qtd) ",'inline'=>true));
echo $js->get('#Stock'.$item_number.'Stock')->event('blur', "if($(this).val()==''){  $('#Stock".$item_number."StockId').val('');  } ");
echo $js->get('#Stock'.$item_number.'Qtd')->event('change', "if($(this).val()!=''){  $('#Stock".$item_number."LValor').html( eval($('#Stock".$item_number."Valor').val() * $('#Stock".$item_number."StockQtd').val()) );  } ");
?>

<?php  
//echo $this->Html->scriptBlock("$(document).ready(function(){    alert('oi');     });");
?>


<div id="<?php echo $item_number.'_stock'; ?>">
    <?php
    //echo $this->Form->input('Stock.'.$item_number.'.stock_id', $stocks);    
    echo $this->Form->text('Stock.'.$item_number.'.stock');
    echo $this->Form->hidden('Stock.'.$item_number.'.stock_id',array('class'=>'stock_ids'));
    echo $this->Form->input('Stock.'.$item_number.'.qtd', array('min'=>1,'width'=>20));
    echo $this->Form->hidden('Stock.'.$item_number.'.valor');
    echo $this->Form->label('Stock.'.$item_number.'.valor', 'Valor',array('id'=>'Stock'.$item_number.'LValor'));
    echo $this->Js->link('X', 'javascript:void();', array('htmlAttributes'=>array('onclick'=> "$('#".$item_number."_stock').remove();")));
    ?>
</div>
<?php echo $this->Js->writeBuffer(); ?>