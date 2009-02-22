<?php 
	class DebugHelper extends Helper { 
	    function pre($array) {
	    	echo '<div class="debug"><pre>';
	    	print_r($array);
	    	echo '</pre></div>';
			return true;
	    }
	}
?>