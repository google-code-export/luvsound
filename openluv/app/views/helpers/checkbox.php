<?php 
	class CheckboxHelper extends Helper { 
     
	    function make($value, $table, $field, $label) { 
			if($value==1){
				return '<div class="input checkbox"><input type="checkbox" name="data['.$table.']['.$field.']" id="'.$table.$field.'" value="1" CHECKED/><label for="'.$table.$field.'">'.$label.'</label></div>';
			} else {
				return '<div class="input checkbox"><input type="checkbox" name="data['.$table.']['.$field.']" id="'.$table.$field.'" value="1"/><label for="'.$table.$field.'">'.$label.'</label></div>';
			}
	    } 
	} 
?>