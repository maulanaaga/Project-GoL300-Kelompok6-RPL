<?php
//XMLXSL Transformation class
require_once('includes/MM_XSLTransform/MM_XSLTransform.class.php'); 
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>L-300 Dalam Berita</title><script>  
function confirmLogout() {  
        return confirm("Yakin Logout?")  
      }  
</script><link rel="Shortcut Icon" href="images/train.ico">  
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
<script type="text/javascript" src="js/jquery00.js"></script> 
<script type="text/javascript" src="js/jquery01.js"></script>		
<script type="text/javascript" src="js/coin-sli.js"></script>
<script type="text/javascript">
$(document).ready(function(){$('#coin-slider').coinslider({ 
width:900,height:300,navigation:true,effect:'random',//random, swirl, rain, straight
delay:3000//Delay between transitions
});});
</script>
<script type="text/javascript" src="js/function.js"></script>
<style type="text/css">
<!--
.style1 {font-size: 12px}
-->
</style>
</head>
<body class="noJs">
	<div class="container">
		<div id="header">
			<div class="wrap">
				<div class="logo">
					<a href="user.php" title="Design Lovers">Design</a>				</div>
		  <ul id="nav">
					<li class="current"><a href="user.php">Home</a></li>
				  <li><a href="jadwal.php">JADWAL</a>					</li>
		    <li><a href="berita.php">BERITA</a></li>
			<li><a href="arsip.php">ARSIP</a></li>
			<li><a href="contact.php">Contact</a></li>
			  </ul>
			</div>
		</div>
		<div class="separator"></div>
		<div class="wrap">
				<div class="main intro">Membuat kemudahan dan kenyamanan dalam pemesanan tiket L300, &quot;NO COPET, NO NGANTRI, NO CALO&quot;</div>
				
  <div class="sidebar" id="search_box">
    <label for="search">Input Tujuan Anda...</label>
                    <input type="submit" value="" id="search_btn" class="submit" />
  </div>
	  </div>
			<div class="separator"></div>
			<div class="wrap">
			<div id="main" class="main">
				<div class="headline">
				  <h1>L-300 Dalam Berita</h1>
				  <p>&nbsp; </p>
                  <?php
$mm_xsl = new MM_XSLTransform();
$mm_xsl->setXML("berita/kereta.xml");
$mm_xsl->setXSL("kereta.xsl");
echo $mm_xsl->Transform();
?></div>
			  </div>
			<div id="sidebar" class="sidebar">
				<h2>Layanan Kami</h2>
				<ul class="arrow_list">
					<li><a href="jadwal.php">Pesan Tiket</a></li>
				  <li><a href="search.php">Tracking Tiket</a></li>
				  <li><a href="promo.php">Promo</a></li>
			  </ul>
				
	  <div class="separator"></div>
				
	  <h2>&nbsp;</h2>
				<p>&nbsp;</p>
</div>
	  </div>
	</div>
	<div id="footer">
		<div class="container">
			<div class="wrap">
				<div class="footer_logo">
					<a href="user.php" title="Design Lovers">Design</a>				</div>
		  <ul id="footer_nav">
					<li class="current"><a href="user.php">Home</a></li>
				  <li><a href="jadwal.php">JADWAL</a></li>
			<li><a href="berita.php">BERITA</a></li>
			<li><a href="arsip.php">ARSIP</a></li>
			<li><a href="contact.php">Contact</a></li>
			  </ul>
				<p id="copy">GO-L300 KELOMPOK 6 RPL</p>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</body> 
</html>