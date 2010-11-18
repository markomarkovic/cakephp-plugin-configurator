
<div class="configurations view">
<h2><?php  __d('configurator', 'Configuration');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __d('configurator', 'Key'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $configuration['Configuration']['key']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __d('configurator', 'Value'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<pre><?php echo htmlspecialchars($configuration['Configuration']['value']); ?></pre>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __d('configurator', 'Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $configuration['Configuration']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __d('configurator', 'Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $configuration['Configuration']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __d('configurator', 'Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__d('configurator', 'Edit', true), array('action' => 'edit', $configuration['Configuration']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__d('configurator', 'Delete', true), array('action' => 'delete', $configuration['Configuration']['id']), null, sprintf(__d('configurator', 'Are you sure you want to delete "%s"?', true), $configuration['Configuration']['key'])); ?> </li>
		<li><?php echo $this->Html->link(__d('configurator', 'List Configurations', true), array('action' => 'index')); ?></li>
	</ul>
</div>

