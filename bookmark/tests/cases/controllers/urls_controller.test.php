<?php
/* Urls Test cases generated on: 2010-12-02 19:12:14 : 1291277774*/
App::import('Controller', 'Urls');

class TestUrlsController extends UrlsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class UrlsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.url', 'app.user');

	function startTest() {
		$this->Urls =& new TestUrlsController();
		$this->Urls->constructClasses();
	}

	function endTest() {
		unset($this->Urls);
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