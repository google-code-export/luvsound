<?php 
	class FckHelper extends Helper { 
     
	    var $helpers = Array('Html'); 
     
	    function input($field, $width = 400, $value ='') { 
	        $field = explode('.', $field); 
	        if(empty($field[1])) { 
	            // need to know how to call a model from a helper 
	        } else { 
	            $model = $field[0]; 
	            $controller = $field[1]; 
	        } 
         
	        require_once WWW_ROOT.'js'.DS.'fckeditor'.DS.'fckeditor.php'; 
	        $oFCKeditor = new FCKeditor('data['.$model.']['.$controller.']') ; 
	        $oFCKeditor->BasePath    = DS.'js'.DS.'fckeditor'.DS ; 
	        //$oFCKeditor->Value        = $this->data[$model][$controller]; 
			$oFCKeditor->Value        = $value; 
	        $oFCKeditor->Height        = $width; 
	        $oFCKeditor->Create();    
	    } 
	} 
?>