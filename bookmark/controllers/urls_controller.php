<?php
class UrlsController extends AppController {

	var $name = 'Urls';
	
	var $components = array(
		'Ratings.Ratings',
	);
	
	function index() {
		$this->Url->recursive = 0;
		$this->set('urls', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid url', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('url', $this->Url->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Url->create();
			if ($this->Url->save($this->data)) {
				$this->Session->setFlash(__('The url has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The url could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Url->User->find('list');
		$this->set(compact('users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid url', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Url->save($this->data)) {
				$this->Session->setFlash(__('The url has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The url could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Url->read(null, $id);
		}
		$users = $this->Url->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for url', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Url->delete($id)) {
			$this->Session->setFlash(__('Url deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Url was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>