<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Member Area</title>
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
width:900,height:300,navigation:true,effect:'random',//random, swirl, rain, straight
delay:3000//Delay between transitions
});});
function MM_popupMsg(msg) { //v1.0
  alert(msg);
}
</script>
<script type="text/javascript" src="js/function.js"></script>
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
#apDiv1 {
	position:absolute;
	width:200px;
	height:50px;
	z-index:1;
	left: 682px;
	top: 713px;
}
-->
</style>
</head>
<body class="noJs">
	<div class="container">
		<div id="header">
			<div class="wrap">
				<div class="logo">
					<a href="user.php" title="Design Lovers">Design Lovers</a>				</div>
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
				<div class="main intro">Membuat kemudahan dan kenyamanan dalam pemesanan tiket L300, &quot;NO NGANTRI, NO CALO, Gak Pake Ribet&quot;</div>
				
  <div class="sidebar" id="search_box">
                    <label for="search">Input Tujuan Anda...</label>
                    <input type="submit" value="" id="search_btn" class="submit" />
                    <input type="text" value="" id="search" class="text_form" name="search" />
                </div>
			</div>
			<div class="separator"></div>
			<div class="wrap">
			<div id="main" class="main">
				<div class="headline">
					<h1>Selamat datang member</h1>
					<p>Dengan menjadi member,nikmati segala fasilitas yang ada di situs GO-L300.</p>
				</div>
				<div class="post">
				  <h2 align="center">&quot;Pesan Anda Terkirim&quot;</h2>
				  <p>&nbsp;</p>
		    <blockquote> 
                        <p>&nbsp;</p>
                        <div align="center">Terimakasih</div>
		    </blockquote> 

                    <p>&nbsp;</p>
                    
              </div>
			</div>
<div id="sidebar" class="sidebar">
				<h2>Layanan Kami</h2>
				<ul class="arrow_list">
					<li>Pesan Tiket</li>
					<li>Tracking Tiket</li>
					<li>Promo</li>
					</ul>
				
				<div class="separator"></div>
				
				<h2>Feedback</h2>
	  <h4>Saran anda membangun kami</h4>
				
                <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
                  <table align="center">
                    <tr valign="baseline">
                      <td nowrap="nowrap" align="right">Username:</td>
                      <td><input type="text" name="username" value="" size="25" /></td>
                    </tr>
                    <tr valign="baseline">
                      <td nowrap="nowrap" align="right" valign="top">Pesan:</td>
                      <td><textarea name="pesan" cols="25" rows="5" class="comment_meta"></textarea>
                      </td>
                    </tr>
                    <tr valign="baseline">
                      <td nowrap="nowrap" align="right">&nbsp;</td>
                      <td><input type="submit" onclick="MM_popupMsg('TERIMA KASIH ATAS SARAN DAN KRITIK ANDA')" value="Insert record" />
                      <input name="Reset" type="reset" value="Reset" /></td>
                    </tr>
                  </table>
                  <input type="hidden" name="MM_insert" value="form1" />
                </form>
                <p>&nbsp;</p>
</div>
	  <
		</div>
	</div>
	<div id="footer">
		<div class="container">
			<div class="wrap">
				<div class="footer_logo">
					<a href="user.php" title="Design Lovers">Design Lovers</a>				</div>
		  <ul id="footer_nav">
					<li class="current"><a href="user.php">Home</a></li>
				  <li><a href="jadwal.php">JADWAL</a></li>
					<li><a href="berita.php">BERITA</a></li>
					<li><a href="arsip.php">ARSIP</a></li>
					<li><a href="contact.php">Contact</a></li>
			  </ul>
				<p id="copy">Designed by &copy;RPL-6</p>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</body> 
</html>