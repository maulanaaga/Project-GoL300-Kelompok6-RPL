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
		<div class="separator"></div>
		<div id="slider_container">
			<div class="wrap">
				<div id="coin-slider">
					<a href="#">
						<img src="images/f1.jpg" alt="" />
						<span>Welcome To Go-L300</span>
					</a>
					<a href="#">
						<img src="images/f2.jpg" alt="" />
						<span><strong>Kami siap melayani Anda</strong> Cepat, Tepat, Aman , dan terjangkau </span>
					</a>
					<a href="#">
						<img src="images/f3.jpg" alt="" />
						<span><strong>Interior yang Nyaman</strong> kami manjakan anda dengan segala fasilitas yang membuat anda nyaman </span>
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
                    <h3>User Login</h3>
				    <form action="<?php echo $loginFormAction; ?>" method="POST" name="form1" id="form1">
                      <fieldset>
                      <label for="text1">Username</label>
                      USERNAME
                      <br />
                        <input id="text1" type="text" name="text1" value="" />
                        <br />
                      <label for="text2">Password</label>
                        PASSWORD<br />
                      <input id="text2" type="password" name="text2" value="" />
                        <br />
                        <input type="submit" id="login-submit" onclick="MM_popupMsg('SELAMAT DATANG')" value="Login" />
                      <input name="Reset" type="reset" id="login-submit2" value="Reset" />
                      </fieldset>
			        </form>
				    <br />
                    <div id="left_bot"></div>
			      </div>
			<!--	  <h2 align="left">Tes</h2>
				  <?php do { ?><marquee behavior="scroll" direction="up" scrollamount="2">
			      <table width="100%" border="0" cellspacing="0" cellpadding="3">
                    <tr>
                      <td bgcolor="#000000"><span class="style1"><?php echo $row_rstesti['username']; ?></span></td>
                    </tr>
                    <tr>
                      <td height="34" bgcolor="#000000"><span class="style3"><?php echo $row_rstesti['pesan']; ?></span></td>
                    </tr> -->
                                          </table></marquee>
				    <?php } while ($row_rstesti = mysql_fetch_assoc($rstesti)); ?>
			  </div>
			  <p>&nbsp;</p>
<div class="twoOfThree last headline">

  <h1>Selamat Datang di Go-L300</h1>
  <p>Membuat kemudahan dan kenyamanan dalam pemesanan tiket L300, &quot;NO NGANTRI, NO CALO, GA PAKE RIBET&quot;</p>
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
				<p id="copy">INF14 &copy;RPL-6 </p>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</body> 
</html>