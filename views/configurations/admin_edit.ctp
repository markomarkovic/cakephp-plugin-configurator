
<div class="configurations form">
<?php echo $this->Form->create('Configuration');?>
	<fieldset>
 		<legend><?php __d('configurator', 'Edit Configuration'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('key', array(
			'error' => array(
				'isUnique' => __d('configurator', 'The key must be unique.', true),
				'rightFormat' => __d('configurator', 'The key can contain only alphanumerical characters and a dot. It cannot start or end or have more than one subsequent dot.', true),
				'reservedKeys' => __d('configurator', 'That key is reserved and cannot be used.', true)
			)
		));
		echo $this->Form->input('value');
	?>
	</fieldset>
<?php echo $this->Form->end(__d('configurator', 'Submit', true));?>
</div>
<div class="actions">
	<h3><?php __d('configurator', 'Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__d('configurator', 'Delete', true), array('action' => 'delete', $this->Form->value('Configuration.id')), null, sprintf(__d('configurator', 'Are you sure you want to delete "%s"?', true), $this->Form->value('Configuration.key'))); ?></li>
		<li><?php echo $this->Html->link(__d('configurator', 'List Configurations', true), array('action' => 'index')); ?></li>
	</ul>
</div>

