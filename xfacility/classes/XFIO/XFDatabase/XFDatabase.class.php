<?php
//xFacility
//XFDatabase
//Studio2b
//Michael Son(mson0129@gmail.com)
//03MAR2016(1.0.0.) - This class is newly created.

class XFDatabase extends XFObject {
	static $method = array(
			"create",
			"browse",
			"peruse",
			"update",
			"delete"
	);
	var $engine;
	
	function __construct() {
		require (parent::getPath()."/configs/XFDatabase.config.php");
		switch (strtolower($xFDatabase['dbms'])) {
			case "mysql":
			case "maria":
			case "mariadb":
				$xFDatabase['dbms'] = "MySQL";
				break;
		}
		$temp = sprintf("XF%s", $xFDatabase['dbms']);
		$this->engine = new $temp();
	}
	
	function __call($method, $args) {
		if(method_exists($this->engine, $method)) {
			$return = call_user_func(array($this->engine, $method));
		} else {
			$return = false;
		}
		return $return;
	}
	
	//xFacility IO
	function create($tool, $table, $data) {
		return $this->engine->insert($tool, $table, $data);
	}
	
	function browse($tool, $table, $condition) {
		return $this->engine->select($tool, $table, $condition);
	}
	
	function peruse($tool, $table, $condition, $no) {
		if(is_numeric($no)) {
			$return = $this->engine->select($tool, $table, $no.";");
		} else {
			$return = false;
		}
		return $return;
	}
	
	function update($tool, $table, $data, $condition) {
		return $this->engine->update($tool, $table, $data, $condition);
	}
	
	function delete($tool, $table, $condition) {
		return $this->engine->delete($tool, $table, $condition);
	}
}
?>