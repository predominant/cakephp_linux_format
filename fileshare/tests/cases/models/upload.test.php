<?php
/* Upload Test cases generated on: 2010-11-07 17:11:47 : 1289111147*/
App::import('Model', 'Upload');

class UploadTestCase extends CakeTestCase {
	var $fixtures = array('app.upload', 'app.user', 'app.uploads_user');

	function startTest() {
		$this->Upload =& ClassRegistry::init('Upload');
	}

	function endTest() {
		unset($this->Upload);
		ClassRegistry::flush();
	}

}
?>