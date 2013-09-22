<?php
class UiHelper extends AppHelper{
    var $helpers = array("Js", "Html");

    function tabs($id, $options = array())
    {
        if(!empty($id))
        {   return $this->Html->scriptBlock("$(document).ready(function(){ $('#".$id."').tabs(); });",array("inline"=>false));        }
        else
        {   return "id vazio";  }
    }

    function autoComplete($id, $options=array())
    {
        $default_options = array("source"=>"", "minLength"=>"2",'inline'=>false);
        $default_options = array_merge($default_options, $options);
        $select = "";
        if(isset($default_options["select"]))
        {   $select = "$('#".$id."').bind('autocompleteselect', function(event, ui) {  ".$default_options["select"]."  });"; unset($default_options["select"]);   }
                        		                        
        return $this->Html->scriptBlock("$(document).ready(function(){ $('#".$id."').autocomplete(".$this->Js->object($default_options).");  ".$select."  });",array($default_options['inline']=>false));
    }
    
    function datePicker($id, $options=array())
    {
        $default_options = array("minDate"=>null, "maxDate"=>null, "nextText"=>"Proximo", "prevText"=>"Anterior", "showAnim"=>"show","dateFormat"=>"dd/mm/yy");
        $default_options = array_merge($default_options, $options);
                
        return $this->Html->scriptBlock("$(document).ready(function(){      $('".$id."').datepicker(".$this->Js->object($default_options).");   });",array("inline"=>false));
    }
    
    
    /* Continuar o metodo tabs para usar options do ui conforme o manual */
    
    
    
    /* Continuar outros metodos do UI como autocomplete... entre outros */
}