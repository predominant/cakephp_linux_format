<?php
class UploadsController extends AppController {

	var $name = 'Uploads';

	function index() {
		$this->Upload->bindModel(array('hasOne' => array('UploadsUser')), false);
		$this->paginate = array(
			'conditions' => array(
				'OR' => array(
					'UploadsUser.user_id' => $this->Auth->user('id'),
					'Upload.user_id' => $this->Auth->user('id'),
				),
			)
		);
		$this->set('uploads', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid upload', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Upload->bindModel(array('hasOne' => array('UploadsUser')));
		$upload = $this->Upload->find('first', array(
			'conditions' => array(
				'Upload.id' => $id,
				'OR' => array(
					'UploadsUser.user_id' => $this->Auth->user('id'),
					'Upload.user_id' => $this->Auth->user('id'),
				),
			)
		));
		if (!$upload) {
			$this->Session->setFlash(__('Invalid upload', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('upload', $upload);
	}

	function add() {
		if (!empty($this->data)) {
			$this->Upload->create();
			if ($this->uploadFile() && $this->Upload->save($this->data)) {
				$this->Session->setFlash(__('The upload has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The upload could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Upload->User->find('list');
		$users = $this->Upload->User->find('list');
		$this->set(compact('users', 'users'));
	}
	
	function uploadFile() {
		$file = $this->data['Upload']['file'];
		if ($file['error'] === UPLOAD_ERR_OK) {
			$id = String::uuid();
			if (move_uploaded_file($file['tmp_name'], APP.'uploads'.DS.$id)) {
				$this->data['Upload']['id'] = $id;
				$this->data['Upload']['filename'] = $file['name'];
				$this->data['Upload']['filesize'] = $file['size'];
				$this->data['Upload']['filemime'] = $file['type'];
				return true;
			}
		}
		return false;
	}

	function download($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for upload', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Upload->bindModel(array('hasOne' => array('UploadsUser')));
		$upload = $this->Upload->find('first', array(
			'conditions' => array(
				'Upload.id' => $id,
				'OR' => array(
					'UploadsUser.user_id' => $this->Auth->user('id'),
					'Upload.user_id' => $this->Auth->user('id'),
				),
			)
		));
		if (!$upload) {
			$this->Session->setFlash(__('Invalid id for upload', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->view = 'media';
		$filename = $upload['Upload']['filename'];
		$this->set(array(
			'id' => $upload['Upload']['id'],
			'name' => substr($filename, 0, strrpos($filename, '.')),
			'extension' => substr(strrchr($filename, '.'), 1),
			'path' => APP.'uploads'.DS,
			'download' => true,
		));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid upload', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Upload->save($this->data)) {
				$this->Session->setFlash(__('The upload has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The upload could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Upload->read(null, $id);
		}
		$users = $this->Upload->User->find('list');
		$sharedUsers = $this->Upload->User->find('list');
		$this->set(compact('users', 'sharedUsers'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for upload', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Upload->delete($id)) {
			$this->Session->setFlash(__('Upload deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Upload was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>