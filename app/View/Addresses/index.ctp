<div class="addresses index">
	<h2><?php echo __('Addresses'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('Address'); ?></th>
			<th><?php echo $this->Paginator->sort('Street'); ?></th>
			<th><?php echo $this->Paginator->sort('City'); ?></th>
			<th><?php echo $this->Paginator->sort('ZIP'); ?></th>
			<th><?php echo $this->Paginator->sort('esschools_id'); ?></th>
			<th><?php echo $this->Paginator->sort('hsschools_id'); ?></th>
			<th><?php echo $this->Paginator->sort('msschools_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($addresses as $address): ?>
	<tr>
		<td><?php echo h($address['Address']['Address']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['Street']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['City']); ?>&nbsp;</td>
		<td><?php echo h($address['Address']['ZIP']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($address['Esschools']['name'], array('controller' => 'esschools', 'action' => 'view', $address['Esschools']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($address['Hsschools']['name'], array('controller' => 'hsschools', 'action' => 'view', $address['Hsschools']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($address['Msschools']['name'], array('controller' => 'msschools', 'action' => 'view', $address['Msschools']['id'])); ?>
		</td>
		
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $address['Address']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $address['Address']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $address['Address']['id']), null, __('Are you sure you want to delete # %s?', $address['Address']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Address'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Esschools'), array('controller' => 'esschools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Esschools'), array('controller' => 'esschools', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hsschools'), array('controller' => 'hsschools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hsschools'), array('controller' => 'hsschools', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Msschools'), array('controller' => 'msschools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Msschools'), array('controller' => 'msschools', 'action' => 'add')); ?> </li>
	</ul>
</div>
