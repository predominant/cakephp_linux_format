<?php
/* Movie Test cases generated on: 2010-08-02 00:08:05 : 1280673965*/
App::import('Model', 'Movie');

class MovieTestCase extends CakeTestCase {
	var $fixtures = array('app.movie');

	function startTest() {
		$this->Movie =& ClassRegistry::init('Movie');
	}

	function endTest() {
		unset($this->Movie);
		ClassRegistry::flush();
	}

}
?>