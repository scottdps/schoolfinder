/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(function() {
 // var TAgencies = <?php echo $JSONAgencies; ?>; 
 
    var Agencies;
   var TAgencies = getAgencies(Agencies); 
   
    $('#agencies').autocomplete({ 
        source: TAgencies,
        change: function (event, ui) {
            //alert(ui.item.id); 
            $('#agenciesNum').val(ui.item.id);
        } 
    });
 
  function getAgencies(Agencies){
      return Agencies;
  }
    
  });