<?php
 
defined("_VALID_ACCESS") || die('Direct access forbidden'); // - security feature
 
class Custom_RMA extends Module { // - notice how the class name represents its path
 
	public function body() { // - modules main code
	
		print('Manage RMA');
        $this->rb = $this->init_module('Utils/RecordBrowser', 'custom_rma', 'custom_rma'); //$rs->create_rb_module($this, 'custom_rma');
        $this->display_module($this->rb);
	}
}
 
?>