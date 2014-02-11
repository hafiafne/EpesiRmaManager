<?php
defined("_VALID_ACCESS") || die();
 
class Custom_RMAInstall extends ModuleInstall {

	public function install() {
		
		Base_ThemeCommon::install_default_theme($this->get_type());
		$fields = new Custom_RMA_Recordset();
		$success = $fields->install();
		$fields->add_default_access();
		$fields->set_caption(_M('RMA'));
		return true;
	}
 
	public function uninstall() {
		Base_ThemeCommon::uninstall_default_theme(this->get_type());
		$fields = new Custom_RMA_Recordset();
		$success = $fields->uninstall();
		return true;
	}
 
	public function info() {
		return array('Author'=>'<a href="mailto:zumiani@marcomweb.it">Alberto Zumiani @ Marcom S.r.l.</a>',
					'License'=>'GNU GPL v3.0',
					'Description'=>'Module for RMA management');
	}
 
	public function simple_setup() {
		return array('package' => __('RMA'), 'version'=>'1.0');
	}
 
	public function requires($v) {
		return array();
	}
 
	public function version() {
		return array('1.0');
	}
}

?>