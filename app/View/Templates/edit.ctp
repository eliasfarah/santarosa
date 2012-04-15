<div class="templates form">
<?php echo $this->Form->create('Template');?>
	<fieldset>
		<legend><?php echo __('Edit Template'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
		echo $this->Form->input('template');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Template.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Template.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Templates'), array('action' => 'index'));?></li>
	</ul>
</div>
