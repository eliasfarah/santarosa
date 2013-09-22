<?php echo $this->Paginator->options(array('url' => $args)); ?>
<div class="stocks index">
    <h2><?php echo __('Stocks'); ?></h2>
    <?php echo $this->Form->create(false) ?>
        <?php echo $this->Form->input('search', array('value' => empty($args['search']) ? null : $args['search'])) ?>
    <?php echo $this->Form->end('Buscar') ?>
    <table cellpadding="0" cellspacing="0">
        <tr>
            <th><?php echo $this->Paginator->sort('Product.nome', 'Produto'); ?></th>
            <th><?php echo $this->Paginator->sort('color_id'); ?></th>
            <th><?php echo $this->Paginator->sort('qtd'); ?></th>            
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($stocks as $stock): ?>
            <tr>
                <td>
                    <?php echo $this->Html->link($stock['Manufacturer']['nome'] . ' ' . $stock['Product']['nome'], array('controller' => 'products', 'action' => 'view', $stock['Product']['id'])); ?>
                </td>                
                <td>
                    <?php echo $this->Html->link($stock['Color']['cor'], array('controller' => 'colors', 'action' => 'view', $stock['Color']['id'])); ?>
                </td>
                <td><?php echo h($stock['Stock']['qtd']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $stock['Stock']['id'])); ?>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $stock['Stock']['id'])); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $stock['Stock']['id']), null, __('Are you sure you want to delete # %s?', $stock['Stock']['id'])); ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p>
        <?php
        echo $this->Paginator->counter(array(
            'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
        ));
        ?>	</p>

    <div class="paging">
        <?php
        echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
        echo $this->Paginator->numbers(array('separator' => ''));
        echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
        ?>
    </div>
</div>
<div class="actions">
    <h3><?php echo __('Actions'); ?></h3>
    <ul>
        <li><?php echo $this->Html->link(__('New Stock'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Colors'), array('controller' => 'colors', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Color'), array('controller' => 'colors', 'action' => 'add')); ?> </li>
    </ul>
</div>
