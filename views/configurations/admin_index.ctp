
<div class="configurations index">
	<h2><?php __d('configurator', 'Configurations');?></h2>
	<table cellpadding="0" cellspacing="0">
		<tr>
				<th><?php echo $this->Paginator->sort('key');?></th>
				<th><?php echo $this->Paginator->sort('value');?></th>
				<th class="actions"><?php __d('configurator', 'Actions');?></th>
		</tr>
		<?php
		$i = 0;
		foreach ($configurations as $cfg):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td>
				<?php echo $this->Html->link($cfg['Configuration']['key'], array('action' => 'view', $cfg['Configuration']['id'])); ?>
			</td>
			<td><?php echo $this->Text->truncate(htmlspecialchars($cfg['Configuration']['value']), 50); ?>&nbsp;</td>
			<td class="actions">
				<?php echo $this->Html->link(__d('configurator', 'View', true), array('action' => 'view', $cfg['Configuration']['id'])); ?>
				<?php echo $this->Html->link(__d('configurator', 'Edit', true), array('action' => 'edit', $cfg['Configuration']['id'])); ?>
				<?php echo $this->Html->link(__d('configurator', 'Delete', true), array('action' => 'delete', $cfg['Configuration']['id']), null, sprintf(__d('configurator', 'Are you sure you want to delete "%s"?', true), $cfg['Configuration']['key'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
	<p><?php echo $this->Paginator->counter(array('format' => __d('configurator', 'Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true))); ?></p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __d('configurator', 'previous', true), array(), null, array('class' => 'disabled'));?>
		| <?php echo $this->Paginator->numbers(); ?> |
		<?php echo $this->Paginator->next(__d('configurator', 'next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __d('configurator', 'Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__d('configurator', 'Add Configuration', true), array('action' => 'add')); ?></li>
	</ul>
</div>

