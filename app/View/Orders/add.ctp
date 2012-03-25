
<div class="orders form">    
<?php echo $this->Form->create('Order');?>
	<fieldset>
		<legend><?php echo __('Add Order'); ?></legend>
	<?php
		echo $this->Form->input('Order.customer_id');		
		echo $this->Form->input('Order.subtotal');
                echo $this->Form->input('Order.desconto');
		echo $this->Form->input('Order.acrescimo');
                echo $this->Js->link('+ Item', array('action' => 'new_item'), array('success' => "$('#items').append(data);"));
	?>
	</fieldset>

<div id="items"></div>

<?php echo $this->Form->end(__('Submit'));?>

</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Orders'), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stocks'), array('controller' => 'stocks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock'), array('controller' => 'stocks', 'action' => 'add')); ?> </li>
	</ul>
</div>
