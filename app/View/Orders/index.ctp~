<style>
    .cancelado{
        background-color: #FFAAAA !important;
    }
    .entregue{
        background-color: #84FF96 !important;
    }
</style>
<div class="orders index">
    <h2><?php echo __('Orders'); ?></h2>
    <table cellpadding="0" cellspacing="0">
        <tr>			
            <th><?php echo $this->Paginator->sort('Customer.nome', 'Customer'); ?></th>
            <th><?php echo $this->Paginator->sort('data_hora'); ?></th>
            <th><?php echo $this->Paginator->sort('total'); ?></th>
            <th><?php echo $this->Paginator->sort('desconto'); ?></th>
            <th><?php echo $this->Paginator->sort('subtotal'); ?></th>
            <th><?php echo $this->Paginator->sort('acrescimo'); ?></th>
            <th><?php echo $this->Paginator->sort('entregue'); ?></th>
            <th class="actions"><?php echo __('Actions'); ?></th>
        </tr>
        <?php foreach ($orders as $order): ?>
            <tr class="<?php if($order['Order']['cancelado'])
                             {  echo 'cancelado';    }
                             elseif($order['Order']['entregue'] != '') 
                             {  echo 'entregue';  }
                       ?>" >
                <td>
                    <?php echo $this->Html->link($order['Customer']['nome'], array('controller' => 'customers', 'action' => 'view', $order['Customer']['id'])); ?>
                </td>
                <td><?php echo h(date('d/m/Y H:i', strtotime($order['Order']['data_hora']))); ?>&nbsp;</td>
                <td><?php echo h($order['Order']['total']); ?>&nbsp;</td>
                <td><?php echo h($order['Order']['desconto']); ?>&nbsp;</td>
                <td><?php echo h($order['Order']['subtotal']); ?>&nbsp;</td>
                <td><?php echo h($order['Order']['acrescimo']); ?>&nbsp;</td>
                <td><?php echo h($order['Order']['entregue']); ?>&nbsp;</td>
                <td class="actions">
                    <?php echo $this->Html->link(__('View'), array('action' => 'view', $order['Order']['id'])); ?>
                    <?php echo $this->Html->link(__('Print'), array('action' => 'print_order', $order['Order']['id']), array('target' => '_blank')); ?>
                    <?php if(!$order['Order']['cancelado']){ echo ($order['Order']['entregue']=='')? $this->Form->postLink('Sent', array('action' => 'sent', $order['Order']['id']), array('confirm' => 'Realmente entregue?')):''; } ?>
                    <?php echo $order['Order']['cancelado'] ? '' : $this->Html->link(__('Cancel'), array('action' => 'cancel', $order['Order']['id'])); ?>
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
        <li><?php echo $this->Html->link(__('New Order'), array('action' => 'add')); ?></li>
        <li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Customer'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
        <li><?php echo $this->Html->link(__('List Stocks'), array('controller' => 'stocks', 'action' => 'index')); ?> </li>
        <li><?php echo $this->Html->link(__('New Stock'), array('controller' => 'stocks', 'action' => 'add')); ?> </li>
    </ul>
</div>
