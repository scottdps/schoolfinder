<div class="addresses form">
<?php echo $this->Form->create('Address'); ?>
	<fieldset>
		<legend><?php echo __('Edit Address'); ?></legend>
	<?php
		echo $this->Form->input('Address');
		echo $this->Form->input('Street');
		echo $this->Form->input('City');
		echo $this->Form->input('ZIP');
		echo $this->Form->input('Elementary');
		echo $this->Form->input('Middle');
		echo $this->Form->input('High');
		echo $this->Form->input('id');
		echo $this->Form->input('esschools_id');
		echo $this->Form->input('hsschools_id');
		echo $this->Form->input('msschools_id');
		echo $this->Form->input('CompleteAddress');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Address.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Address.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Esschools'), array('controller' => 'esschools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Esschools'), array('controller' => 'esschools', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Hsschools'), array('controller' => 'hsschools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Hsschools'), array('controller' => 'hsschools', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Msschools'), array('controller' => 'msschools', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Msschools'), array('controller' => 'msschools', 'action' => 'add')); ?> </li>
	</ul>
</div>
