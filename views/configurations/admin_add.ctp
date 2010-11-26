
<div class="configurations form">
<?php echo $form->create('Configuration');?>
	<fieldset>
 		<legend><?php __d('configurator', 'Add Configuration'); ?></legend>
	<?php
		echo $form->input('key', array(
			'error' => array(
				'isUnique' => __d('configurator', 'The key must be unique.', true),
				'rightFormat' => __d('configurator', 'The key can contain only alphanumerical characters, underscore and a dot. It cannot start or end or have more than one subsequent dot.', true),
				'reservedKeys' => __d('configurator', 'That key is reserved and cannot be used.', true)
			)
		));
		echo $form->input('value');
	?>
	</fieldset>
<?php echo $form->end(__d('configurator', 'Submit', true));?>
</div>
<div class="actions">
	<h3><?php __d('configurator', 'Actions'); ?></h3>
	<ul>
		<li><?php echo $html->link(__d('configurator', 'List Configurations', true), array('action' => 'index')); ?></li>
	</ul>
</div>

