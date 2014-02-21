<div class="addresses form">
<?php echo $this->Form->create('Address'); ?>
    
    

	<fieldset>
		<legend><?php echo __('Find Your Schools'); ?></legend>
	<?php
		echo $this->Form->input('CompleteAddress');
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
    
    <div  id="result">
    <?php
    if(isset($yourSchools['Address']['Elementary'])){
        echo '<h3>Your Elementary School is '. $yourSchools['Address']['Elementary'].'</h3>';
        echo '<h3>Your Middle School is '. $yourSchools['Address']['Middle'].'</h3>';
        echo '<h3>Your High School is '. $yourSchools['Address']['High'].'</h3>';
        
    } else {
        echo '<h3>No schools were found.</h3>';
        echo '<h3>Please try again.</h3>';
    }
    
     ?>
</div>
    
    
    
    
    
    
</div>



<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
<li><a href="http://dearbornschools.org"> Return DPS Home page </a></li>
		<li><?php //echo $this->Html->link(__('List Addresses'), array('action' => 'index')); ?></li>
		<li><?php //echo $this->Html->link(__('List Esschools'), array('controller' => 'esschools', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Esschools'), array('controller' => 'esschools', 'action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('List Hsschools'), array('controller' => 'hsschools', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Hsschools'), array('controller' => 'hsschools', 'action' => 'add')); ?> </li>
		<li><?php //echo $this->Html->link(__('List Msschools'), array('controller' => 'msschools', 'action' => 'index')); ?> </li>
		<li><?php //echo $this->Html->link(__('New Msschools'), array('controller' => 'msschools', 'action' => 'add')); ?> </li>
	</ul>
</div>
