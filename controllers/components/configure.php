<?php
class ConfigureComponent extends Object {

	function initialize(&$controller, $settings = array()) {
		App::import('Model', 'Configurator.Configuration');
		$Conf = new Configuration;
		$cfgs = $Conf->find('all', array('fields' => array('key', 'value')));
		foreach ($cfgs as $cfg) {
			Configure::write($cfg['Configuration']['key'], $cfg['Configuration']['value']);
		}
	}

}

