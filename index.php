<!DOCTYPE html>
<html>
<head>
	<title>AC - Back-End</title>
	<meta charset="UTF-8">
	<script type="text/javascript" src="jquery-3.2.1.min.js"></script>
	<link rel="stylesheet" href="assets/bootstrap.css">
	<link rel="stylesheet" href="assets/style.css">
	<link rel="stylesheet" href="materialize.min.css">
	<script src="materialize.min.js"></script>
	 <link rel="stylesheet" type="text/css" href="css.css">
	 <style>
body  {
    background-image: url("Cover3.jpg");
   background-position: top;
}
</style>
</head>
<body>
	<div class="navbar">
<nav>
    <div class="nav-wrapper">

             <a href="Asset 2@2x.png" class="brand-logo right" style="color: #00e64d;" id="method1">AtoMICI</a>
     <ul>
        <li><a href="siteweb2.html" style="color:#00e64d;">Acasă</a></li>
        <li><a href="despre.html">Despre</a></li>
        <li><a href="index.php" style="color:#00e64d;">Formular înscriere</a></li>
        <li><a href="https://www.facebook.com/Come-and-find-me-344223155987516/" style="font-size: medium;font-weight: bold;">Facebook</a></li>
      
      </ul>
    </div>
  </nav>
  <div class="container">
        <div class="back">
</div>
</div>
</div>
<div id="container">
<div class="jumbotron">
	
<center>
<h3 id="method1">Formular de Înscriere</h3><h3 id="method1">Treasure Hunt</h3><h3 style="margin-bottom:30px;" id="method1">"Come and find me" </h3>

<form action="submit.php" method="post" name="first_form" id="first_form">
	  <div class="input-field ">
	  <div class="container">
          <input placeholder="Prenume" id="firstname" type="text" class="validate">
          <label for="firstname"></label>
       </div>
       <div class="container">
          <input placeholder="Nume" id="lastname" type="text" class="validate">
          <label for="lastname"></label>
        </div>
	<div class="container">
          <input placeholder="Numar de telefon" id="phone" type="text" class="validate">
          <label for="phone"></label>
        </div>
 
	<div class="container">
          <input placeholder="Email" id="email" type="text" class="validate">
          <label for="email"></label>
        </div>
    
	

	<div class="container">
          <input placeholder="Serie" id="serie" type="text" class="validate">
          <label for="serie"></label>
        </div>
   
	
	<div class="container">
          <input placeholder="Grupa" id="grupa" type="text" class="validate">
          <label for="grupa"></label>
        </div>
    </div>

	<div class="container">
 <div class="row">
    
      <div class="row" style="padding-left: 15px">
        <div class="input-field col s12">
          <textarea id="question1" class="materialize-textarea"></textarea>
          <label for="question1" style="color:#6600cc">De ce vrei să participi și ce te-a atras la acest eveniment?</label>
        </div>
      </div>
    
  </div>
  <div class="row">
    
      <div class="row" style="padding-left: 15px">
        <div class="input-field col s12">
          <textarea id="question2" class="materialize-textarea" style="padding-right:20px; "></textarea>
          <label for="question2" style="color: #6600cc">Ce speri să dobândești în urma acestei experiențe?</label>
        </div>
      </div>
    
  </div>
        
	
	  <div class="input-field col s12" style="color:#6600cc;">
    <select>
      <option value="" disabled selected>Alege optiunea</option>
      <option value="1">NORMAL!!</option>
      <option value="2">Nu sunt sigur</option>
      <option value="3">De ce mă înscriu aici?</option>
    </select>
    <label style="color:#6600cc">Crezi că faci față?</label>

</div>
</div>
<div class="container">
 <p>
      <input type="checkbox" id="test6"  />
      <label for="test6">Ești gata?</label>
    </p>
</div>
	
	<input class="inp" type="submit">


</form>
</center>
</div>
</div>


<script>
	  
//Callback handler for form submit event
$("#first_form").submit(function(e)
{
   
    var formObj = $(this);
    var formURL = formObj.attr("action");
    var formData = new FormData(this);
    $.ajax({
        url: formURL,
    type: 'POST',
        data:  formData,
    mimeType:"multipart/form-data",
    contentType: false,
        cache: false,
        processData:false,
    success: function(data, textStatus, jqXHR)
    {
         console.log(data);
    },
     error: function(jqXHR, textStatus, errorThrown) 
     {
     }          
    });
    e.preventDefault(); //Prevent Default action. 
}); 
  
$("#multiform").submit(); //Submit the form
</script>
<script>$(document).ready(function() {
    $('select').material_select();
  });

 $('#textarea1').val('New Text');
  $('#textarea1').trigger('autoresize');
  </script>

</body>
</html>