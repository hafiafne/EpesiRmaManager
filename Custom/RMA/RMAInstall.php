<?php
defined("_VALID_ACCESS") || die();
 
class Custom_RMAInstall extends ModuleInstall {

	public function install() {
		
	/*	Base_ThemeCommon::install_default_theme($this->get_type());  
		$fields = new Custom_RMA_Recordset();
		$success = $fields->install();
		$fields->add_default_access();
		$fields->set_caption(_M('RMA'));
		return true;
		
		JJ's Notes:  This is for RBO which I feel is is poorly documented compared to the RB Utility (and of course, I studied RB more than RBO)
					This is how it's done in RB:  
	*/
		Utils_CommonDataCommon::new_array('custom/rma/package_status', array( '0'=>_M('Complete'), '1'=>_M('Incomplete'), '2'=>_M('No Package'), '3'=>_M('Damaged')), true, true);  //This creates the common data for the Package Status Field
		Utils_CommonDataCommon::new_array('custom/rma/status', array( '0'=>_M('Received Request'), '1'=>_M('Incomplete'), '2'=>_M('RMA Accepted'), '3'=>_M('Item Received'), '4'=>_M('Item sent to Manufacturer'), '5'=>_M('Item Repaired'), '6'=>_M('Item Returned') ), true, true); //This created the Common Data for the Status Field
		Utils_CommonDataCommon::new_array('custom/rma/Priority', array( '0'=>_M('Low'), '1'=>_M('Medium'), '2'=>_M('High')), true, true); //This created the Common Data for the Priority Field
		//JJ Now that the Common_Data DB is complete, lets go and create those fields.
		
		Utils_RecordBrowserCommon::install_new_recordset('custom_rma', array(
				array(	
						'name' => 'RMA ID',				//Name of the Field
						'type' => 'calculated',			//Type of Field
						'visible' => true,			//shows on the Table View
						'filter' => false,			//Can you Filter it?
						'param' => Utils_RecordBrowserCommon::actual_db_type('text', '20')	//if Calculated, this creates a DB field
	
				 ),
				array(	
						'name' => _M('Customer'),				//Name of the Field
						'type' => 'crm_company_contact', //Type of Field
						'visible' => true,			//shows on the Table View
						'filter' => false,			//Can you Filter it?
						'param'=>array('field_type'=>'select'),
						'required' => true
				 ),
				array(	
						'name' => _M('Manufacturer'),				//Name of the Field
						'type' => 'crm_company',			//Type of Field
						'visible' => true,			//shows on the Table View
						'filter' => false,			//Can you Filter it?
						'param' => array('field_type'=>'select'),	//if Select Field, What do we Select?
						'required' => true
				 ),
				 array(	
						'name' => _M('Device SKU'),				//Name of the Field
						'type' => 'text',			//Type of Field
						'visible' => true,			//shows on the Table View
						'filter' => true,			//Can you Filter it?
						'param' => 64,	//ifText Field, how long?
						'required' => true
				 ),
				 array(	
						'name' => _M('Device Model'),				//Name of the Field
						'type' => 'text',			//Type of Field
						'visible' => true,			//shows on the Table View
						'filter' => true,			//Can you Filter it?
						'param' => 64,	//ifText Field, how long?
						'required' => true
				 ),
				 array(	
						'name' => _M('Device Serial Number'),				//Name of the Field
						'type' => 'text',			//Type of Field
						'visible' => true,			//shows on the Table View
						'filter' => false,			//Can you Filter it?
						'param' => 64,	//ifText Field, how long?
						'required' => true
				 ),
				 array(	
						'name' => _M('Request Date'),				//Name of the Field
						'type' => 'date',			//Type of Field
						'visible' => false,			//shows on the Table View
						'filter' => false,			//Can you Filter it?
						'required' => true
				 ),
				 array(	
						'name' => _M('Package Status'),				//Name of the Field
						'type' => 'commondata',			//Type of Field
						'visible' => false,			//shows on the Table View
						'filter' => false,			//Can you Filter it?
						'param' => array('order_by_key'=>false, 'custom/rma/package_status'),  //Order by Name and which common data to access?
						'required ' => true
				 ),
				 array(	
						'name' => _M('Package Description'),				//Name of the Field
						'type' => 'text',			//Type of Field
						'visible' => false,			//shows on the Table View
						'filter' => false,			//Can you Filter it?
						'param' => 64
				 ),
				 array(	
						'name' => _M('Fault Declared from Customer'),				//Name of the Field
						'type' => 'long text',			//Type of Field
						'visible' => false,			//shows on the Table View
						'filter' => false			//Can you Filter it?
	
				 ),
				 array(	
						'name' => _M('Fault Revealed'),				//Name of the Field
						'type' => 'long text',			//Type of Field
						'visible' => false,			//shows on the Table View
						'filter' => false			//Can you Filter it?
	
				 ),
				 array(	
						'name' => _M('Status'),				//Name of the Field
						'type' => 'commondata',			//Type of Field
						'visible' => true,			//shows on the Table View
						'filter' => false,			//Can you Filter it?
						'param' => array('order_by_key'=>true, 'custom/rma/status'),
						'required' => true
				 ),
				 array(	
						'name' => _M('Priority'),				//Name of the Field
						'type' => 'commondata',			//Type of Field
						'visible' => true,			//shows on the Table View
						'filter' => true,			//Can you Filter it?
						'param' => array('order_by_key'=>true, 'custom/rma/priority')
						
				 ),
				 array(	
						'name' => _M('Limit Date'),				//Name of the Field
						'type' => 'date',			//Type of Field
						'visible' => true,			//shows on the Table View
						'filter' => true			//Can you Filter it?
				 )
			)
		);	//JJ Creates the Database and Field types of the Module
		
		Utils_RecordBrowserCommon::set_caption('custom_rma', _M('RMA'));  //Creates the Name of the module for users to see
		Utils_RecordBrowserCommon::enable_watchdog('custom_rma', array('Custom_RMACommon','watchdog_label')); //Watchdog for those Managers to track changes
		Utils_RecordBrowserCommon::add_default_access('custom_rma'); //sets default access to the Module
		Utils_RecordBrowserCommon::new_addon('company', 'Custom/RMA', 'RMA_addon', _M('RMA')); //show in the Company Page the RMA Module
		Utils_RecordBrowserCommon::register_processing_callback("custom_rma", "Custom_RMACommon::getData");
		return true; //False on failure
		
	}
 
	public function uninstall() {
	/*	Base_ThemeCommon::uninstall_default_theme(this->get_type());
		$fields = new Custom_RMA_Recordset();
		$success = $fields->uninstall();
	*/
		Utils_RecordBrowserCommon::unregister_processing_callback("custom_rma", "Custom_RMACommon::getData");
		Utils_RecordBrowserCommon::uninstall_recordset('custom_rma'); //remove DB and Module
		
		return true;
	}
 
	public function info() {
		return array('Author'=>'<a href="mailto:zumiani@marcomweb.it">Alberto Zumiani @ Marcom S.r.l.</a> and jjjj12212',
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