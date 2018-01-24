<?php
session_start();
//connect to database
$db=mysqli_connect("127.0.0.1:3307","root","","Train_Reservation");
if(isset($_POST['register_btn']))
{
    $name=mysqli_real_escape_string($db,$_POST['name']);
    $email=mysqli_real_escape_string($db,$_POST['email']);
    $password=mysqli_real_escape_string($db,$_POST['password']);
    $password2=mysqli_real_escape_string($db,$_POST['password2']);
	$select = mysqli_query($db,"SELECT `email` FROM users WHERE `EMAIL` = '".$_POST['email']."'");
	if(mysqli_num_rows($select))
		{
			$_SESSION['message']="Email ID has already been registered";
			unset($_POST['register_btn']);
		}
	else
	{
     if($password==$password2)
     {           //Create User
            $password=md5($password); //hash password before storing for security purposes
            $sql="INSERT INTO users(name,email,password) VALUES('$name','$email','$password')";
            mysqli_query($db,$sql);
            $_SESSION['message']="You are now logged in";
            $_SESSION['name']=$name;
			$_SESSION['login'] = 1;
			unset($_POST['register_btn']);
			$_SESSION['header'] = "Welcome $name";
            header("location:homepage.php");  //redirect home page
    }
    else
    {
      $_SESSION['message']="The two password do not match";
	  unset($_POST['register_btn']);
     }
}
}
?>
<style>
a{text-decoration:none;}
.txt-rt{text-align:right;}/* text align right */
.txt-lt{text-align:left;}/* text align left */
.txt-center{text-align:center;}/* text align center */
.float-rt{float:right;}/* float right */
.float-lt{float:left;}/* float left */
.clear{clear:both;}/* clear float */
.pos-relative{position:relative;}/* Position Relative */
.pos-absolute{position:absolute;}/* Position Absolute */
.vertical-base{	vertical-align:baseline;}/* vertical align baseline */
.vertical-top{	vertical-align:top;}/* vertical align top */
nav.vertical ul li{	display:block;}/* vertical menu */
nav.horizontal ul li{	display: inline-block;}/* horizontal menu */
img{max-width:100%;}
/*end reset*/
body {
    background:url('../img/bg2.jpg') no-repeat 62% 90%;
    background-size: cover;
    text-align: center;
	font-family: 'Open Sans', sans-serif;
}

/*--header--*/

.header-w30{
    margin: 20px;
}
.header-w30 h1{
	font-size:2.5em;
    color:white;
    letter-spacing: 6px;
    font-weight: 500;
    font-family: 'Open Sans', sans-serif;
    text-transform: uppercase;
}
/*--//header--*/

/*--main--*/

.main-content-agile {
    margin: 105px 0px;
}
.sub-main-w3 input[type="text"],.sub-main-w3 input[type="password"] , .sub-main-w3 input[type = "email"]{
    outline: none;
    font-size: 1em;
    padding: 15px 8px 15px 8px;
    border: none;
    margin: 0 0 15px 0;
    font-family: 'Open Sans', sans-serif;
    background: none;
    border-bottom: 2px solid #eee;
    width: 20%;
    color: white;
    font-weight: 600;
}
.button-w3 input[type="submit"] {
   display: inline-block;
  width: 200px;
  padding: 8px;
  color: #fff;
  background-color: transparent;
  border: 2px solid #fff;
   border-radius: 5px;
  text-align: center;
  outline: none;
  text-decoration: none;
  transition: color 0.3s ease-out,
              background-color 0.3s ease-out,
              border-color 0.3s ease-out;

}
.button-w3 input[type="submit"]:hover,
.button-w3 input[type="submit"]:active {
background-color: #8B0000;
  border-color: #8B0000;
  color: #fff;
  transition: color 0.3s ease-in,
              background-color 0.3s ease-in,
              border-color 0.3s ease-in;
}
.ghost-button {
  display: inline-block;
  width: 200px;
  padding: 8px;
  color: #fff;
  background-color: transparent;
  border: 2px solid #fff;
  text-align: center;
  outline: none;
  text-decoration: none;
  transition: color 0.3s ease-out,
              background-color 0.3s ease-out,
              border-color 0.3s ease-out;
}
.ghost-button:hover,
.ghost-button-full-color:active {
  background-color: #9363c4;
  border-color: #9363c4;
  color: #fff;
  transition: color 0.3s ease-in,
              background-color 0.3s ease-in,
              border-color 0.3s ease-in;
}

/*--//main--*/

/*--placeholder-color--*/

::-webkit-input-placeholder{
	color:rgba(255, 255, 255, 0.65);
}

:-moz-placeholder { /* Firefox 18- */
   color: rgba(255, 255, 255, 0.65);
}

::-moz-placeholder {  /* Firefox 19+ */
   color: rgba(255, 255, 255, 0.65);
}

:-ms-input-placeholder {
   color: rgba(255, 255, 255, 0.65);
}
/*--//placeholder-color--*/

/*--responsive--*/

