 <?php echo $this->Html->css('jquery-ui-1.10.3.custom.css'); ?>
    <?php echo $this->Html->script('jquery-1.10.1.js');  ?>
    <?php echo $this->Html->script('jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.js');  ?>


<script>
    
    
  $(function() {
 
  var Streets= <?php echo $Streets; ?>; 
    $('#numfields').hide();
    $('#street').autocomplete({ 
     source: Streets,
     change: function (event, ui) {

        $('#streetID').val(ui.item.id);
        $.ajax({
            url: 'ajaxGetStreets',
            cache: false,
            type: 'GET',
            success: function (data) {
                $('#addressInstruction').html(data);
        //=======  new code  between here  =============//        
           
     
            
            
            
        //=======  and here  ==========================// 
            
            
            
            
            
            },
             error: function (data) {
                $('#showMe').html('Error, it has failed');
                alert('in error functions')
            }
        });
     } 
 });

  });  
  </script>  








<div class="addresses form">
<?php echo $this->Form->create('Address', array('action' => 'numChooser'));
?>
	<fieldset>
		<legend><?php  echo __('find your Address'); ?></legend>
	<?php
        echo "<table border='0'><tr>";
        echo "<td>";
        echo $this->Form->input('Enter your street name',array('type' => 'text','class' => 'textF2','id' =>'street', 'name' => 'streetName'));
        echo $this->Form->input('StreetID',array('type' => 'text',  'id' =>'streetID','name' => 'streetID' ));
        echo "</td>";
        echo "<td>";
       // echo $this->Html->link($this->Html->image('nextButton.jpeg'), '/addresses/numChooser', array('escape' => false));
       // echo $this->Html->image('nextButton.jpeg', array('alt' => 'Please click next once you have found your street'));
        echo "</td></tr></table>";
       
       
	?> 
                <div id="showMe">
                    <div id="addressInstruction"></div>
                    <div id="numfields">
                    <?php  
                   // echo $this->Form->input('Enter your street number',array('type' => 'text','class' => 'textF2','id' =>'number'));
                    ?>
                    </div>
                </div>
	</fieldset>
        <?php echo $this->Form->end(__('Next->')); ?>
    
   
    
      <div id="schoolsInfo">
        <?php 
           if(isset($yourSchools['Address']['Elementary'])){
           echo '<div class="schoolName">'.$yourSchools['Esschools']['name'].'</div>';
           echo '<div class="schoolPhone">'.$yourSchools['Esschools']['phone'].'</div>';

           echo '<div class="schoolName">'.$yourSchools['Msschools']['name'].'</div>';
           echo '<div class="schoolPhone">'.$yourSchools['Msschools']['phone'].'</div>';

           echo '<div class="schoolName">'.$yourSchools['Hsschools']['name'].'</div>';
            echo '<div class="schoolPhone">'.$yourSchools['Hsschools']['phone'].'</div>';

       } else {
           echo '<div class="schoolName"></div>';
       }	
       ?>
  </div>
    
    
    
</div>



<div class="actions">

	<ul>
<li><a href="http://dearbornschools.org"> Return DPS Home page </a></li>


	</ul>
</div>
