<?php 
	class ButtonHelper extends Helper { 
     
	    function make($value, $label, $id = NULL) { 
			if($id !== NULL){
				return '<div class="button"><label for="'.$id.'" class="button">'.$label.'</label><input type="submit" class="button" id="'.$id.'" value="'.$value.'" /></div>';
			} else {
				return '<div class="button"><label class="button">'.$label.'</label><input type="submit" class="button" value="'.$value.'" /></div>';
			}
	    } 
	    
	    function link($value, $link, $id = NULL) { 
			if($id !== NULL){
				return '<div class="button"><label for="'.$id.'" class="button">'.$value.'</label><a href="'.$link.'" class="button" id="'.$id.'">'.$value.'</a></div>';
			} else {
				return '<div class="button"><label class="button">'.$value.'</label><a href="'.$link.'" class="button">'.$value.'</a></div>';
			}
	    } 
	} 
?>