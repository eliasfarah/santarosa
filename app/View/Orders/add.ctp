<?php echo $this->Ui->autoComplete('OrderCustomer', array('source'=>'/customers/customers_ajax','select'=>"$('#OrderCustomerId').val(ui.item.id);")); ?>
<?php echo $this->Js->get('#OrderCustomer')->event('blur', "if($(this).val()==''){  $('#OrderCustomerId').val('');  } "); ?>      
<?php echo $this->Form->create('Order');?>
	<fieldset>
		<legend><?php echo __('Add Order'); ?></legend>
	<?php
		echo $this->Form->label('Cliente<br />').$this->Form->text('Order.customer');
                echo $this->Form->hidden('Order.customer_id');
                echo $this->Js->link('+ Item', array('action' => 'new_item'), array('buffer'=>true ,'success' => "$('#items').append(data);"));
        ?>
                <div id="items"></div>
        <?php
                echo $this->Form->input('Order.desconto', array('value'=>'0.00'));
		echo $this->Form->input('Order.acrescimo', array('value'=>'0.00'));
                echo $this->Form->input('Order.subtotal', array('value'=>'0.00', 'readonly'=>'readonly'));
                echo $this->Form->input('Order.total', array('value'=>'0.00', 'readonly'=>'readonly'));
	?>
	</fieldset>

<?php echo $this->Form->end(__('Submit'));?>
