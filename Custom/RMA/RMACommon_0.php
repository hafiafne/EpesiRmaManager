<?php
 
defined("_VALID_ACCESS") || die('Direct access forbidden');
 
class Custom_RMACommon extends ModuleCommon {
 
	public static function menu() {
	
		return array(__('CRM')=>array('__submenu__'=>1,__('RMA')=>array()));
	
	}
}
 
?>