@media(max-width:1440px){

}
@media (max-width:1366px){
	.sub-main-w3 input[type="password"],.sub-main-w3 input[type="text"], .sub-main-w3 input[type = "email"]{
		width:22%;
	}
}
@media (max-width:1280px){
	.sub-main-w3 input[type="password"],.sub-main-w3 input[type="text"], .sub-main-w3 input[type = "email"] {
		width:23%;
	}
}
@media (max-width:1024px){
	.sub-main-w3 input[type="password"],.sub-main-w3 input[type="text"], .sub-main-w3 input[type = "email"]{
		width:28%;
	}
}
@media (max-width:991px){
	.sub-main-w3 input[type="password"],.sub-main-w3 input[type="text"], .sub-main-w3 input[type = "email"] {
		width:29%;
	}
}
@media(max-width:800px){
	.header-w3l h1 {
		font-size: 39px;
	}
	.sub-main-w3 input[type="password"],.sub-main-w3 input[type="text"] , .sub-main-w3 input[type = "email"]{
		width:34%;
	}
}
@media(max-width:768px){
	.header-w3l h1 {
		font-size: 36px;
	}
	.main-content-agile {
		margin: 226px 0px;
	}
	.sub-main-w3 input[type="password"],.sub-main-w3 input[type="text"], .sub-main-w3 input[type = "email"] {
		width:36%;
	}
}
@media(max-width:736px){
	.header-w3l h1 {
		font-size: 34px;
	}
	.sub-main-w3 input[type="password"],.sub-main-w3 input[type="text"], .sub-main-w3 input[type = "email"] {
		width:40%;
		font-size: 0.9em;
	}
	.main-content-agile {
		margin: 181px 0px;
	}
}
@media(max-width:667px){
	.header-w3l h1 {
		font-size: 28px;
	}
	.main-content-agile {
		margin: 124px 0px;
	}
	.header-w3l{
		margin: 38px;
	}
}
@media(max-width:640px){
	.header-w3l h1 {
		font-size: 26px;
	}
	.sub-main-w3 input[type="password"],.sub-main-w3 input[type="text"], .sub-main-w3 input[type = "email"] {
		width:42%;
		font-size: 0.9em;
	}
}
@media(max-width:600px){
	.header-w3l h1 {
		font-size: 27px;
	}
	.sub-main-w3 input[type="password"],.sub-main-w3 input[type="text"], .sub-main-w3 input[type = "email"] {
		width:46%;
		font-size: 0.9em;
	}
	.header-w3l {
		margin: 52px;
	}
}
@media(max-width:568px){
	.header-w3l h1 {
		font-size: 30px;
	}
	.sub-main-w3 input[type="password"],.sub-main-w3 input[type="text"], .sub-main-w3 input[type = "email"] {
		width:48%;
		font-size: 0.9em;
	}
	.header-w3l {
		margin: 24px 0px;
	}
}
@media(max-width:480px){
	.header-w3l{
		margin:48px 0px;
	}
	.header-w3l h1 {
		font-size: 30px;
		letter-spacing: 3px;
		font-weight: 500;
		line-height: 1em;
	}
	.sub-main-w3 input[type="password"],.sub-main-w3 input[type="text"], .sub-main-w3 input[type = "email"] {
		width:56%;
		font-size: 0.9em;
	}
	.footer p{
		line-height: 28px;
	}
}
@media(max-width:414px){
	.header-w3l h1 {
		font-size: 30px;
		line-height: 1em;
		letter-spacing: 1px;
	}
	.main-content-agile {
		margin: 84px 0px;
	}
	.sub-main-w3 input[type="password"],.sub-main-w3 input[type="text"], .sub-main-w3 input[type = "email"] {
		width:60%;
		font-size: 0.9em;
	}
	.footer p{
		line-height: 28px;
	}
	.footer {
		padding: 4.3em 0;
	}

}
@media(max-width:384px){
	.header-w3l h1 {
		font-size: 24px;
	}
	.sub-main-w3 input[type="password"],.sub-main-w3 input[type="text"], .sub-main-w3 input[type = "email"] {
		width:64%;
		font-size: 0.9em;
	}
	.footer p{
		line-height: 28px;
	}
}
@media(max-width:375px){
	.footer p{
		line-height: 28px;
	}
	.sub-main-w3 input[type="password"],.sub-main-w3 input[type="text"], .sub-main-w3 input[type = "email"] {
		width:68%;
		font-size: 0.9em;
	}
	.footer {
		padding: 3em 0 1em;
	}
}
@media(max-width:320px){
	.header-w3l {
		margin: 31px 0px;
	}
	.header-w3l h1 {
		font-size: 18px;
		font-weight: 500;
		letter-spacing: 3px;
		line-height: 1.7em;
	}
	.sub-main-w3 input[type="password"],.sub-main-w3 input[type="text"], .sub-main-w3 input[type = "email"] {
		width:68%;
		font-size: 0.9em;
	}
	.footer p{
		line-height: 28px;
		font-size: 0.9em;
	}
	.main-content-agile {
		margin: 55px 0px;
	}
	 .footer {
		padding: 0em 0 1.1em;
	}
}
/*--//responsive--*/

</style>
<!DOCTYPE html>
<html>
<head>
<!--web-fonts-->

  <title>Register</title>


<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Transparent Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--web-fonts-->
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css' />

</head>
<body>
<div class="header-w30">
<br><br><br>
<b> <h1> REGISTRATION</h1> </b>
</div><br>
<h2 style = "color:#fff">
<?php
    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
?>
</h2>
<div class="main-content-agile">
	<div class = "sub-main-w3">
		<form method="post" action="registration.php">
			<input placeholder = "Name" type="text" name="name" class="user" required=""><br>
			<input placeholder="Email" type = "email" name="email" class="email" required=""><br>
  			<input placeholder="Password" type = "password" name="password" class="pass" required=""><br>
			<input placeholder="Re-type Password" type = "password" name="password2" class="pass" required=""><br>
	</div>
			<div class="button-w3">
			<input value = "Register" type="submit" name="register_btn" class="Register">
		</div>
		</form>

</div>
</body>
</html>
