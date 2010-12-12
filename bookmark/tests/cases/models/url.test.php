<?php
/* Url Test cases generated on: 2010-12-02 23:12:16 : 1291294156*/
App::import('Model', 'Url');

class UrlTestCase extends CakeTestCase {
	var $fixtures = array('app.url', 'app.user');

	function startTest() {
		$this->Url =& ClassRegistry::init('Url');
	}

	function endTest() {
		unset($this->Url);
		ClassRegistry::flush();
	}

}
?>