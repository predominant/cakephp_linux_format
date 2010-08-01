<?php
/* Movies Test cases generated on: 2010-08-02 00:08:18 : 1280673978*/
App::import('Controller', 'Movies');

class TestMoviesController extends MoviesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class MoviesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.movie');

	function startTest() {
		$this->Movies =& new TestMoviesController();
		$this->Movies->constructClasses();
	}

	function endTest() {
		unset($this->Movies);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
?>