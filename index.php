<?php require_once('Connections/connkereta.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_connkereta, $connkereta);
$query_rsusers = "SELECT * FROM users";
$rsusers = mysql_query($query_rsusers, $connkereta) or die(mysql_error());
$row_rsusers = mysql_fetch_assoc($rsusers);
$totalRows_rsusers = mysql_num_rows($rsusers);

$maxRows_rstesti = 3;
$pageNum_rstesti = 0;
if (isset($_GET['pageNum_rstesti'])) {
  $pageNum_rstesti = $_GET['pageNum_rstesti'];
}
$startRow_rstesti = $pageNum_rstesti * $maxRows_rstesti;

mysql_select_db($database_connkereta, $connkereta);
$query_rstesti = "SELECT * FROM testi ORDER BY testiID DESC";
$query_limit_rstesti = sprintf("%s LIMIT %d, %d", $query_rstesti, $startRow_rstesti, $maxRows_rstesti);
$rstesti = mysql_query($query_limit_rstesti, $connkereta) or die(mysql_error());
$row_rstesti = mysql_fetch_assoc($rstesti);

if (isset($_GET['totalRows_rstesti'])) {
  $totalRows_rstesti = $_GET['totalRows_rstesti'];
} else {
  $all_rstesti = mysql_query($query_rstesti);
  $totalRows_rstesti = mysql_num_rows($all_rstesti);
}
$totalPages_rstesti = ceil($totalRows_rstesti/$maxRows_rstesti)-1;
?><?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['text1'])) {
  $loginUsername=$_POST['text1'];
  $password=$_POST['text2'];
  $MM_fldUserAuthorization = "accessLevel";
  $MM_redirectLoginSuccess = "user.php";
  $MM_redirectLoginFailed = "fail.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_connkereta, $connkereta);
  	
  $LoginRS__query=sprintf("SELECT username, password, accessLevel FROM users WHERE username=%s AND password=%s",
  GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $connkereta) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
    
    $loginStrGroup  = mysql_result($LoginRS,0,'accessLevel');
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
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
<?php
mysql_free_result($rsusers);

mysql_free_result($rstesti);
?>