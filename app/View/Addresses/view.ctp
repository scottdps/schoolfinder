<div class="addresses view">
<h2><?php echo __('Address'); ?></h2>
	<dl>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($address['Address']['Address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Street'); ?></dt>
		<dd>
			<?php echo h($address['Address']['Street']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('City'); ?></dt>
		<dd>
			<?php echo h($address['Address']['City']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ZIP'); ?></dt>
		<dd>
			<?php echo h($address['Address']['ZIP']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Elementary'); ?></dt>
		<dd>
			<?php echo h($address['Address']['Elementary']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Middle'); ?></dt>
		<dd>
			<?php echo h($address['Address']['Middle']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('High'); ?></dt>
		<dd>
			<?php echo h($address['Address']['High']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($address['Address']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Esschools'); ?></dt>
		<dd>
			<?php echo $this->Html->link($address['Esschools']['name'], array('controller' => 'esschools', 'action' => 'view', $address['Esschools']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hsschools'); ?></dt>
		<dd>
			<?php echo $this->Html->link($address['Hsschools']['name'], array('controller' => 'hsschools', 'action' => 'view', $address['Hsschools']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Msschools'); ?></dt>
		<dd>
			<?php echo $this->Html->link($address['Msschools']['name'], array('controller' => 'msschools', 'action' => 'view', $address['Msschools']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('CompleteAddress'); ?></dt>
		<dd>
			<?php echo h($address['Address']['CompleteAddress']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Address'), array('action' => 'edit', $address['Address']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Address'), array('action' => 'delete', $address['Address']['id']), null, __('Are you sure you want to delete # %s?', $address['Address']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Address'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Esschools'), array('controller' => 'esschools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Esschools'), array('controller' => 'esschools', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hsschools'), array('controller' => 'hsschools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hsschools'), array('controller' => 'hsschools', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Msschools'), array('controller' => 'msschools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Msschools'), array('controller' => 'msschools', 'action' => 'add')); ?> </li>
	</ul>
</div>
