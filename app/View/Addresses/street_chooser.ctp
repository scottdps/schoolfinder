 <?php echo $this->Html->css('jquery-ui-1.10.3.custom.css'); ?>
    <?php echo $this->Html->script('jquery-1.10.1.js');  ?>
    <?php echo $this->Html->script('jquery-ui-1.10.3.custom/js/jquery-ui-1.10.3.custom.js');  ?>


<script>
    
    
  $(function() {
 
  var Streets= <?php echo $Streets; ?>; 
   
 $('#street').autocomplete({ 
     source: Streets,
     change: function (event, ui) {
          $('#showMe').html('Yo, the jQuery is Working!!!');
         // alert(typeof ui.item);
       //  alert(ui.item.id); 
        //  alert("hello");
         $('#streetID').val(ui.item.id);
      $.ajax({
            url: 'ajaxGetStreets',
            cache: false,
            type: 'GET',
           // dataType: 'HTML',
            success: function (data) {
                $('#showMe').html(data);
                
                
                
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
<?php echo $this->Form->create('Address'); 
    
 
?>
	<fieldset>
		<legend><?php  echo __('Find Your Street'); ?></legend>
	<?php
echo $this->Form->input('StreetName',array('type' => 'text','class' => 'textF2','id' =>'street'));
//echo  $this->Form->input('vendor_crew_id_name', array('type' => 'text', 'class'=>'tbox2', 'id' =>'agencies'));
            echo $this->Form->input('StreetID',array('label' => 'Street ID',  'id' =>'streetID' ));
       
	?> 
                <div id="showMe"></div>
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
