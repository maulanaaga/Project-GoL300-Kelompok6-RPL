<!DOCTYPE html PUBLIC>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Welcome To GO-L300</title>
<link rel="Shortcut Icon" href="images/train.ico">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<script type="text/javascript" src="js/jquery00.js"></script> 
<script type="text/javascript" src="js/jquery01.js"></script>		
<script type="text/javascript" src="js/coin-sli.js"></script>
<script type="text/javascript">
$(document).ready(function(){$('#coin-slider').coinslider({ 
width:900,height:300,navigation:true,effect:'random',
delay:3000
});});
function MM_popupMsg(msg) {
  alert(msg);
}
</script>
<script type="text/javascript" src="js/function.js"></script>
<style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-weight: bold;
	font-size: 14px;
}
.style3 {color: #FFFFFF}
-->
</style>
</head>
<body class="noJs">
<div class="container">
		<div id="header">
			<div class="wrap">
				<div class="logo">
					<a href="#" title="Design Lovers">Design Lovers</a>
				</div>
				<ul id="nav">
					<li class="current"><a href="index.php">Home</a></li>
				  <li><a href="jadwal1.php">jadwaL</a></li>
                  <li><a href="berita1.php">berita</a></li>
					<li><a href="arsip1.php">ARSIP</a></li>
					<li><a href="contact1.php">Contact</a></li>
			  </ul>
			</div>
		</div>

</body> 
</html>
<?php
mysql_free_result($rsusers);

mysql_free_result($rstesti);
?>