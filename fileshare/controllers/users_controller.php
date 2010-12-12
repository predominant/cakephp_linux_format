<?php
/**
 * Users Controller
 *
 * Copyright (c) 2010 Graham Weldon (http://grahamweldon.com)
 *
 * @package fileshare
 * @subpackage fileshare.controllers
 */
class UsersController extends AppController {

	function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		$uploads = $this->User->Upload->find('list');
		$this->set(compact('uploads'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
		$uploads = $this->User->Upload->find('list');
		$this->set(compact('uploads'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

/**
 * Login action
 *
 * This method is intentionally left blank
 *
 * @return void
 */
	public function login() {
	}

/**
 * Before Filter Callback
 *
 * @return void
 */
	public function beforeFilter() {
		// Allow users to register without being logged in.
		$this->Auth->allow('add');
		return parent::beforeFilter();
	}

/**
 * Logout
 *
 * @return void
 */	
	public function logout() {
		$this->redirect($this->Auth->logout());
	}
}
