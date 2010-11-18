<?php
class ConfigurationsController extends ConfiguratorAppController {

	var $name = 'Configurations';
	var $uses = array('Configurator.Configuration');
	var $components = array('Session');
	var $helpers = array('Text');

	/*
			Standard baked admin methods below
	*/

	function admin_index() {
		$this->Configuration->recursive = 0;
		$this->set('configurations', $this->paginate());
	}

	function admin_view($key = null) {
		if (!$key) {
			$this->Session->setFlash(__d('configurator', 'Invalid configuration.', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('configuration', $this->Configuration->read(null, $key));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Configuration->create();
			if ($this->Configuration->save($this->data)) {
				$this->Session->setFlash(__d('configurator', 'The configuration has been saved.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('configurator', 'The configuration could not be saved.', true).' '.__d('configurator', 'Please, try again.', true));
			}
		}
	}

	function admin_edit($key = null) {
		if (!$key && empty($this->data)) {
			$this->Session->setFlash(__d('configurator', 'Invalid configuration.', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Configuration->save($this->data)) {
				$this->Session->setFlash(__d('configurator', 'The configuration has been saved.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__d('configurator', 'The configuration could not be saved.', true).' '.__d('configurator', 'Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Configuration->read(null, $key);
		}
	}

	function admin_delete($key = null) {
		if (!$key) {
			$this->Session->setFlash(__d('configurator', 'Invalid configuration.', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Configuration->delete($key)) {
			$this->Session->setFlash(__d('configurator', 'Configuration deleted.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__d('configurator', 'Configuration was not deleted.', true));
		$this->redirect(array('action' => 'index'));
	}

}

