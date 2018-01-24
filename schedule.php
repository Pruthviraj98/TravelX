<?php
 session_start();
//connect to database

$db=mysqli_connect("127.0.0.1:3307","root","","Train_Reservation");
	if(!isset($_SESSION['login']))
{header('Location: logout.php');
}
if(isset($_POST['schedule_btn']))
{	
	$new_date = date('Y-m-d', strtotime($_POST['date1']));

	$_SESSION['date1'] = $new_date;
	$new_date = date('Y-m-d', strtotime($_POST['date2']));
	$_SESSION['date2'] = $new_date;
	 if(isset($_POST['select1']) and isset($_POST['select2']))
	{
	 $s1 = $_POST['select1'];
	 $s2 = $_POST['select2'];
	  if($s1 == $s2)
	
	{
	$_SESSION['message']="The destinations are the same";
	}
	else
	{
		$_SESSION['s1']=$s1;
		$_SESSION['s2']=$s2;
		header("location:schedule_.php");
	}
	
	if(($s1 == "1") and ($s2 == "1"))
	{
	$_SESSION['message']= "Please select before submitting ";
	
	}
	}
}
else{
	echo "Can't help you buddy!";
}    
    
	

?>
<style>
.button{
	border-radius: 4px;
	text-align: center;
	padding: 20px;
	transition: all 0.5s;
	cursor: pointer;
	margin: 5px;
}
.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}

</style>
<!DOCTYPE html>
<html>
<head>
  <title>Train Schedule - Error</title>
  <link rel="stylesheet" type="text/css" href="style.css"/>
  <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
.myLink {display: none}
</style>
</head>
<body class="w3-light-grey">
<!-- Navigation Bar -->
<div class="w3-bar w3-white w3-border-bottom w3-xlarge">
  <a href="#" class="w3-bar-item w3-button w3-text-red w3-hover-red"><b><i class="fa fa-map-marker w3-margin-right"></i>Travelx</b></a>
  <?php
  
  ?>
  <a href="logout.php" class="w3-bar-item w3-button w3-right w3-hover-red w3-text-grey"><i class="fa fa-sign-out"></i></a>
</div>
<!-- Header -->
<header class="w3-display-container w3-content w3-hide-small" style="max-width:1500px">
  <div>
   
	
  <img class="w3-image " src="/img/back4.jpg" alt="Theme" >
 <div class="w3-display-middle" style="width:80%">
	<div class="w3-container w3-black w3-panel w3-padding-16 w3-black w3-opacity w3-card-2 w3-hover-opacity-off  " style = "display:block; height:120%;"  >
    <!-- Tabs -->
	<h2 align = "center" style="color:#fff;">

	<?php
    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
?>

	</h2>
</div>
	<button type="button" class="w3-button w3-red w3-margin-top"><a href="homepage.php"><i class="fa fa-angle-double-left" aria-hidden="true"></i>Click Here to Go Back</a></button>
	</div>

    </div>
  
 
</header>

<!-- Page content -->

  
<!-- End page content -->
</div>

<script>
// Tabs
function openLink(evt, linkName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("myLink");
  for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(linkName).style.display = "block";
  evt.currentTarget.className += " w3-red";
}
// Click on the first tablink on load
document.getElementsByClassName("tablink")[0].click();
</script>


</body>
</html>