<?php 

require_once("dbconfig.php");

$firstname = "";
$lastname = "";
$phone = "";
$email = "";
$cnp = "";
$facebook = "";
$question1 = "";
$question2 = "";
$question3 = "";
$captcha_generated = "";
$captcha_inserted = "";
$check = "";
$error ="";
$an="";
$facultate="";
$serie="";
$grupa="";
$specializare="";

if(isset($_POST['firstname'])){
	$firstname = $_POST['firstname'];
}

if(isset($_POST['lastname'])){
	$lastname = $_POST['lastname'];
}

if(isset($_POST['phone'])){
	$phone = $_POST['phone'];
}

if(isset($_POST['email'])){
	$email = $_POST['email'];
}

if(isset($_POST['cnp'])){
	$cnp = $_POST['cnp'];
}
if(isset($_POST['facebook'])){
	$facebook = $_POST['facebook'];
}
if(isset($_POST['facultate'])){
	$facultate = $_POST['facultate'];
}
if(isset($_POST['serie'])){
	$serie = $_POST['serie'];
}
if(isset($_POST['grupa'])){
	$grupa = $_POST['grupa'];
}
if(isset($_POST['specializare'])){
	$specializare = $_POST['specializare'];
}
if(isset($_POST['question1'])){
	$question = $_POST['question1'];
}
if(isset($_POST['question2'])){
	$question = $_POST['question2'];
}
if(isset($_POST['question3'])){
	$question = $_POST['question3'];
}
if(isset($_POST['captcha_generated'])){
	$captcha_generated = $_POST['captcha_generated'];
}

if(isset($_POST['captcha_inserted'])){
	$captcha_inserted = $_POST['captcha_inserted'];
}

if(isset($_POST['check'])){
	$check = $_POST['check'];
}

if(empty($firstname) || empty($lastname) || empty($phone) || empty($email) || empty($facebook)||empty($facultate)||	empty($serie)||	empty($grupa)||	empty($specializare)||empty($cnp)){
	$error = 1;
	$error_text = "One or more fields are empty!";
}
if (ctype_alpha(str_replace(' ', '', $firstname)) === false) {
            $error_text = 'FirstName must only contain letters!';
			$error=1;
}
if (ctype_alpha(str_replace(' ', '', $lastname)) === false) {
            $error_text = 'LastName must only contain letters!';
			$error=1;
}
if (ctype_alpha(str_replace(' ', '', $facultate)) === false) {
            $error_text = 'Facultate must only contain letters!';
			$error=1;
}
if (ctype_alpha(str_replace(' ', '', $serie)) === false) {
            $error_text = 'Serie must only contain letters!';
			$error=1;
}
if (ctype_alpha(str_replace(' ', '', $specializare)) === false) {
            $error_text = 'Specializare must only contain letters!';
			$error=1;
}
if(!is_numeric($phone) || strlen($phone)!=10){
	$error = 1;
	$error_text = "Phone number is not valid";
}
if(!is_numeric($grupa)){
	$error = 1;
	$error_text = "Grupa is not valid";
}
if(strlen($firstname) < 3 || strlen($lastname) < 3|| strlen($firstname)>20|| strlen($lastname)>20){
	$error = 1;
	$error_text = "First or Last name is shorter than expected!";
}
if(strlen($facultate)<3||strlen($facultate)>30){
	$error=1;
	$error_text="Facultate is shorter or longer than expected!";
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $error_text = "Invalid email format"; 
  $error=1;
}
$cn=substr($cnp,0,1);
if((int)$cn>9){
	$error=1;
	$error_text="CNP invalid!";
}
if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$facebook)){
	$error=1;
	$error_text="URL Invalid!";
}
$an=substr($cnp,1,2); 
if((2017-(1900+(int)$an))<18||(2017-(1900+(int)$an)>100)){
	$error=1;
	$error_text="Varsta invalida!";
}
if(empty($captcha_inserted)){
	$error=1;
	$error_text="Captcha invalid!";
}

if($error==0){
	if($con=mysqli_connect(HOST,USER,PASSWORD,DATABASE))
		{
			$stmt = $con->prepare("INSERT INTO register2(firstname,lastname,phone,email,cnp,facebook,facultate,serie,grupa,specializare,question1,question2,question3) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
			$stmt -> bind_param("sssssssssssss", $firstname, $lastname, $phone, $email, $cnp, $facebook, $facultate, $serie, $grupa, $specializare, $question1, $question2, $question3);

			if($stmt->execute()){
				echo "Success!";
				print 'Te-ai inscris cu succes la treasure hunt';
			}
			else echo "Error at data insertion";			
		}
		else echo "Error at connection!";
}else echo $error_text;
?>