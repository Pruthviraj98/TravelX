<?php  
 //insert.php  
$db=mysqli_connect("localhost","root","","Train_Reservation") or die("Could not connect");
 if(isset($_POST["name"]))  
 {  
      $name = mysqli_real_escape_string($db, $_POST["name"]);  

      $sql = "INSERT INTO subscribers VALUES ('".$name."')";  
      if(mysqli_query($db, $sql))  
      {  
           echo "Message Saved"; 
      }  
 }  
 else
 {
	 echo "haha sucker";
 }
 ?>  