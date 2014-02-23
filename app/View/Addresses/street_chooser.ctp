<script>
    
    
  $(function() {
 
  var Streets= <?php echo $Streets; ?>; 
   
 $('#streetName').autocomplete({ 
     source: Streets,
     change: function (event, ui) {
          $('#streetName').html('Change Event');
         alert(ui.item.id); 
         $('#streetID').val(ui.item.id);
      $.ajax({
            url: 'ajaxGetStreets',
            cache: false,
            type: 'GET',
           // dataType: 'HTML',
            success: function (data) {
                $('#schoolsInfo').html(data);
                
                
                
            },
             error: function (data) {
                $('#schoolsInfo').html('Error, it has failed');
                alert('in error functions')
            }
        });
     } 
 
 });

  });  
  </script>  








<div class="addresses form">
<?php echo $this->Form->create('Address'); 
    
 
?>
	<fieldset>
		<legend><?php  echo __('Find Your Street'); ?></legend>
	<?php
            echo $this->Form->input('StreetName',array('label' => 'Street Name','id' => 'streetName',   'class' => 'textF2'));
            echo $this->Form->input('StreetID',array('label' => 'Street ID',  'id' =>'streetID' ));
	?>
	</fieldset>
        <?php echo $this->Form->end(__('Next->')); ?>
    
    <div  id="result">    </div> 
    
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
