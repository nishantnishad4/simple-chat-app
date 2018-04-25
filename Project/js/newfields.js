/*function genInputs()
{
        var numNewInputes = parseInt($("#tot").val());
        var form = $("#teacherform");
        
         for (var i=0;i<numNewInputes;i++) {
            //var field = '<input type="number" name="max1'+i+'" id="max1'+i+'" required >';
            var mark_field='<input type="number" name="max2'+i+'" id="max2'+i+'" required ><br><input type="number" name="max1'+i+'" id="max1'+i+'" placeholder="roll"  required >';
            //  var newInput = $(field); //<?php  echo "         ";    ?>
          var newInput = $(mark_field);
            $(form).after(newInput);

        }

        for (var i=0;i<numNewInputes;i++) {
            var field = '<input type="number" name="max1'+i+'" id="max1'+i+'" placeholder="roll"  required >';
            //var mark_field='<input type="number" name="max2'+i+'" id="max2'+i+'" required >';
            var newInput = $(field); //<?php  echo "         ";    ?>
           // var newInput = $(mark_field);
            $(form).after(newInput);

        }
}  */




$(document).ready(function(){

$("#add").click(function(e){
    event.preventDefault()
$("#items").append('<div><input type="text " name="roll[]" placeholder="roll" >  <input type="text " name="marks[]" placeholder="marks" >'+'<button class="btn btn-danger btn-xs" type="button" id="delete">&times</button></div>');


});
$("#items").on('click','#delete',function(e){
$(this).parent('div').remove();


});


});