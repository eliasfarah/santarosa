<?php
echo $ui->autoComplete('Stock'.$item_number.'Stock', array('source'=>$this->Html->url(array('controller'=>'stocks','action'=>'stocks_ajax')),'select'=>"if(ui.item.qtd <= 0){ alert('Produto indisponivel no estoque'); return false; } var encontrado = false; $('.stock_ids').each(function(){            if($(this).attr('id') != 'Stock".$item_number."StockId'){          if($(this).val()== ui.item.id ){            encontrado = true;      }   }   }); if(encontrado){    $('#Stock".$item_number."StockId').val('');     $(this).val(''); alert('Produto ja foi adicionado'); return false; } $('#Stock".$item_number."StockId').val(ui.item.id); $('#Stock".$item_number."LValor').html('Valor: '+ui.item.valor); $('#Stock".$item_number."Valor').val(ui.item.valor); $('#Stock".$item_number."Qtd').attr('max',ui.item.qtd); $('#Stock".$item_number."EstoqueQtd').val(ui.item.qtd) ",'inline'=>true));
echo $js->get('#Stock'.$item_number.'Stock')->event('blur', "if($(this).val()==''){  $('#Stock".$item_number."StockId').val('');  } ");
echo $js->get('#Stock'.$item_number.'Qtd')->event('change', "if($(this).val()!=''){
    var subtotal = 0;
    var total = 0;
    
    if( parseInt($('#Stock".$item_number."Qtd').val()) >  parseInt($('#Stock".$item_number."EstoqueQtd').val())){  alert('O produto só possui '+$('#Stock".$item_number."EstoqueQtd').val()+' no estoque'); $('#Stock".$item_number."Qtd').val($('#Stock".$item_number."EstoqueQtd').val()); } else{ $('#Stock".$item_number."LValor').html( 'R$ '+eval($('#Stock".$item_number."Valor').val() * $('#Stock".$item_number."Qtd').val()) );  }
        
    $('.valor').each(function(){    
        subtotal = subtotal + ($('#Stock'+$(this).attr('item_number')+'Qtd').val() * $('#Stock'+$(this).attr('item_number')+'Valor').val());
    });
    $('#OrderSubtotal').val(subtotal);    
    subtotal = 0;
        
    total =  ( ( parseFloat($('#OrderSubtotal').val()) + parseFloat($('#OrderAcrescimo').val()) ) - parseFloat($('#OrderDesconto').val()) );
    $('#OrderTotal').val(total);
    total = 0;
}");

echo $js->get('#OrderDesconto')->event('blur', "
        if( $('#OrderDesconto').val() == ''){    $('#OrderDesconto').val('0.00');   }
        var subtotal = 0;
        var total = 0;
    
        $('.valor').each(function(){    
            subtotal = subtotal + ($('#Stock'+$(this).attr('item_number')+'Qtd').val() * $('#Stock'+$(this).attr('item_number')+'Valor').val());
        });       
        $('#OrderSubtotal').val(subtotal);    

        subtotal = 0;
        total =  ( ( parseFloat($('#OrderSubtotal').val()) + parseFloat($('#OrderAcrescimo').val()) ) - parseFloat($('#OrderDesconto').val()) );
        $('#OrderTotal').val(total);
        total = 0;");
echo $js->get('#OrderAcrescimo')->event('blur', "
        if( $('#OrderAcrescimo').val() == ''){    $('#OrderAcrescimo').val('0.00');   }
        var subtotal = 0;
        var total = 0;    
        
        $('.valor').each(function(){    
            subtotal = subtotal + ($('#Stock'+$(this).attr('item_number')+'Qtd').val() * $('#Stock'+$(this).attr('item_number')+'Valor').val());
        });
        $('#OrderSubtotal').val(subtotal);    

        subtotal = 0;
        total =  ( ( parseFloat($('#OrderSubtotal').val()) + parseFloat($('#OrderAcrescimo').val()) ) - parseFloat($('#OrderDesconto').val()) );
        $('#OrderTotal').val(total);
        total = 0;");

?>

<div id="<?php echo $item_number.'_stock'; ?>">
    <?php 
    echo $this->Form->text('Stock.'.$item_number.'.stock');
    echo $this->Form->hidden('Stock.'.$item_number.'.stock_id',array('class'=>'stock_ids'));
    echo $this->Form->input('Stock.'.$item_number.'.qtd', array('min'=>1,'width'=>20));
    echo $this->Form->hidden('Stock.'.$item_number.'.valor',array('class'=>'valor', 'item_number'=>$item_number));
    echo $this->Form->hidden('Stock.'.$item_number.'.estoque_qtd');
    echo $this->Form->label('Stock.'.$item_number.'.valor', 'Valor',array('id'=>'Stock'.$item_number.'LValor'));
    echo $this->Js->link('X', '#', array('htmlAttributes'=>array('onclick'=> " $('#OrderSubtotal').val( parseFloat($('#OrderSubtotal').val()) - ( parseFloat($('#Stock".$item_number."Valor').val()) * parseInt($('#Stock".$item_number."Qtd').val())  ) ); $('#OrderTotal').val( ( ( parseFloat($('#OrderSubtotal').val()) + parseFloat($('#OrderAcrescimo').val()) ) - parseFloat($('#OrderDesconto').val()) )); $('#".$item_number."_stock').remove();  ")));    ?>
</div>
<?php echo $this->Js->writeBuffer(); ?>