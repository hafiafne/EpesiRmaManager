<?php
 
defined("_VALID_ACCESS") || die('Direct access forbidden'); // - security feature
 
class Custom_RMA extends Module { // - notice how the class name represents its path
	private $rb;
	
	// display module render
	public function body() { // - modules main code
	
        $this->rb = $this->init_module('Utils/RecordBrowser', 'custom_rma', 'custom_rma');
		$this->rb->set_defaults(array('request_date'=>date("Y-m-d"), 'status'=>0, 'priority'=>1));
		$this->rb->set_default_order(array('request_date'=>'DESC'));
		
		//$this->rb->set_additional_actions_method(array($this, 'rma_actions'));
		
        $this->display_module($this->rb);
	}
	
	// set window title
	public function caption() {
        if(isset($this->rb)) return $this->rb->caption();
    }
	
	/*
	public function rma_actions($r, $gb_row) {
		
		$gb_row->add_action(Utils_RecordBrowser::$rb_obj->add_note_button_href('custom_rma/'.$r['id']), __('New Note'), null, Base_ThemeCommon::get_template_file('Utils_Attachment','icon_small.png'));
	}
	*/
}
 
?>