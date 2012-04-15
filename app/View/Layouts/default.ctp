<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php echo $this->Html->charset(); ?>
        <title>
            <?php echo $cakeDescription ?>:
            <?php echo $title_for_layout; ?>
        </title>
        <?php
        //echo $this->Html->meta('icon');

        echo $this->Html->css('cake.generic');
        echo $this->Html->css('ui-lightness/jquery-ui');
        echo $this->Html->script('jquery'); // Include jQuery library
        echo $this->Html->script('jquery-ui'); // Include jQuery UI library
        echo $this->Html->script('fisheye-iutil.min'); // menu js
        echo $this->Html->css('dock/dock-example1'); // Include menu css

        echo $this->Html->scriptBlock("$(function () { // Dock initialize
                                                        $('#dock').Fisheye(
                                                                {
                                                                        maxWidth: 30,
                                                                        items: 'a',
                                                                        itemsText: 'span',
                                                                        container: '.dock-container',
                                                                        itemWidth: 50,
                                                                        proximity: 60,
                                                                        alignment : 'left',
                                                                        valign: 'bottom',
                                                                        halign : 'center'
                                                                }
                                                        );
                                                });");
        echo $this->fetch('meta');
        echo $this->fetch('css');
        echo $this->fetch('script');
        ?>
    </head>
    <body>
        <div id="container">
            <div id="header">
                <h1>Móveis Santa Rosa</h1>
                <!-- BEGIN DOCK 1 ============================================================ -->
                <div id="dock">  
                    <div class="dock-container">  
                        <a class="dock-item" href="/dashboard/index"><span>Principal</span><?php echo $this->Html->image('dock/home.png') ?></a>  
                        <a class="dock-item" href="/customers/index"><span>Clientes</span><?php echo $this->Html->image('dock/customer.png') ?></a>  
                        <a class="dock-item" href="/products/index"><span>Produtos</span><?php echo $this->Html->image('dock/product-icon.png') ?></a>  
                        <a class="dock-item" href="/stocks/index"><span>Produtos</span><?php echo $this->Html->image('dock/stock.png') ?></a>  
                        <a class="dock-item" href="/orders/index"><span>Pedidos</span><?php echo $this->Html->image('dock/cart.png') ?></a>  
                    </div>  
                    <!-- end div .dock-container -->  
                </div>  
                <!-- end div .dock #dock -->  
                <!-- END DOCK 1 ============================================================ -->

            </div>
            <div id="content">

                <?php echo $this->Session->flash(); ?>

                <?php echo $this->fetch('content'); ?>
            </div>
            <div id="footer">

            </div>
        </div>
        <?php echo $this->element('sql_dump'); ?>
        <?php echo $this->Js->writeBuffer(); // Write cached scripts ?>
    </body>
</html>
