<?php
//xFacility
//XFDatabaseEngine
//Studio2b
//Michael Son(mson0129@gmail.com)
//24DEC2012(1.0.0.) - This file(XFDB.class.php) is newly added for xFacility2012.
//22JUN2014(2.0.0.) - This file is modified for xFacility2014.
//16MAR2015(2.0.1.) - Now, XFDatabaseEngine() can automatically find configuaration path.

class XFDatabaseEngine extends XFObject {
	//Values
	var $link;
	var $query;
	//Result
	var $result;
	var $counter;
	
	//Settings
	var $kind; //MySQL, MSSQL, ETC...
	var $server;
	var $database;
	var $username;
	var $pw;
	var $prefix;
	
	function XFDatabaseEngine() {
		require (parent::getPath()."/configs/XFDatabase.config.php");
		$this->dbms = $xFDatabase['dbms'];
		$this->server = $xFDatabase['server'];
		$this->database = $xFDatabase['database'];
		$this->username = $xFDatabase['username'];
		$this->password = $xFDatabase['password'];
		$this->prefix = $xFDatabase['prefix'];
	}
}
?>