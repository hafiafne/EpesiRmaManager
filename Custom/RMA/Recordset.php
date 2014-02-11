<?php
 
defined("_VALID_ACCESS") || die('Direct access forbidden'); // - security feature
 
class Custom_RMA_Recordset extends RBO_Recordset  {
 
	function table_name() { // - choose a name for the table that will be stored in EPESI database
		return 'RMA';
	}
	
	function fields() { // - here you choose the fields to add to the record browser
		$fields = array();
		
		$category_name = new RBO_Field_Text('Name');
		$category_name->set_length(24)->set_required()->set_visible();
		$fields[] = $category_name;
		
        $description = new RBO_Field_LongText('Description');
        $description->set_visible();
		$fields[] = $description;
 
        return $fields;
 
 
    }
}
 
?>