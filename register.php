<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Welcome To Kereta On-Line</title>
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
</script>
<script type="text/javascript" src="js/function.js"></script>
<style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-weight: bold;
}
.style2 {color: #FF0000}
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
		<div class="separator"></div>
		<div id="slider_container">
			<div class="wrap">
				<div id="coin-slider">
					<a href="#">
						<img src="images/f1.jpg" alt="" />
						<span>Welcome To Kereta On-Line</span>
					</a>
					<a href="#">
						<img src="images/f2.jpg" alt="" />
						<span><strong>Argo Bromo.</strong> Jakarta-Surabaya, hanya 5 jam. </span>
					</a>
					<a href="#">
						<img src="images/f3.jpg" alt="" />
						<span><strong>Pemandangan yang indah</strong> Nikmati perjalanan dengan pemandangan yang asri dan nyaman </span>
					</a>
					<a href="#">
						<img src="images/f4.jpg" alt="" />
						<span><strong>Kami Siap melayani anda.</strong> Cepat, Tepat, Aman , dan terjangkau </span>
					</a>
					<a href="#">
						<img src="images/f5.jpg" alt="" />
						<span><strong>Interior yang Nyaman</strong> kami manjakan anda dengan segala fasilitas yang membuat anda nyaman </span>
					</a>
				</div>
			</div>
		</div>
		<div class="separator"></div>
		<div class="columns">
			<div class="wrap">
				<div class="oneOfThree first">
				  <div id="log">
                    <h3>pendaftaran Pengguna</h3>
				    
                    <form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
                      <table width="109%" align="center">
                        <tr valign="baseline">
                          <td nowrap="nowrap" align="right">Username:</td>
                          <td><input type="text" name="username" value="" size="20" /></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap="nowrap" align="right">Password:</td>
                          <td><input type="text" name="password" value="" size="20" /></td>
                        </tr>
                                                <tr valign="baseline">
                          <td nowrap="nowrap" align="right">Nomor HP:</td>
                          <td><input type="text" name="nomorhp" value="" size="20" /></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap="nowrap" align="right">Email:</td>
                          <td><input type="text" name="email" value="" size="20" /></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap="nowrap" align="right">Alamat:</td>
                          <td><input type="text" name="alamat" value="" size="20" /></td>
                        </tr>
                        <tr valign="baseline">
                          <td nowrap="nowrap" align="right">&nbsp;</td>
                          <td><input type="submit" value="Daftar" />
                          <input name="Reset" type="reset" value="Reset" /></td>
                        </tr>
                      </table>
                      <input type="hidden" name="MM_insert" value="form1" />
                    </form>
                    <p>&nbsp;</p>
                    <br />
                    <div id="left_bot"></div>
			      </div>
				  <h2 align="center">&nbsp;</h2>
			  </div>
			  <p>&nbsp;</p>
<div class="twoOfThree last headline">
					<h1>Selamat Datang di GO-L300</h1>
					<p>Membuat kemudahan dan kenyamanan dalam pemesanan tiket L300, &quot;NO NGANTRI, NO CALO, Ga Pake Ribet&quot;</p>
				</div>
			</div>
			<div class="separator"></div>
			<div class="wrap"></div>
  </div>
	</div>
	<div id="footer">
		<div class="container">
			<div class="wrap">
				<div class="footer_logo">
					<a href="#" title="Design Lovers">Design Lovers</a>
				</div>
				<ul id="footer_nav">
					<li class="current"><a href="index.php">Home</a></li>
				  <li><a href="jadwal1.php">JADWAL</a></li>
				  <li><a href="berita1.php">BERITA</a></li>
				  <li><a href="contact1.php">Contact</a></li>
			  </ul>
				<p id="copy">Designed by &copy;RPL-6 </p>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</body> 
</html>