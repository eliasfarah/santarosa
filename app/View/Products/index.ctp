<?php echo $this->Paginator->options(array('url' => $args)); ?>
<div class="products index">
    <h2><?php echo __('Products'); ?></h2>
    <?php echo $this->Form->create(false) ?>
    <?php echo $this->Form->input('search', array('value' => empty($args['search']) ? null : $args['search'])) ?>
    <?php echo $this->Form->end('Buscar') ?>
    <table cellpadding="0" cellspacing="0">
        <tr>            
            <th><?php echo $this->Paginator->sort('Manufacturer.nome', __('Manufacturer')); ?></th>		
            <th><?php echo $this->Paginator->sort('ProductType.tipo', __('Product Type')); ?></th>
            <th><?php echo $this->Paginator->sort('nome'); ?></th>            
            <th><?php echo $this->Paginator->sort('valor'); ?></th>            
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($products as $product): ?>
            <tr>
                <td><?php echo h($product['Manufacturer']['nome']); ?>&nbsp;</td>
                <td><?php echo h($product['ProductType']['tipo']); ?>&nbsp;</td>
                <td><?php echo h($product['Product']['nome']); ?>&nbsp;</td>                
                <td><?php echo h($product['Product']['valor']); ?>&nbsp;</td>                
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $product['Product']['id'])); ?>
                    <?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $product['Product']['id'])); ?>
                    <?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $product['Product']['id']), null, __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?>
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
        <li><?php echo $this->Html->link(__('New Product'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Manufacturers'), array('controller' => 'manufacturers', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Manufacturer'), array('controller' => 'manufacturers', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Product Types'), array('controller' => 'product_types', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Product Type'), array('controller' => 'product_types', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Stocks'), array('controller' => 'stocks', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Stock'), array('controller' => 'stocks', 'action' => 'add')); ?> </li>
    </ul>
</div>
