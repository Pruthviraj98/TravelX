<?php

 session_start();
//connect to database

$db=mysqli_connect("127.0.0.1:3307","root","","Train_Reservation");
if(!isset($_SESSION['login']))
{header('Location: logout.php');


}

$sqlq = mysqli_query($db,"UDAPTE train_sched set a_seats = a_seats-1" );
$seat = $_SESSION['num3'];
$traincode = $_SESSION['traincode'];
$t_name = $_SESSION['t_name'];
$p_name = $_SESSION['pname'];
$aadhar = $_SESSION['aadhar'];
$cost = $_SESSION['t_cost'];
$code = $_SESSION['traincode'];
$year = $_SESSION['year']%100;
$month = $_SESSION['month'];
$day=$_SESSION['day'];
$date = $_SESSION['t_date'];

if(isset($_SESSION['disc']))
{
	$disc = $_SESSION['disc'];
	$cost = $cost - ($disc*$cost);
}
$_SESSION['cost'] = $cost;
$ticket = $code . $day . $month . $year . $seat ;
$_SESSION['ticket'] = $ticket;

$insert =  "INSERT INTO ticket(TRAIN_NAME, TRAIN_CODE, TICKET_NO, PASSENGER_NAME, AADHAR, COST, SEAT, DATE) VALUES('$t_name', '$code', '$ticket', '$p_name', '$aadhar', '$cost', '$seat', '$date')" or die("Could not book seat");
mysqli_query($db,$insert);
$count = "SELECT count(TICKET_NO) as oc from ticket where TRAIN_CODE = '$code' and DATE = '$date'";
$t_count = "SELECT count(TICKET_NO) as tc from ticket";
$num = mysqli_query($db,$count);
$row = mysqli_fetch_assoc($num);
$post = $row['oc'];
$n = $_SESSION['seatno'];
$num = mysqli_query($db,$t_count);
$row = mysqli_fetch_assoc($num);
$trans = $row['tc'];
$_SESSION['trans'] = $trans;
$update = "UPDATE train_sched set a_seats = TOTAL_SEATS - $n where TRAIN_CODE = '$code' and DATE = '$date'";
mysqli_query($db,$update);
echo $post;
$_SESSION['header'] = "Thank you for choosing Travelx. Hope you enjoy your Journey";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<center>
<head>
	<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />

	<title>Invoice</title>

	<link rel='stylesheet' type='text/css' href='style2.css' />
	<link rel='stylesheet' type='text/css' href='print2.css' media="print" />
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>

</head>

<body>

	<div id="page-wrap">

		<div id="header">INVOICE</div>

		<div id="identity">

            <div id="address" align="left" style = "color:#000;">Let us book your next trip!<br>
 Chennai, India<br>
 Email: travelx@gmail.com<br></div>
			<a href = "homepage.php">
            <div id="logo">
              <img id="image" src="img/logo4.png" alt="logo" />
            </div>
			</a>
		</div>

		<div style="clear:both"></div>

		<div id="customer">



            <table id="meta">
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td><?php $trans= $_SESSION['trans'];
							  $trans6 = sprintf("%06d", $trans);
												echo "$trans6";?></td>
                </tr>
                <tr>

                    <td class="meta-head">Date of Purchase</td>
                    <td><?php echo date('Y-m-d'); ?></td>
                </tr>
                <tr>
                    <td class="meta-head">Amount Due</td>
                    <td><div class="due"><?php $cost = $_SESSION['cost'];
												echo "$cost";?></div></td>
                </tr>
				<tr>
                    <td class="meta-head">Date of Travel</td>
                    <td><?php $date = $_SESSION['t_date'];
												echo "$date";?></div></td>
                </tr>


            </table>

		</div>

		<table id="items">

		  <tr>
			  <th>Seat No </th>
		      <th>Ticket No.</th>
		      <th>Passenger Name</th>
		      <th>Unit Cost</th>
		      <th>Discount</th>
		      <th>Price</th>
		  </tr>

		  <tr class="item-row">
			  <td align = "center"> <?php $seat= $_SESSION['num3'];
												echo "$seat";?> </td>
		      <td class="item-name"><div class="delete-wpr"><?php $ticket = $_SESSION['ticket'];
												echo "$ticket";?></div></td>
		      <td class="description"><?php $name = $_SESSION['pname'];
												echo "$name";?></td>
		      <td><?php $cost = $_SESSION['t_cost'];
												echo "$cost";?></td>
		      <td><?php if(isset($_SESSION['disc']))
								{$disc = $_SESSION['disc'];
								echo "$disc";
								}else{ echo "0.00";}?></td>
		      <td><?php $cost = $_SESSION['cost'];
												echo "$cost";?></td>
		  </tr>


		  <tr>
			  <td colspan="2" class="blank"> </td>
		      <td colspan="2"  class="blank"> </td>
		      <td style = "text-align: left;" class="total-line">Total</td>
		      <td class="total-value"><div id="subtotal"><?php $cost = $_SESSION['cost'];
												echo "$cost";?></div></td>
		  </tr>
		 <tr>
			  <td colspan="2" class="blank"> </td>
		      <td colspan="2"  class="blank"> </td>
		      <td style = "text-align: left;" class="total-line">Amount  Paid</td>
		      <td class="total-value">Rs.0.00</td>
		  </tr>
		  <tr>
			  <td colspan="2" class="blank"> </td>
		      <td colspan="2"  class="blank"> </td>
		      <td style = "text-align: left;" class="total-line">Balance Due</td>
		      <td class="total-value balance"><div class="due"><?php $cost = $_SESSION['cost'];
												echo "$cost";?></div></td>
		  </tr>

		</table>

		<div id="terms">
		  <h5>Terms & Conditions Apply</h5>
		  <div>50% Refund allowed upto 5 days before Journey.</div>
		</div>

	</div>

</body>
</center>
</html>
