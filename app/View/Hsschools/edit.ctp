<div class="hsschools form">
<?php echo $this->Form->create('Hsschool'); ?>
	<fieldset>
		<legend><?php echo __('Edit Hsschool'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('url');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Hsschool.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Hsschool.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Hsschools'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Addresses'), array('controller' => 'addresses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Address'), array('controller' => 'addresses', 'action' => 'add')); ?> </li>
	</ul>
</div>
