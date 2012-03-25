<div id="<?php echo $item_number.'_stock'; ?>">
    <?php
    echo $this->Form->input('Stock.'.$item_number.'.stock_id', $stocks);
    echo $this->Form->input('Stock.'.$item_number.'.qtd');
    echo $this->Js->link('X', 'javascript:void();', array('htmlAttributes'=>array('onclick'=> "$('#".$item_number."_stock').remove();")));
    ?>
</div>