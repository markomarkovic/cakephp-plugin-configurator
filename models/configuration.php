<?php
class Configuration extends ConfiguratorAppModel {

	var $order = array('Configuration.key' => 'ASC');

	var $validate = array(
		'key' => array(
			'isUnique' => array(
				'rule' => 'isUnique'
			),
			'rightFormat' => array(
				'rule' => '/^[a-z0-9_\\.]+$/i'
			),
			'correctDots' => array(
				'rule' => 'correctDots',
				'message' => 'rightFormat'
			),
			'reservedKeys' => array(
				'rule' => 'reservedKeys'
			)
		)
	);

	/**
	 * Check if the configuration key starts or ends with a dot or if there are more than one subsequent dots.
	 */
	function correctDots($check) {
		$key = array_values($check);
		$key = $key[0];

		return !(
			   strpos($key, '.') === 0
			|| strrpos($key, '.') == strlen($key) - 1
			|| strpos($key, '..') !== false
		);
	}

	/**
	 * Check if the key is one used in the config/core.php
	 * Changing one of them is potentialy risky and/or unpredictable.
	 */
	function reservedKeys($check) {
		$reservedKeys = array(
			'debug',
			'log',
			'App',
			'Routing',
			'Cache',
			'Session',
			'Security',
			'Asset',
			'Acl'
		);

		$key = array_values($check);
		$key = $key[0];

		foreach	($reservedKeys as $rk) {
			if (preg_match('/^('.$rk.'|'.$rk.'\\..*)$/i', $key)) {
				return false;
			}
		}
		return true;
	}
}

