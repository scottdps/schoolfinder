<div class="addresses form">
<?php echo $this->Form->create('Address'); ?>
    
    

	<fieldset>
		<legend><?php echo __('Find Your Schools'); ?></legend>
	<?php
        echo "<table border = '0'><tr>";
            echo '<td width="10%">'.$this->Form->input('StreetNumber',array('label' => 'Street Number', 'class' =>'textF1'  )).'</td>';
            echo '<td width="80%">'.$this->Form->input('StreetName',array('label' => 'Street Name','class' => 'textF2')).'</td>';
	echo "</tr></table >";	
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
    
    <div  id="result">    </div> 
</div>



<div class="actions">

	<ul>
<li><a href="http://dearbornschools.org"> Return DPS Home page </a></li>
<?php 
	if(isset($yourSchools['Address']['Elementary'])){
        echo '<div class="schoolName">'.$yourSchools['Esschools']['name'].'</div>';
        echo '<div class="schoolPhone">'.$yourSchools['Esschools']['phone'].'</div>';
        
        echo '<div class="schoolName">'.$yourSchools['Msschools']['name'].'</div>';
        echo '<div class="schoolPhone">'.$yourSchools['Msschools']['phone'].'</div>';
        
        echo '<div class="schoolName">'.$yourSchools['Hsschools']['name'].'</div>';
         echo '<div class="schoolPhone">'.$yourSchools['Hsschools']['phone'].'</div>';
        
    } else {
        echo '<div class="schoolName">'.$notFoundStr.'</div>';
    }	
?>

	</ul>
</div>
