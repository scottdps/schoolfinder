<div class="msschools view">
<h2><?php echo __('Msschool'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($msschool['Msschool']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($msschool['Msschool']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($msschool['Msschool']['url']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Msschool'), array('action' => 'edit', $msschool['Msschool']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Msschool'), array('action' => 'delete', $msschool['Msschool']['id']), null, __('Are you sure you want to delete # %s?', $msschool['Msschool']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Msschools'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Msschool'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('controller' => 'addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Address'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Addresses'); ?></h3>
	<?php if (!empty($msschool['Address'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Street'); ?></th>
		<th><?php echo __('City'); ?></th>
		<th><?php echo __('ZIP'); ?></th>
		<th><?php echo __('Elementary'); ?></th>
		<th><?php echo __('Middle'); ?></th>
		<th><?php echo __('High'); ?></th>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Esschools Id'); ?></th>
		<th><?php echo __('Hsschools Id'); ?></th>
		<th><?php echo __('Msschools Id'); ?></th>
		<th><?php echo __('CompleteAddress'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($msschool['Address'] as $address): ?>
		<tr>
			<td><?php echo $address['Address']; ?></td>
			<td><?php echo $address['Street']; ?></td>
			<td><?php echo $address['City']; ?></td>
			<td><?php echo $address['ZIP']; ?></td>
			<td><?php echo $address['Elementary']; ?></td>
			<td><?php echo $address['Middle']; ?></td>
			<td><?php echo $address['High']; ?></td>
			<td><?php echo $address['id']; ?></td>
			<td><?php echo $address['esschools_id']; ?></td>
			<td><?php echo $address['hsschools_id']; ?></td>
			<td><?php echo $address['msschools_id']; ?></td>
			<td><?php echo $address['CompleteAddress']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'addresses', 'action' => 'view', $address['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'addresses', 'action' => 'edit', $address['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'addresses', 'action' => 'delete', $address['id']), null, __('Are you sure you want to delete # %s?', $address['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Address'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
