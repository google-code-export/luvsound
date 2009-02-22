<?php
/**
 * Flickr Component
 * @author RosSoft
 * @license MIT
 * @version 0.1
 * @edited by To Wonder
 */
define("FLICKR_CACHE_DIR",CACHE . "flickr/");

class FlickrComponent extends Component
{
    /**
     * Api Key. Change to your own
     * @var string
     * @link http://www.flickr.com/services/api/misc.api_keys.html
     */
    var $_api_key="9f0d08c9010785dbecefad55fe5560c9";

	function startup($controller){		
	app::import('Vendor','phpflickr',array('file'=>'phpFlickr'.DS.'phpFlickr.php'));
	
	//FlickrComponent instance of controller is replaced by a phpFlickr instance
         $controller->flickr =& new phpFlickr($this->_api_key);
         if (!is_dir(FLICKR_CACHE_DIR))
        {
            mkdir(FLICKR_CACHE_DIR,0777);
        }                
         $controller->flickr->enableCache("fs", FLICKR_CACHE_DIR);
         $controller->set("flickr",$controller->flickr);
	}
}
?>