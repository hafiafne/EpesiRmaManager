<?php
 
defined("_VALID_ACCESS") || die('Direct access forbidden'); // - security feature
 
class Custom_RMA extends Module { // - notice how the class name represents its path
 
	public function body() { // - modules main code
	
		print('Manage RMA');
		//$this->rb = $this->init_module('Utils/RecordBrowser','RMA','RMA');
		//$this->display_module($this->rb);
		$rs = new Custom_RMA_Recordset();
        $this->rb = $rs->create_rb_module($this, 'Custom_RMA');
        $this->display_module($this->rb);
	}
}
 
?>