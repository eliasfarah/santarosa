<h1>Motivo do cancelamento</h1>

<?php echo $this->Form->create('Order'); ?>
    <?php echo $this->Form->input('id', array('type'=>'hidden')) ?>
    <?php echo $this->Form->input('motivo_cancelamento') ?>
<?php echo $this->Form->end(__('Update')); ?>