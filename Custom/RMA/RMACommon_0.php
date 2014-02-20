<?php
 
defined("_VALID_ACCESS") || die('Direct access forbidden');
 
class Custom_RMACommon extends ModuleCommon {
 
	public static function menu() {
	
		return array(__('CRM')=>array('__submenu__'=>1,__('RMA')=>array()));
	
	}
	
	
	public static function display_rma_id($r, $nolink) {
        return Utils_RecordBrowserCommon::create_linked_label_r('custom_rma', 'rma_id', $r, $nolink);
    }
	
	public static function generate_id($date, $id) {
        if(is_array($id)) $id = $id['id'];
        return 'RMA'.date('Y', strtotime($date)).str_pad($id, 5, '0', STR_PAD_LEFT);
		// $date->format('Y').
    }

    public static function process_request($data, $mode) {
        switch($mode) {
            case 'adding':
                $data['active']=true;
                break;
            case 'added':
				Utils_RecordBrowserCommon::update_record('custom_rma',$data['id'],array('rma_id'=>self::generate_id($data['request_date'], $data['id'])), false, null, true);
                break;
            default:
                break;
        }
        return $data;
    }
}
 
?>