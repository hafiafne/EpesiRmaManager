<?php
 
defined("_VALID_ACCESS") || die('Direct access forbidden'); // - security feature
 
class Custom_RMA extends Module { // - notice how the class name represents its path
	private $rb;
	
	public function body() { // - modules main code
	
        $this->rb = $this->init_module('Utils/RecordBrowser', 'custom_rma', 'custom_rma');
		$this->rb->set_defaults(array('request_date'=>date("Y-m-d"), 'status'=>0, 'priority'=>1));
		$this->rb->set_default_order(array('request_date'=>'DESC'));
        $this->display_module($this->rb);
	}
	
	public function caption() {
        if(isset($this->rb)) return $this->rb->caption();
    }
}
 
?>