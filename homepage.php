<?php

 session_start();
//connect to database

$db=mysqli_connect("127.0.0.1:3307","root","","Train_Reservation");
if(!isset($_SESSION['login']))
{header('Location: logout.php');
}

if(isset($_POST['subscribe_btn']))
{
	$email1 = $_POST['email'];
	$name = $_SESSION['name'];
	$sqlq = mysqli_query($db,"SELECT email from subscribers where email = '$email1'");
	if(mysqli_num_rows($sqlq))
	{
			$_SESSION['header']="This Email ID has already subscribed";
			unset($_POST['subscribe_btn']);
	}
	else
	{
		$_SESSION['header']= "Thanks for subscribing $name";
		$sql="INSERT INTO subscribers(email) VALUES('$email1')";
		mysqli_query($db,$sql);
		unset($_POST['subscribe_btn']);
	}

}

if(isset($_POST['msg_btn']))
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];


	$sql="INSERT INTO message(name, email, message) VALUES('$name', '$email', '$message')" or die("Could not send message");
	mysqli_query($db,$sql);
	$_SESSION['header']= "Your message has been sent. We will try reaching you shortly";
	unset($_POST['msg_btn']);

}
?>
<style>
body{
background: #fff;
}
/* W3.CSS 4.04 Apr 2017 by Jan Egil and Borge Refsnes */
html{box-sizing:border-box}*,*:before,*:after{box-sizing:inherit}
/* Extract from normalize.css by Nicolas Gallagher and Jonathan Neal git.io/normalize */
html{-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}body{margin:0}
article,aside,details,figcaption,figure,footer,header,main,menu,nav,section,summary{display:block}
audio,canvas,progress,video{display:inline-block}progress{vertical-align:baseline}
audio:not([controls]){display:none;height:0}[hidden],template{display:none}
a{background-color:transparent;-webkit-text-decoration-skip:objects}
a:active,a:hover{outline-width:0}abbr[title]{border-bottom:none;text-decoration:underline;text-decoration:underline dotted}
dfn{font-style:italic}mark{background:#ff0;color:#000}
small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}
sub{bottom:-0.25em}sup{top:-0.5em}figure{margin:1em 40px}img{border-style:none}svg:not(:root){overflow:hidden}
code,kbd,pre,samp{font-family:monospace,monospace;font-size:1em}hr{box-sizing:content-box;height:0;overflow:visible}
button,input,select,textarea{font:inherit;margin:0}optgroup{font-weight:bold}
button,input{overflow:visible}button,select{text-transform:none}
button,html [type=button],[type=reset],[type=submit]{-webkit-appearance:button}
button::-moz-focus-inner, [type=button]::-moz-focus-inner, [type=reset]::-moz-focus-inner, [type=submit]::-moz-focus-inner{border-style:none;padding:0}
button:-moz-focusring, [type=button]:-moz-focusring, [type=reset]:-moz-focusring, [type=submit]:-moz-focusring{outline:1px dotted ButtonText}
fieldset{border:1px solid #c0c0c0;margin:0 2px;padding:.35em .625em .75em}
legend{color:inherit;display:table;max-width:100%;padding:0;white-space:normal}textarea{overflow:auto}
[type=checkbox],[type=radio]{padding:0}
[type=number]::-webkit-inner-spin-button,[type=number]::-webkit-outer-spin-button{height:auto}
[type=search]{-webkit-appearance:textfield;outline-offset:-2px}
[type=search]::-webkit-search-cancel-button,[type=search]::-webkit-search-decoration{-webkit-appearance:none}
::-webkit-input-placeholder{color:inherit;opacity:0.54}
::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}
/* End extract */
html,body{font-family:Verdana,sans-serif;font-size:15px;line-height:1.5}html{overflow-x:hidden}
h1{font-size:36px}h2{font-size:30px}h3{font-size:24px}h4{font-size:20px}h5{font-size:18px}h6{font-size:16px}.w3-serif{font-family:serif}
h1,h2,h3,h4,h5,h6{font-family:"Segoe UI",Arial,sans-serif;font-weight:400;margin:10px 0}.w3-wide{letter-spacing:4px}
hr{border:0;border-top:1px solid #eee;margin:20px 0}
.w3-image{max-width:100%;height:auto}img{margin-bottom:-5px}a{color:inherit}
.w3-table,.w3-table-all{border-collapse:collapse;border-spacing:0;width:100%;display:table}.w3-table-all{border:1px solid #ccc}
.w3-bordered tr,.w3-table-all tr{border-bottom:1px solid #ddd}.w3-striped tbody tr:nth-child(even){background-color:#f1f1f1}
.w3-table-all tr:nth-child(odd){background-color:#fff}.w3-table-all tr:nth-child(even){background-color:#f1f1f1}
.w3-hoverable tbody tr:hover,.w3-ul.w3-hoverable li:hover{background-color:#ccc}.w3-centered tr th,.w3-centered tr td{text-align:center}
.w3-table td,.w3-table th,.w3-table-all td,.w3-table-all th{padding:8px 8px;display:table-cell;text-align:left;vertical-align:top}
.w3-table th:first-child,.w3-table td:first-child,.w3-table-all th:first-child,.w3-table-all td:first-child{padding-left:16px}
.w3-btn,.w3-button{border:none;display:inline-block;outline:0;padding:8px 16px;vertical-align:middle;overflow:hidden;text-decoration:none;color:inherit;background-color:inherit;text-align:center;cursor:pointer;white-space:nowrap}
.w3-btn:hover{box-shadow:0 8px 16px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19)}
.w3-btn,.w3-button{-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}
.w3-disabled,.w3-btn:disabled,.w3-button:disabled{cursor:not-allowed;opacity:0.3}.w3-disabled *,:disabled *{pointer-events:none}
.w3-btn.w3-disabled:hover,.w3-btn:disabled:hover{box-shadow:none}
.w3-badge,.w3-tag{background-color:#000;color:#fff;display:inline-block;padding-left:8px;padding-right:8px;text-align:center}.w3-badge{border-radius:50%}
.w3-ul{list-style-type:none;padding:0;margin:0}.w3-ul li{padding:8px 16px;border-bottom:1px solid #ddd}.w3-ul li:last-child{border-bottom:none}
.w3-tooltip,.w3-display-container{position:relative}.w3-tooltip .w3-text{display:none}.w3-tooltip:hover .w3-text{display:inline-block}
.w3-ripple:active{opacity:0.5}.w3-ripple{transition:opacity 0s}
.w3-input{padding:8px;display:block;border:none;border-bottom:1px solid #ccc;width:100%}
.w3-select{padding:9px 0;width:100%;border:none;border-bottom:1px solid #ccc}
.w3-dropdown-click,.w3-dropdown-hover{position:relative;display:inline-block;cursor:pointer}
.w3-dropdown-hover:hover .w3-dropdown-content{display:block;z-index:1}
.w3-dropdown-hover:first-child,.w3-dropdown-click:hover{background-color:#ccc;color:#000}
.w3-dropdown-hover:hover > .w3-button:first-child,.w3-dropdown-click:hover > .w3-button:first-child{background-color:#ccc;color:#000}
.w3-dropdown-content{cursor:auto;color:#000;background-color:#fff;display:none;position:absolute;min-width:160px;margin:0;padding:0}
.w3-check,.w3-radio{width:24px;height:24px;position:relative;top:6px}
.w3-sidebar{height:100%;width:200px;background-color:#fff;position:fixed!important;z-index:1;overflow:auto}
.w3-bar-block .w3-dropdown-hover,.w3-bar-block .w3-dropdown-click{width:100%}
.w3-bar-block .w3-dropdown-hover .w3-dropdown-content,.w3-bar-block .w3-dropdown-click .w3-dropdown-content{min-width:100%}
.w3-bar-block .w3-dropdown-hover .w3-button,.w3-bar-block .w3-dropdown-click .w3-button{width:100%;text-align:left;padding:8px 16px}
.w3-main,#main{transition:margin-left .4s}
.w3-modal{z-index:3;display:none;padding-top:100px;position:fixed;left:0;top:0;width:100%;height:100%;overflow:auto;background-color:rgb(0,0,0);background-color:rgba(0,0,0,0.4)}
.w3-modal-content{margin:auto;background-color:#fff;position:relative;padding:0;outline:0;width:600px}
.w3-bar{width:100%;overflow:hidden}.w3-center .w3-bar{display:inline-block;width:auto}
.w3-bar .w3-bar-item{padding:8px 16px;float:left;width:auto;border:none;outline:none;display:block}
.w3-bar .w3-dropdown-hover,.w3-bar .w3-dropdown-click{position:static;float:left}
.w3-bar .w3-button{white-space:normal}
.w3-bar-block .w3-bar-item{width:100%;display:block;padding:8px 16px;text-align:left;border:none;outline:none;white-space:normal;float:none}
.w3-bar-block.w3-center .w3-bar-item{text-align:center}.w3-block{display:block;width:100%}
.w3-responsive{overflow-x:auto}
.w3-container:after,.w3-container:before,.w3-panel:after,.w3-panel:before,.w3-row:after,.w3-row:before,.w3-row-padding:after,.w3-row-padding:before,
.w3-cell-row:before,.w3-cell-row:after,.w3-clear:after,.w3-clear:before,.w3-bar:before,.w3-bar:after{content:"";display:table;clear:both}
.w3-col,.w3-half,.w3-third,.w3-twothird,.w3-threequarter,.w3-quarter{float:left;width:100%}
.w3-col.s1{width:8.33333%}.w3-col.s2{width:16.66666%}.w3-col.s3{width:24.99999%}.w3-col.s4{width:33.33333%}
.w3-col.s5{width:41.66666%}.w3-col.s6{width:49.99999%}.w3-col.s7{width:58.33333%}.w3-col.s8{width:66.66666%}
.w3-col.s9{width:74.99999%}.w3-col.s10{width:83.33333%}.w3-col.s11{width:91.66666%}.w3-col.s12{width:99.99999%}
@media (min-width:601px){.w3-col.m1{width:8.33333%}.w3-col.m2{width:16.66666%}.w3-col.m3,.w3-quarter{width:24.99999%}.w3-col.m4,.w3-third{width:33.33333%}
.w3-col.m5{width:41.66666%}.w3-col.m6,.w3-half{width:49.99999%}.w3-col.m7{width:58.33333%}.w3-col.m8,.w3-twothird{width:66.66666%}
.w3-col.m9,.w3-threequarter{width:74.99999%}.w3-col.m10{width:83.33333%}.w3-col.m11{width:91.66666%}.w3-col.m12{width:99.99999%}}
@media (min-width:993px){.w3-col.l1{width:8.33333%}.w3-col.l2{width:16.66666%}.w3-col.l3{width:24.99999%}.w3-col.l4{width:33.33333%}
.w3-col.l5{width:41.66666%}.w3-col.l6{width:49.99999%}.w3-col.l7{width:58.33333%}.w3-col.l8{width:66.66666%}
.w3-col.l9{width:74.99999%}.w3-col.l10{width:83.33333%}.w3-col.l11{width:91.66666%}.w3-col.l12{width:99.99999%}}
.w3-content{max-width:980px;margin:auto}.w3-rest{overflow:hidden}
.w3-cell-row{display:table;width:100%}.w3-cell{display:table-cell}
.w3-cell-top{vertical-align:top}.w3-cell-middle{vertical-align:middle}.w3-cell-bottom{vertical-align:bottom}
.w3-hide{display:none!important}.w3-show-block,.w3-show{display:block!important}.w3-show-inline-block{display:inline-block!important}
@media (max-width:600px){.w3-modal-content{margin:0 10px;width:auto!important}.w3-modal{padding-top:30px}
.w3-dropdown-hover.w3-mobile .w3-dropdown-content,.w3-dropdown-click.w3-mobile .w3-dropdown-content{position:relative}
.w3-hide-small{display:none!important}.w3-mobile{display:block;width:100%!important}.w3-bar-item.w3-mobile,.w3-dropdown-hover.w3-mobile,.w3-dropdown-click.w3-mobile{text-align:center}
.w3-dropdown-hover.w3-mobile,.w3-dropdown-hover.w3-mobile .w3-btn,.w3-dropdown-hover.w3-mobile .w3-button,.w3-dropdown-click.w3-mobile,.w3-dropdown-click.w3-mobile .w3-btn,.w3-dropdown-click.w3-mobile .w3-button{width:100%}}
@media (max-width:768px){.w3-modal-content{width:500px}.w3-modal{padding-top:50px}}
@media (min-width:993px){.w3-modal-content{width:900px}.w3-hide-large{display:none!important}.w3-sidebar.w3-collapse{display:block!important}}
@media (max-width:992px) and (min-width:601px){.w3-hide-medium{display:none!important}}
@media (max-width:992px){.w3-sidebar.w3-collapse{display:none}.w3-main{margin-left:0!important;margin-right:0!important}}
.w3-top,.w3-bottom{position:fixed;width:100%;z-index:1}.w3-top{top:0}.w3-bottom{bottom:0}
.w3-overlay{position:fixed;display:none;width:100%;height:100%;top:0;left:0;right:0;bottom:0;background-color:rgba(0,0,0,0.5);z-index:2}
.w3-display-topleft{position:absolute;left:0;top:0}.w3-display-topright{position:absolute;right:0;top:0}
.w3-display-bottomleft{position:absolute;left:0;bottom:0}.w3-display-bottomright{position:absolute;right:0;bottom:0}
.w3-display-middle{position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);-ms-transform:translate(-50%,-50%)}
.w3-display-left{position:absolute;top:50%;left:0%;transform:translate(0%,-50%);-ms-transform:translate(-0%,-50%)}
.w3-display-right{position:absolute;top:50%;right:0%;transform:translate(0%,-50%);-ms-transform:translate(0%,-50%)}
.w3-display-topmiddle{position:absolute;left:50%;top:0;transform:translate(-50%,0%);-ms-transform:translate(-50%,0%)}
.w3-display-bottommiddle{position:absolute;left:50%;bottom:0;transform:translate(-50%,0%);-ms-transform:translate(-50%,0%)}
.w3-display-container:hover .w3-display-hover{display:block}.w3-display-container:hover span.w3-display-hover{display:inline-block}.w3-display-hover{display:none}
.w3-display-position{position:absolute}
.w3-circle{border-radius:50%}
.w3-round-small{border-radius:2px}.w3-round,.w3-round-medium{border-radius:4px}.w3-round-large{border-radius:8px}.w3-round-xlarge{border-radius:16px}.w3-round-xxlarge{border-radius:32px}
.w3-row-padding,.w3-row-padding>.w3-half,.w3-row-padding>.w3-third,.w3-row-padding>.w3-twothird,.w3-row-padding>.w3-threequarter,.w3-row-padding>.w3-quarter,.w3-row-padding>.w3-col{padding:0 8px}
.w3-container,.w3-panel{padding:0.01em 16px}.w3-panel{margin-top:16px;margin-bottom:16px}
.w3-code,.w3-codespan{font-family:Consolas,"courier new";font-size:16px}
.w3-code{width:auto;background-color:#fff;padding:8px 12px;border-left:4px solid #4CAF50;word-wrap:break-word}
.w3-codespan{color:crimson;background-color:#f1f1f1;padding-left:4px;padding-right:4px;font-size:110%}
.w3-card,.w3-card-2{box-shadow:0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12)}
.w3-card-4,.w3-hover-shadow:hover{box-shadow:0 4px 10px 0 rgba(0,0,0,0.2),0 4px 20px 0 rgba(0,0,0,0.19)}
.w3-spin{animation:w3-spin 2s infinite linear}@keyframes w3-spin{0%{transform:rotate(0deg)}100%{transform:rotate(359deg)}}
.w3-animate-fading{animation:fading 10s infinite}@keyframes fading{0%{opacity:0}50%{opacity:1}100%{opacity:0}}
.w3-animate-opacity{animation:opac 0.8s}@keyframes opac{from{opacity:0} to{opacity:1}}
.w3-animate-top{position:relative;animation:animatetop 0.4s}@keyframes animatetop{from{top:-300px;opacity:0} to{top:0;opacity:1}}
.w3-animate-left{position:relative;animation:animateleft 0.4s}@keyframes animateleft{from{left:-300px;opacity:0} to{left:0;opacity:1}}
.w3-animate-right{position:relative;animation:animateright 0.4s}@keyframes animateright{from{right:-300px;opacity:0} to{right:0;opacity:1}}
.w3-animate-bottom{position:relative;animation:animatebottom 0.4s}@keyframes animatebottom{from{bottom:-300px;opacity:0} to{bottom:0;opacity:1}}
.w3-animate-zoom {animation:animatezoom 0.6s}@keyframes animatezoom{from{transform:scale(0)} to{transform:scale(1)}}
.w3-animate-input{transition:width 0.4s ease-in-out}.w3-animate-input:focus{width:100%!important}
.w3-opacity,.w3-hover-opacity:hover{opacity:0.60}.w3-opacity-off,.w3-hover-opacity-off:hover{opacity:1}
.w3-opacity-max{opacity:0.25}.w3-opacity-min{opacity:0.75}
.w3-greyscale-max,.w3-grayscale-max,.w3-hover-greyscale:hover,.w3-hover-grayscale:hover{filter:grayscale(100%)}
.w3-greyscale,.w3-grayscale{filter:grayscale(75%)}.w3-greyscale-min,.w3-grayscale-min{filter:grayscale(50%)}
.w3-sepia{filter:sepia(75%)}.w3-sepia-max,.w3-hover-sepia:hover{filter:sepia(100%)}.w3-sepia-min{filter:sepia(50%)}
.w3-tiny{font-size:10px!important}.w3-small{font-size:12px!important}.w3-medium{font-size:15px!important}.w3-large{font-size:18px!important}
.w3-xlarge{font-size:24px!important}.w3-xxlarge{font-size:36px!important}.w3-xxxlarge{font-size:48px!important}.w3-jumbo{font-size:64px!important}
.w3-left-align{text-align:left!important}.w3-right-align{text-align:right!important}.w3-justify{text-align:justify!important}.w3-center{text-align:center!important}
.w3-border-0{border:0!important}.w3-border{border:1px solid #ccc!important}
.w3-border-top{border-top:1px solid #ccc!important}.w3-border-bottom{border-bottom:1px solid #ccc!important}
.w3-border-left{border-left:1px solid #ccc!important}.w3-border-right{border-right:1px solid #ccc!important}
.w3-topbar{border-top:6px solid #ccc!important}.w3-bottombar{border-bottom:6px solid #ccc!important}
.w3-leftbar{border-left:6px solid #ccc!important}.w3-rightbar{border-right:6px solid #ccc!important}
.w3-section,.w3-code{margin-top:16px!important;margin-bottom:16px!important}
.w3-margin{margin:16px!important}.w3-margin-top{margin-top:16px!important}.w3-margin-bottom{margin-bottom:16px!important}
.w3-margin-left{margin-left:16px!important}.w3-margin-right{margin-right:16px!important}
.w3-padding-small{padding:4px 8px!important}.w3-padding{padding:8px 16px!important}.w3-padding-large{padding:12px 24px!important}
.w3-padding-16{padding-top:16px!important;padding-bottom:16px!important}.w3-padding-24{padding-top:24px!important;padding-bottom:24px!important}
.w3-padding-32{padding-top:32px!important;padding-bottom:32px!important}.w3-padding-48{padding-top:48px!important;padding-bottom:48px!important}
.w3-padding-64{padding-top:64px!important;padding-bottom:64px!important}
.w3-left{float:left!important}.w3-right{float:right!important}
.w3-button:hover{color:#000!important;background-color:#ccc!important}
.w3-transparent,.w3-hover-none:hover{background-color:transparent!important}
.w3-hover-none:hover{box-shadow:none!important}
/* Colors */
.w3-amber,.w3-hover-amber:hover{color:#000!important;background-color:#ffc107!important}
.w3-aqua,.w3-hover-aqua:hover{color:#000!important;background-color:#00ffff!important}
.w3-blue,.w3-hover-blue:hover{color:#fff!important;background-color:#2196F3!important}
.w3-light-blue,.w3-hover-light-blue:hover{color:#000!important;background-color:#87CEEB!important}
.w3-brown,.w3-hover-brown:hover{color:#fff!important;background-color:#795548!important}
.w3-cyan,.w3-hover-cyan:hover{color:#000!important;background-color:#00bcd4!important}
.w3-blue-grey,.w3-hover-blue-grey:hover,.w3-blue-gray,.w3-hover-blue-gray:hover{color:#fff!important;background-color:#607d8b!important}
.w3-green,.w3-hover-green:hover{color:#fff!important;background-color:#4CAF50!important}
.w3-light-green,.w3-hover-light-green:hover{color:#000!important;background-color:#8bc34a!important}
.w3-indigo,.w3-hover-indigo:hover{color:#fff!important;background-color:#3f51b5!important}
.w3-khaki,.w3-hover-khaki:hover{color:#000!important;background-color:#f0e68c!important}
.w3-lime,.w3-hover-lime:hover{color:#000!important;background-color:#cddc39!important}
.w3-orange,.w3-hover-orange:hover{color:#000!important;background-color:#ff9800!important}
.w3-deep-orange,.w3-hover-deep-orange:hover{color:#fff!important;background-color:#ff5722!important}
.w3-pink,.w3-hover-pink:hover{color:#fff!important;background-color:#e91e63!important}
.w3-purple,.w3-hover-purple:hover{color:#fff!important;background-color:#9c27b0!important}
.w3-deep-purple,.w3-hover-deep-purple:hover{color:#fff!important;background-color:#673ab7!important}
.w3-red,.w3-hover-red:hover{color:#fff!important;background-color:#f44336!important}
.w3-sand,.w3-hover-sand:hover{color:#000!important;background-color:#fdf5e6!important}
.w3-teal,.w3-hover-teal:hover{color:#fff!important;background-color:#009688!important}
.w3-yellow,.w3-hover-yellow:hover{color:#000!important;background-color:#ffeb3b!important}
.w3-white,.w3-hover-white:hover{color:#000!important;background-color:#fff!important}
.w3-black,.w3-hover-black:hover{color:#fff!important;background-color:#000!important}
.w3-grey,.w3-hover-grey:hover,.w3-gray,.w3-hover-gray:hover{color:#000!important;background-color:#bbb!important}
.w3-light-grey,.w3-hover-light-grey:hover,.w3-light-gray,.w3-hover-light-gray:hover{color:#000!important;background-color:#f1f1f1!important}
.w3-dark-grey,.w3-hover-dark-grey:hover,.w3-dark-gray,.w3-hover-dark-gray:hover{color:#fff!important;background-color:#616161!important}
.w3-pale-red,.w3-hover-pale-red:hover{color:#000!important;background-color:#ffdddd!important}
.w3-pale-green,.w3-hover-pale-green:hover{color:#000!important;background-color:#ddffdd!important}
.w3-pale-yellow,.w3-hover-pale-yellow:hover{color:#000!important;background-color:#ffffcc!important}
.w3-pale-blue,.w3-hover-pale-blue:hover{color:#000!important;background-color:#ddffff!important}
.w3-text-red,.w3-hover-text-red:hover{color:#f44336!important}
.w3-text-green,.w3-hover-text-green:hover{color:#4CAF50!important}
.w3-text-blue,.w3-hover-text-blue:hover{color:#2196F3!important}
.w3-text-yellow,.w3-hover-text-yellow:hover{color:#ffeb3b!important}
.w3-text-white,.w3-hover-text-white:hover{color:#fff!important}
.w3-text-black,.w3-hover-text-black:hover{color:#000!important}
.w3-text-grey,.w3-hover-text-grey:hover,.w3-text-gray,.w3-hover-text-gray:hover{color:#757575!important}
.w3-text-amber{color:#ffc107!important}
.w3-text-aqua{color:#00ffff!important}
.w3-text-light-blue{color:#87CEEB!important}
.w3-text-brown{color:#795548!important}
.w3-text-cyan{color:#00bcd4!important}
.w3-text-blue-grey,.w3-text-blue-gray{color:#607d8b!important}
.w3-text-light-green{color:#8bc34a!important}
.w3-text-indigo{color:#3f51b5!important}
.w3-text-khaki{color:#b4aa50!important}
.w3-text-lime{color:#cddc39!important}
.w3-text-orange{color:#ff9800!important}
.w3-text-deep-orange{color:#ff5722!important}
.w3-text-pink{color:#e91e63!important}
.w3-text-purple{color:#9c27b0!important}
.w3-text-deep-purple{color:#673ab7!important}
.w3-text-sand{color:#fdf5e6!important}
.w3-text-teal{color:#009688!important}
.w3-text-light-grey,.w3-hover-text-light-grey:hover,.w3-text-light-gray,.w3-hover-text-light-gray:hover{color:#f1f1f1!important}
.w3-text-dark-grey,.w3-hover-text-dark-grey:hover,.w3-text-dark-gray,.w3-hover-text-dark-gray:hover{color:#3a3a3a!important}
.w3-border-red,.w3-hover-border-red:hover{border-color:#f44336!important}
.w3-border-green,.w3-hover-border-green:hover{border-color:#4CAF50!important}
.w3-border-blue,.w3-hover-border-blue:hover{border-color:#2196F3!important}
.w3-border-yellow,.w3-hover-border-yellow:hover{border-color:#ffeb3b!important}
.w3-border-white,.w3-hover-border-white:hover{border-color:#fff!important}
.w3-border-black,.w3-hover-border-black:hover{border-color:#000!important}
.w3-border-grey,.w3-hover-border-grey:hover,.w3-border-gray,.w3-hover-border-gray:hover{border-color:#bbb!important}
.hidden {
    visibility: hidden
}
.button-w4 {
   display: inline-block;
  width: 400px;
  padding: 8px;
  color: #000;
  background-color: transparent;
  border: 2px solid #000080;
   border-radius: 5px;
  text-align: center;
  outline: none;
  text-decoration: none;
  transition: color 0.3s ease-out,
              background-color 0.3s ease-out,
              border-color 0.3s ease-out;

}
.button-w4:hover,
.button-w4:active{
background-color: #778899;
  border-color: #000080;
  color: #fff;
  transition: color 0.3s ease-in,
              background-color 0.3s ease-in,
              border-color 0.3s ease-in;

}

.tooltip {
  color: #fff; outline: none;
  cursor: help; text-decoration: none;
  position: relative;
      transition: color 0.3s ease-in,
				  opacity 0.15s ease-in-out;
   text-align : center;
   opacity : 1;

}
.tooltip span {
  margin-left: -999em;
  position: absolute;

}
.tooltip:hover span {
  font-family: Calibri, Tahoma, Geneva, sans-serif;
  color = #000;
  position: absolute;
  left: 1em;
  top: 2em;
  z-index: 99;
  margin-left: 0;
  width: 250px;
  opacity : 1;
  background: #000; border: 1px solid #000;
  border-radius: 5px 5px;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.1);
	-webkit-box-shadow: 5px 5px rgba(0, 0, 0, 0.1);
	-moz-box-shadow: 5px 5px rgba(0, 0, 0, 0.1);
			  transition: color 0.3s ease-in-out,
              background-color 0.3s ease-in-out,
			  opacity 0.15s ease-in-out;
}

.tooltip:hover img {
  border: 0;
  opacity:1
  margin: -10px 0 0 -55px;
  float: left;

  position: absolute;
  transition: opacity 0.15s ease-in-out;
}
.tooltip:hover em {
  font-family: Candara, Tahoma, Geneva, sans-serif;
  font-size: 1.2em;
  font-weight: bold;
  display: block;
  opacity: 1
  padding: 0.2em 0 0.6em 0;
  transition: opacity 0.15s ease-in-out;
}
.classic { padding: 0.8em 1em; }
.custom { padding: 0.5em 0.8em 0.8em 2em; }
* html a:hover { background: transparent; opacity: 0; color:#fff  transition: opacity 0.15s ease-in-out;}


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

#Map {
	background-image: url(img/map.png);
	background-size: contain;
	background-repeat: no-repeat;
	background-position: center;
    height: 670px;
    width: 960px;
    display: block;

}
#chn {
  display: inline block;
  position:absolute;left:549px;top:582px;
  height:32px;
  width:32px;
  margin:0 auto;
}

#chn img {
  position:absolute;
  size: 102px 102px;
  left:0;
  left-margin:0;
  -webkit-transition: opacity 0.1s ease-in-out;
  -moz-transition: opacity 0.1s ease-in-out;
  -o-transition: opacity 0.1s ease-in-out;
  transition: opacity 0.1s ease-in-out;
}

.bgimg {
    z-index: -1;
    overflow: hidden;
    left: 70px;
    position: relative;
    display: block;
}

}
#chn img.top:hover {
  opacity:0;
}

#blr {
  display: inline block;
  position:fixed;left:495px;top:558px;
  height:32px;
  width:32px;
  margin:0 auto;
}

#blr img {

  position:absolute;
  size: 102px 102px;
  left:0;
  left-margin: 0;
  -webkit-transition: opacity 0.1s ease-in-out;
  -moz-transition: opacity 0.1s ease-in-out;
  -o-transition: opacity 0.1s ease-in-out;
  transition: opacity 0.1s ease-in-out;
}

#blr img.top:hover {
  opacity:0;
}
#mum {
  position:fixed;left:423px;top:427px;
  height:32px;
  width:32px;
  margin:0 auto;
}

#mum img {
  position:absolute;
  size: 102px 102px;
  left:0;
  -webkit-transition: opacity 0.1s ease-in-out;
  -moz-transition: opacity 0.1s ease-in-out;
  -o-transition: opacity 0.1s ease-in-out;
  transition: opacity 0.1s ease-in-out;
}

#mum img.top:hover {
  opacity:0;
}

#hyd{
  display: inline block;
  position:absolute;left:526px;top:510px;
  height:32px;
  width:32px;
  margin:0;
}

#hyd img {
  position:absolute;
  size: 102px 102px;
  left:0;
  left-margin:0
  -webkit-transition: opacity 0.1s ease-in-out;
  -moz-transition: opacity 0.1s ease-in-out;
  -o-transition: opacity 0.1s ease-in-out;
  transition: opacity 0.1s ease-in-out;
}

#hyd img.top:hover {
  opacity:0;
}
#ndl{
  position:fixed;left:498px;top:240px;
  height:32px;
  width:32px;
  margin:0 auto;
}

#ndl img {
  position:absolute;
  size: 102px 102px;
  left:0;
  -webkit-transition: opacity 0.1s ease-in-out;
  -moz-transition: opacity 0.1s ease-in-out;
  -o-transition: opacity 0.1s ease-in-out;
  transition: opacity 0.1s ease-in-out;
}

#ndl img.top:hover {
  opacity:0;
}

#kol{
  position:fixed;left:694px;top:382px;
  height:32px;
  width:32px;
  margin:0 auto;
}

#kol img {
  position:absolute;
  size: 102px 102px;
  left:0;
  -webkit-transition: opacity 0.1s ease-in-out;
  -moz-transition: opacity 0.1s ease-in-out;
  -o-transition: opacity 0.1s ease-in-out;
  transition: opacity 0.1s ease-in-out;
}

#kol img.top:hover {
  opacity:0;
}

#jmu{
  position:fixed;left:461px;top:177px;
  height:32px;
  width:32px;
  margin:0 auto;
}

#jmu img {
  position:absolute;
  size: 102px 102px;
  left:0;
  -webkit-transition: opacity 0.1s ease-in-out;
  -moz-transition: opacity 0.1s ease-in-out;
  -o-transition: opacity 0.1s ease-in-out;
  transition: opacity 0.1s ease-in-out;
}

#jmu img.top:hover {
  opacity:0;
}

#ahm{
  position:fixed;left:415px;top:362px;
  height:32px;
  width:32px;
  margin:0 auto;
}

#ahm img {
  position:absolute;
  size: 102px 102px;
  left:0;
  -webkit-transition: opacity 0.1s ease-in-out;
  -moz-transition: opacity 0.1s ease-in-out;
  -o-transition: opacity 0.1s ease-in-out;
  transition: opacity 0.1s ease-in-out;
  color: #fff; outline: none;

}

#ahm img.top:hover {
  opacity:0;


}
</style>
<!DOCTYPE html>
<html>
<head>
  <title>Travelx - Home</title>
  <link rel="shortcut icon" type="image/x-icon" href="mapmarker.ico" />
  <link rel="stylesheet" type="text/css" href="style.css"/>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
/* latin-ext */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 400;
  src: local('Raleway'), local('Raleway-Regular'), url(https://fonts.gstatic.com/s/raleway/v11/yQiAaD56cjx1AooMTSghGfY6323mHUZFJMgTvxaG2iE.woff2) format('woff2');
  unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Raleway';
  font-style: normal;
  font-weight: 400;
  src: local('Raleway'), local('Raleway-Regular'), url(https://fonts.gstatic.com/s/raleway/v11/0dTEPzkLWceF7z0koJaX1A.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215;
}
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
.myLink {display: none}
</style>
</head>
<body class="w3-light-grey" style = "background: #fff;">
<!-- Navigation Bar -->
<div class="w3-bar w3-white w3-border-bottom w3-xlarge">
  <a href="homepage.php" class="w3-bar-item w3-button w3-text-red w3-hover-red"><b><i class="fa fa-map-marker w3-margin-right"></i>Travelx</b></a>
  <a href="login.php" class="w3-bar-item w3-button  w3-right w3-text-red w3-hover-red"><b><i class="fa fa-close w3-margin-left"></i><font size="4">Log-out</font></b></a>
  <a href="/train/Contact-us/contact.php" class="w3-bar-item w3-button  w3-right w3-text-red w3-hover-red"><b><i class="fa fa-phone w3-margin-left"></i><font size="4">
Contact Us</font></b></a>
  </div>
<!-- Header -->
<header class="w3-display-container w3-content w3-hide-small" style="max-width:1500px">
  <div>

	<div class="w3-panel w3-padding-16 w3-red w3-card-2 w3-hover-opacity-off">
		<h2><?php
		 $name = $_SESSION['name'];
		 if(isset($_SESSION['header']))
		 {
		  $header =	$_SESSION['header'];

		 unset($_SESSION['header']);

		 echo "$header";
		 }

		 else
		 {
			echo "Welcome $name" ;
		 }
		 ?></h2>

	</div>
  <img class="w3-image" src="/img/back4.jpg" alt="Theme" >



  <div class="w3-display-middle" style="width:80%">
    <div class="w3-bar w3-black">
      <button class="w3-bar-item w3-button tablink w3-red" onclick="openLink(event, 'Train');"><i class=" fa fa-train w3-margin-right"></i>Train</button>
      <button class="w3-bar-item w3-button tablink w3-red" onclick="openLink(event, 'Map');"><i class="fa fa-map w3-margin-right"></i>Map</button>
	  <button class="w3-bar-item w3-button tablink w3-red" onclick="openLink(event, 'Station');"><i class="fa fa-stop w3-margin-right"></i>Station</button>

    </div>

    <!-- Tabs -->
    <div id="Train" class="w3-container w3-white w3-padding-16  myLink">
      <h1>Travel India with us</h1>
	  <div class="w3-row-padding" style="margin:0 -16px;">
	  <div class="w3-half">
	  <form action = "schedule.php" method = "post" id="booking" onchange="handleSelect()">




          <label>From</label>
		  <select class="w3-hover-border-red w3-input w3-border " name = "select1" required>
		    <option selected="selected" value = "1" style = "color: #808080;">-----------------------------------Departing From--------------------------------</option>
			<option name="c">Chennai</option>
			<option name="b">Bangalore</option>
			<option name="m">Mumbai</option>
			<option name="d">New Delhi</option>
			<option name="h">Hyderabad</option>
			<option name="a">Ahmedabad</option>
			<option name="j">Jammu</option>
			<option name="k">Kolkata</option>
		  </select>
    <!-- Previous Box <input class="w3-input w3-border" type="text" placeholder="Departing from"> -->
        </div>
        <div class="w3-half">
          <label>To</label>
		  <select class="w3-input w3-hover-border-red w3-border " name = "select2"  required>
			<option selected="selected" value = "1" style = "color: #808080;">---------------------------------------Arriving at--------------------------------</option>
			<option name="c">Chennai</option>
			<option name="b">Bangalore</option>
			<option name="m">Mumbai</option>
			<option name="d">New Delhi</option>
			<option name="h">Hyderabad</option>
			<option name="a">Ahmedabad</option>
			<option name="j">Jammu</option>
			<option name="k">Kolkata</option>
		  </select>
	<!--<input class="w3-input w3-border" type="text" placeholder="Arriving at">-->
        </div>
	 </div>

	<br>

	<br>
	<br>

	<h3><center>Check Dates</center></h3>
	<div class="w3-half">

	<label>Between/On</label>
	<br>
	<input class="w3-input w3-border w3-hover-border-red"  name = "date1" type="date"  value=<?php echo date('Y-m-d'); ?>>
	</div>

	<div class "w3=half">
	<label>To</label>
	<input class="w3-input w3-border w3-hover-border-red" name = "date2" type="date" style ="width:50%;" value=<?php echo date('Y-m-d'); ?>>
	</div>
	<br><br><br>
		<p><button class="button-w4" name = "schedule_btn" type="submit">Search For Trains</button></p></h3>
	  <br> </div>

     </form>


    <center>
	<div id="Map" class="w3-container w3-white w3-padding-16 myLink" style = "width: 100%">
		<div  id="chn">
			<button style = "background: transparent;    border: none !important;    font-size:0;"  onclick="openLink1(event, 'Station'); onclick=openCity(event, 'Chennai');" >
				<img class="bottom" width = "35%" height = "35%" src="/img/c2.png">
				<img class="top"  width = "35%" height = "35%" src="/img/uc.png" />
			</button>
		    <a class="tooltip" href="#"><h6>.</h6>
			<span>Chennai!</span></a>
		</div>
		<div id="blr">
		<button style = "background: transparent;    border: none !important;    font-size:0;" onclick="openLink1(event, 'Station'); onclick=openCity(event, 'Bengaluru');">
		  <img class="bottom" width = "35%" height = "35%" src="/img/c2.png">
		  <img class="top"  width = "35%" height = "35%" src="/img/uc.png" />
		  </button>
		  <a class="tooltip" href="#"><h6> ^</h6>
		<span>Bangalore!</span></a>


		</div>

		<div id="mum">
		<button style = "background: transparent;    border: none !important;    font-size:0;" onclick="openLink1(event, 'Station'); onclick=openCity(event, 'Mumbai');">
		  <img class="bottom" width = "35%" height = "35%" src="/img/c2.png">
		  <img class="top"  width = "35%" height = "35%" src="/img/uc.png" />
		  </button>
		  <a class="tooltip"><h2>^</h2>
		<span>Mumbai!</span></a>


		</div>
		<div id="hyd">
		<button style = "background: transparent;    border: none !important;    font-size:0;" onclick="openLink1(event, 'Station'); onclick=openCity(event, 'Hyderabad');">
		  <img class="bottom" width = "35%" height = "35%" src="/img/c2.png">
		  <img class="top"  width = "35%" height = "35%" src="/img/uc.png" />
		  </button>
		  <a class="tooltip" ><h6>^</h6>
		<span>Hyderabad!</span></a>


		</div>
		<div id="ndl">
		<button style = "background: transparent;    border: none !important;    font-size:0;" onclick="openLink1(event, 'Station'); onclick=openCity(event, 'Delhi');">
		  <img class="bottom" width = "35%" height = "35%" src="/img/c2.png">
		  <img class="top"  width = "35%" height = "35%" src="/img/uc.png" />
		  </button>
		  <a class="tooltip" href="#"><h6>^</h6>
		<span>New Delhi!</span></a>


		</div>
		<div id="kol">
		<button style = "background: transparent;    border: none !important;    font-size:0;" onclick="openLink1(event, 'Station'); onclick=openCity(event, 'Kolkata');">
		  <img class="bottom" width = "35%" height = "35%" src="/img/c2.png">
		  <img class="top"  width = "35%" height = "35%" src="/img/uc.png" />
		  </button>
		  <a class="tooltip" href="#"><h6>^</h6>
		<span>Kolkata!</span></a>


		</div>
		<div id="jmu">
		<button style = "background: transparent;    border: none !important;    font-size:0;" onclick="openLink1(event, 'Station'); onclick=openCity(event, 'Jammu');">
		  <img class="bottom" width = "35%" height = "35%" src="/img/c2.png">
		  <img class="top"  width = "35%" height = "35%" src="/img/uc.png" />
		  </button>
		  <a class="tooltip" href="#"><h6>^</h6>
		<span>Jammu</span></a>


		</div>
		<div id="ahm">
				<button style = "background: transparent;    border: none !important;    font-size:0;" onclick="openLink1(event, 'Station'); onclick=openCity(event, 'Ahmedabad');">
		  <img class="bottom" width = "35%" height = "35%" src="/img/c2.png">
		  <img class="top"  width = "35%" height = "35%" src="/img/uc.png" />
		  </button>
		  <a class="tooltip" href="#"><h6>^</h6>
		<span>Ahmedabad</span></a>


		</div>
    </div>
  </center>
	<div id="Station" class="w3-container w3-grey  myLink" style = "display:block; height:120%;"  >
		<div class="w3-sidebar w3-bar-block w3-black w3-card-2" style="width:130px margin:0 -16px;">
		<!-- <div class="w3-bar">-->
			<button class="w3-bar-item w3-button tablink w3-red" onclick="openCity(event, 'Default');">Select a City</button>
			<button class="w3-bar-item w3-button tablink w3-red" onclick="openCity(event, 'Chennai');">Chennai</button>
			<button class="w3-bar-item w3-button tablink w3-red" onclick="openCity(event, 'Bangalore');">Bangalore</button>
			<button class="w3-bar-item w3-button tablink w3-red" onclick="openCity(event, 'Mumbai');">Mumbai</button>
			<button class="w3-bar-item w3-button tablink w3-red" onclick="openCity(event, 'Delhi');">New Delhi</button>
			<button class="w3-bar-item w3-button tablink w3-red" onclick="openCity(event, 'Hyderabad');">Hyderabad</button>
			<button class="w3-bar-item w3-button tablink w3-red" onclick="openCity(event, 'Jammu');">Jammu</button>
			<button class="w3-bar-item w3-button tablink w3-red" onclick="openCity(event, 'Kolkata');">Kolkata</button>
			<button class="w3-bar-item w3-button tablink w3-red" onclick="openCity(event, 'Ahmedabad');">Ahmedabad</button>
		</div>
		<div id = "Default" class = "w3-container city w3-button w3-grey" style = " display:block; margin: 190px;">
				<br>
				<br>
				<br>
				<h1><b> Choose To Travel to the Various Cities We Have Passage To!</b></h2>
				<h3><em>Here at <a href="#" class="w3-text-red w3-hover-red"><i class="fa fa-map-marker w3-margin-right"></i><big><big>Travelx</big></big></a> Our Customers are Our Guests</em></h3>
				<br>
		</div>
		<div id="Chennai" class="w3-container w3-button city w3-grey w3-animate-opacity w3-padding-12" style = "display: none; margin-left: 190px;">
			<img src = "./img/chennai_central.jpg" alt = "Chennai Central">
			<h2>Chennai</h2>
			<p><h5> Chennai Central, erstwhile Madras Central,
			is the main railway terminus in the city of Chennai, formerly known as Madras. </p>
			<p>
			It lies adjacent to the current headquarters of the Southern Railway, as well as the Ripon Building,
			and is one of the most important railway hubs in South India. The other major railway hub stations in the city are Chennai Egmore and Tambaram,
			Chennai Beach.</p>
			<P>Chennai Central connects the city to New Delhi and prominent cities of India such as Ahmedabad, Bangalore, Bhopal, Coimbatore, Hyderabad,
			Jaipur, Kolkata, Lucknow, Mumbai, Patna, Varanasi and so forth. The 142-year-old building of the railway station, </p>
			one of the most prominent landmarks of Chennai, was designed by architect George Harding.[6] Along with Chennai Beach, the station is also a main hub for the
			Chennai Suburban Railway system.</h4>
		</div>
		<div id="Bangalore" class="w3-container city w3-animate-left w3-padding-12 " style = " display: none; margin-left:190px;">
			<img src = "./img/bengaluru-city.jpg" alt = "Bengaluru Majestic Terminal">
			<h2>Bangalore</h2>
			<h5>
			<p>Bangalore City railway station, officially known as Krantivira Sangolli Rayanna railway station, is the main railway station serving the city of Bengaluru, Karnataka. </p>
			<p>It is located across the Kempegowda Bus Station. The station has 10 platforms and two entrances.</p></h5>

		</div>
		<div id="Mumbai" class="w3-container city w3-animate-left w3-padding-12" style = "display: none; margin-left: 190px;">
			<img src = "./img/mumbai_central.jpg" alt = "Mumbai Central" height = "50%">
			<h2>Mumbai</h2>
			<h5>
			<p>Mumbai Central (formerly Bombay Central) is a major railway station on the Western line, situated in Mumbai, in an area known by the same name.
			Designed by British architect Claude Batley, it serves as a major stop for both local and inter-city/express trains with separate platforms for them .
			It is also a terminal for several long distance trains including the Mumbai Rajdhani Express.</p>
		    <p>Trains depart from the station connecting various destinations mostly across states in the northern, eastern and north-eastern parts of India.</p>
			</h5>
		</div>
		<div id="Delhi" class="w3-container city w3-animate-left w3-padding-12" style = "display: none; margin-left: 190px;">
			<img src = "./img/new_delhi.jpg" alt = "New Delhi" height = "50%">
			<h2>New Delhi</h2>
			<h5>
			<p>The New Delhi Railway Station (station code NDLS), situated between Ajmeri Gate and Paharganj is the main railway station in Delhi. It is the busiest Railway Station in the country in terms of both trains and passenger movement.</p>
			<p>It handles close to 400 trains and 500,000 passengers daily with 16 platforms. The New Delhi railway station holds the record for the largest route interlocking system in the world along with the Kanpur Central Railway Station i.e. 48. The station is about two kilometres north of Connaught Place, in central Delhi</p>
			</h5>
		</div>
		<div id="Hyderabad" class="w3-container city w3-animate-left w3-padding-12" style = "display: none; margin-left: 190px;">

			<img src = "./img/Hyd_r.jpg" alt = "Hyderabad Railway Station" height = "50%">
			<h2>Hyderabad</h2>
			<h5><p>The Hyderabad Deccan railway station, popularly known as Nampally railway station, is located at Nampally, a locality in Hyderabad.
			It falls under the Secunderabad Division of South Central Railway while Kacheguda comes under Hyderabad Division of SCR.</p>
			<p>The station serves the city of Hyderabad by rail to and from many important towns and cities in the country.
			The station is powered by 228 kW (306 hp) solar power plant costing ₹1.3 crore (US$200,000) funded by Persistant Foundation and EPC completed by Sunshot Technologies.</p>
			</h5>
		</div>
		<div id="Jammu" class="w3-container city w3-animate-left w3-padding-12" style = "display: none; margin-left: 190px;">
			<img src = "./img/jammu_tawi.jpg" alt = "Jammu" height = "50%">
			<h2>Jammu</h2>
			<h5>
			<p><em>Jammu Tawi is a railway station in Jammu city in the Indian state of Jammu and Kashmir.</em></p>
				<p>Jammu Tawi is the largest railway station in Jammu and Kashmir state. It is a major railhead for other places in the state and for tourists heading towards the Kashmir Valley.
				Kashmir Railway project starts northwards from here. Administratively, it is in the Firozpur division of Northern Railways.</p>
				<p>Jammu Tawi is well connected to major Indian cities by Indian railways trains. The station code is JAT. The second longest running train in India, in terms of time and distance,
				the Himsagar Express that goes to Kanyakumari, Tamil Nadu in 70 hours, originates from here.
</p>
			</h5>
		</div>
		<div id="Kolkata" class="w3-container city w3-animate-left w3-padding-12" style = "display: none; margin-left: 190px;">
			<img src = "./img/Kolkata_Station.jpg" alt = "Kolkata" height = "40%">
			<h2>Kolkata</h2>
			<h5>
			<p>Kolkata railway station formerly known as Chitpur Station, is the newest of the four intracity railway stations serving Howrah and Kolkata, India</p>
			<p>Kolkata station is situated in the Chitpur locality of north central Kolkata. The station is linked to the Sealdah-Ranaghat-Krishnanagar-Berhampore-Lalgola line and is served by the Eastern Railway for trains to
			Naihati, Bandel, Kalyani Simanta, Gede, Shantipur, Krishnanagar,Berhampore,Lalgola, Dankuni, Kolkata Airport, Bongaon, Hasnabad and others. The number of suburban trains is lower than long-distance trains.</p>
			</h5>
		</div>
		<div id="Ahmedabad" class="w3-container city w3-animate-left w3-padding-12" style = "display: none; margin-left: 190px;">
			<img src = "./img/Ahmedabad_Station.jpg" alt = "Ahmedabad Train Station" height = "40%">
			<h3>Ahmedabad</h3>
			<h5><p>Ahmedabad Junction railway station is the main railway station of Ahmedabad, Gujarat, India. It is also the biggest and busiest railway station within Gujarat. </p>
			<p>It is second highest income generating division in Western Railways after the Mumbai Division. The station has 12 platforms. There are an ample numbers of tea stalls, snack bars, medical shops and enquiry desks. </p>
			<p>The station also has one cybercafe which is run by Tata Indicom. The government is also considering making the station WiFi enabled. The station is undergoing large-scale automation to make it a technologically advanced station, and new ATM outlets from ICICI Bank, Canara Bank, Union Bank of India, Dena Bank, Bank of Baroda, State Bank of India & other major banks has been installed.
			RailTel plans to open Cyber Cafe in Ahmedabad Station.

</p>
			</h5>
		</div>
	</div>
  </div>

</header>
<!-- Page content -->
<div class="w3-content " style="max-width:1100px;">
  <form action = "homepage.php" id = "submit" method = "post">
   <!-- Newsletter -->
  <div class="w3-container">
    <div class="w3-panel w3-padding-16 w3-blue-gray w3-border-black w3-card-2 w3-hover-opacity-off">
	  <div id = "mydiv">
      <h2>Get the best offers first!</h2>
      <p>Join our newsletter.</p>
      <label>E-mail</label>
      <input style = "#000" class="form-control w3-border w3-black" name = "email" id = "email" type="email" placeholder="Your Email address" required = "">
      <button type="submit" class="w3-button w3-red w3-margin-top" name="subscribe_btn">Subscribe</button>

	  </div>
    </div>
    <div class="w3-container">
<?php
if(isset($_POST['msgsubmit']))
{
    $name=mysqli_real_escape_string($db,$_POST['Name']);
    $email=mysqli_real_escape_string($db,$_POST['Email']);
    $message=mysqli_real_escape_string($db,$_POST['Message']);
	        $sql="INSERT INTO `message`(`NAME`, `EMAIL`, `MESSAGE`) VALUES ('$name','$email','$message')";
            mysqli_query($db,$sql);
            $_SESSION['message']="YOUR MESSAGE IS SENT!!";
            $_SESSION['name']=$name;
			unset($_POST['msgsubmit']);
			
            header("location:/train/homepage.php");  //redirect home page
}
?>
      <h2>Contact</h2>
      <p>Let us book your next trip!</p>
      <i class="fa fa-map-marker" style="width:30px"></i> Chennai, India<br>
      <i class="fa fa-envelope" style="width:30px"> </i> Email: mail@mail.com<br>
      <form action="homepage.php" target="_blank">
        <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name" required name="Name"></p>
        <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Email" required name="Email"></p>
        <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Message" required name="Message"></p>
        <p><button class="button w3-black w3-padding-large" type="submit" name="msgsubmit"><span>SEND MESSAGE</span></button></p>
      </form>
    </div>

  </div>
  </form>






<!-- End page content -->
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
$('select').change(function() {

    $(this)
        .siblings('select')
        .children('option[value=' + this.value + ']')
        .attr('disabled', true)
        .siblings().removeAttr('disabled');

});

 $(document).ready(function() {
        $(".preferenceSelect").change(function() {
            // Get the selected value
            var selected = $("option:selected", $(this)).val();
            // Get the ID of this element
            var thisID = $(this).attr("id");
            // Reset so all values are showing:
            $(".preferenceSelect option").each(function() {
                $(this).show();
            });
            $(".preferenceSelect").each(function() {
                if ($(this).attr("id") != thisID) {
                    $("option[value='" + selected + "']", $(this)).attr("disabled", true);
                }
            });

        });
    });
</script>
<script>
// Tabs

/*if(selName=="sel1"&&selIndex==0){
document.forms[0]['sel'+val].disabled=true;
document.forms[0]['sel'+val2].disabled=true;
document.forms[0]['sel'+val].selectedIndex=0;
document.forms[0]['sel'+val2].selectedIndex=0;
}
if(selName=="sel2"&&selIndex!=0){
document.forms[0]['sel'+val].disabled=false;
}
if(selName=="sel2"&&selIndex==0){
document.forms["booking"]['sel'+val].disabled=true;
document.forms[0]['sel'+val].selectedIndex=0;
}
}


  function toggleDisability(selectElement){
   //Getting all select elements

   var arraySelects = document.getElementsById('mySelect');
   //Getting selected index
   var selectedOption = selectElement.selectedIndex;
   //Disabling options at same index in other select elements
   for(var i=0; i<arraySelects.length; i++) {
    if(arraySelects[i] == selectElement)
     continue; //Passing the selected Select Element
    arraySelects[i].options[selectedOption].disabled = true;
	var temp = i;

	for(var i=0; i<arraySelects.length; i++)
	{
		if(i!=selectedOption)
		{
			arraySelects[temp].options[i].disabled = false;
		}
	}
   }
  }


  function toggleDisability1(selectElement){
   //Getting all select elements

   var arraySelects = document.getElementsByClassName('mySelect1');
   //Getting selected index
   var selectedOption = selectElement.selectedIndex;
   //Disabling options at same index in other select elements
   for(var i=0; i<arraySelects.length; i++) {
    if(arraySelects[i] == selectElement)
     continue; //Passing the selected Select Element
    arraySelects[i].options[selectedOption].disabled = true;
	var temp = i

	for(var i=0; i<arraySelects.length; i++)
	{
		if(i!=selectedOption)
		{
			arraySelects[temp].options[i].disabled = false;
		}
	}
   }
  }*/
function myFunction() {
    var x = document.getElementById('myDIV');
    if (x.style.display === 'none') {
        x.style.display = 'block';
    } else {
        x.style.display = 'none';
    }
}

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
function openLink1(evt, linkName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("myLink");
  for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" w3-grey", "");
  }
  document.getElementById(linkName).style.display = "block";

}
// Click on the first tablink on load
document.getElementsByClassName("tablink")[0].click();

function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-red";
}

</script>


</body>
</html>
