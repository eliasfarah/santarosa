$('#OrderSubtotal').val( $('#OrderSubtotal').val() - $('#Stock".$item_number."Valor').val() );


$('#OrderTotal').val( 
                        ( 
                            ( parseFloat($('#OrderSubtotal').val()) + parseFloat($('#OrderAcrescimo').val()) ) - parseFloat($('#OrderDesconto').val()) 
                        )

                    ); 
$('#".$item_number."_stock').remove(); 
