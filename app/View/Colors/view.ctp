<div class="colors view">
<h2><?php  echo __('Color');?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($color['Color']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cor'); ?></dt>
		<dd>
			<?php echo h($color['Color']['cor']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($color['Color']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($color['Color']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Color'), array('action' => 'edit', $color['Color']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Color'), array('action' => 'delete', $color['Color']['id']), null, __('Are you sure you want to delete # %s?', $color['Color']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Colors'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Color'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Stocks'), array('controller' => 'stocks', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stock'), array('controller' => 'stocks', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Stocks');?></h3>
	<?php if (!empty($color['Stock'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th><?php echo __('Qtd'); ?></th>
		<th><?php echo __('Color Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($color['Stock'] as $stock): ?>
		<tr>
			<td><?php echo $stock['id'];?></td>
			<td><?php echo $stock['product_id'];?></td>
			<td><?php echo $stock['qtd'];?></td>
			<td><?php echo $stock['color_id'];?></td>
			<td><?php echo $stock['created'];?></td>
			<td><?php echo $stock['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'stocks', 'action' => 'view', $stock['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'stocks', 'action' => 'edit', $stock['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'stocks', 'action' => 'delete', $stock['id']), null, __('Are you sure you want to delete # %s?', $stock['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Stock'), array('controller' => 'stocks', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
