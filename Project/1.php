<?php



?>

<!--


<html>
  <head>
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>         
<script>
  


$(document).ready(function(e)
{


//
var html='<p/><div>roll:<input type="text" id="roll" name="rno" required  /> password:<input type="password" id="pass" name="password" required  /> <a href="#" id="remove" >x </a></div>';




//

$("#add").click(function(e){
        $("#container").append(html);
});



//





//







});




</script>
  </head>


  <body>
    

 <form action="student_login.php" method ="POST" > 
<div class= "container">
             roll:       <input type="text" id="roll" name="rno"  required  /> 
             password:     <input type="password" id="pass" name="password" required  /> 
             <a href="#" id="add" >ADD MORE </a>
</div> 
<p/>
<input type="submit" name="submit"   /> 
</form>
</body>
</html>















<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 


<title>FACULTY ACCOUNT</title>


    


 <link   href= "css/bootstrap.min.css" rel="stylesheet"/> 

      <link   href= "css/sheet4.css" rel="stylesheet" >    
      <link href="https://www.w3schools.com/w3css/4/w3.css" rel="stylesheet">
     
     
 <script>
        
$(document).ready(function(){
    var next = 1;
    $(".add-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = '<input autocomplete="off" class="input form-control" id="field' + next + '" name="field' + next + '" type="text">';
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >-</button></div><div id="field">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
        
            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });
    

    
});



      </script>
  
  </head>


  <body>




 <div class="container">
  <div class="row">
    <input type="hidden" name="count" value="1" />
        <div class="control-group" id="fields">
            <label class="control-label" for="field1">Nice Multiple Form Fields</label>
            <div class="controls" id="profs"> 
                <form class="input-append">
                    <div id="field"><input autocomplete="off" class="input" id="field1" name="prof1" type="text" placeholder="Type something" data-items="8"/><button id="b1" class="btn add-more" type="button">+</button></div>
                </form>
            <br>
            <small>Press + to add another form field :)</small>
            </div>
        </div>
  </div>
</div>





<script src = "js/bootstrap.min.js" ></script>
  <script src = "js/jquery.min.js" ></script>
  
  <script src = "js/npm.js" ></script>           


  </body>
</html>












-->
















































