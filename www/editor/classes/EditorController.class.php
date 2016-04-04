<?php
class EditorController {
	function __construct() {
		//parent::__construct();
	}
	
	public function compile() {
		return XFPython::run(stripslashes($_REQUEST['code']));
	}
	/*
	public function test() {
		$db = new XFDatabase();
		return $db->browse("xfcore", "users", "all");
	}
	*/
}
?>