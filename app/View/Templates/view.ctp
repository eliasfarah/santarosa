<div class="templates view">
<h2><?php  echo __('Template');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($template['Template']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($template['Template']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Template'); ?></dt>
		<dd>
			<?php echo $template['Template']['template']; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($template['Template']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($template['Template']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Template'), array('action' => 'edit', $template['Template']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Template'), array('action' => 'delete', $template['Template']['id']), null, __('Are you sure you want to delete # %s?', $template['Template']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Templates'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Template'), array('action' => 'add')); ?> </li>
	</ul>
</div>
