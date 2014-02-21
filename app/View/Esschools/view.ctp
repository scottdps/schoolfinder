<div class="esschools view">
<h2><?php echo __('Esschool'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($esschool['Esschool']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($esschool['Esschool']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($esschool['Esschool']['url']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Esschool'), array('action' => 'edit', $esschool['Esschool']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Esschool'), array('action' => 'delete', $esschool['Esschool']['id']), null, __('Are you sure you want to delete # %s?', $esschool['Esschool']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Esschools'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Esschool'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('controller' => 'addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Address'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Addresses'); ?></h3>
	<?php if (!empty($esschool['Address'])): ?>
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
		foreach ($esschool['Address'] as $address): ?>
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
