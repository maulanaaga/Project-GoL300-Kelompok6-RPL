<?php require_once('Connections/connkereta.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO testi (username, pesan) VALUES (%s, %s)",
                       GetSQLValueString($_POST['username'], "text"),
                       GetSQLValueString($_POST['pesan'], "text"));

  mysql_select_db($database_connkereta, $connkereta);
  $Result1 = mysql_query($insertSQL, $connkereta) or die(mysql_error());

  $insertGoTo = "testi_success.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
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

$colname_rstesti = "-1";
if (isset($_GET['testiID'])) {
  $colname_rstesti = $_GET['testiID'];
}
mysql_select_db($database_connkereta, $connkereta);
$query_rstesti = sprintf("SELECT * FROM testi WHERE testiID = %s ORDER BY testiID DESC", GetSQLValueString($colname_rstesti, "int"));
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
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Selamat datang Anggota</title><script>  
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
.style1 {
	color: #FF0000;
	font-weight: bold;
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
				  <li><a href="jadwal.php">JADWAL</a></li>
		    <li><a href="berita.php">BERITA</a></li>
        <li><a href="arsip.php">ARSIP</a></li>
			<li><a href="contact.php">Contact</a></li>
			  </ul>
			</div>
		</div>
		<div class="separator"></div>
		<div class="wrap">
				<div class="main intro">Membuat kemudahan dan kenyamanan dalam pemesanan tiket L300, &quot;NO NGANTRI, NO CALO, GA PAKE RIBET&quot;</div>
				
  <div class="sidebar" id="search_box">
    <div align="center"><?php 
$nextWeek = time() + (7*24*60*60);//7days;24 hours;60 mins;60 secs
echo 'SEKARANG: '.date('Y-m-d')."\n";
echo 'MINGGU DEPAN:'.date('Y-m-d',$nextWeek)."\n";
?>
  </h10>
          <input type="submit" value="" id="search_btn" class="submit" />
                                      </div>
  </div>
	  </div>
			<div class="separator"></div>
			<div class="wrap">
			<div id="main" class="main">
				<div class="headline">
					<h1>Selamat Datang Anggota</h1>
					<p>Dengan menjadi anggota, nikmati segala kemudahan yang ada di situs GO-L300.</p>
				</div>
				<div class="post">
				  <h2 align="center"><a href="<?php echo $logoutAction ?>"><img src="images/119709197585381818TzeenieWheenie_Power_On_Off_Switch_red_2.svg.med.png" width="55" height="54" longdesc="images/119709197585381818TzeenieWheenie_Power_On_Off_Switch_red_2.svg.med.png" onclick="return confirmLogout()" /></a></h2>
<blockquote> 
                        <p align="center">Pesan tiket sekarang</p>
            <p align="center"><a href="jadwal.php"><img src="images/1194986423899936796telefono_email_frolland_01.svg.med.png" width="116" height="103" longdesc="images/phone.png" /></a></p>
				  </blockquote> 

                    <p>&nbsp;</p>
                    
              </div>
			</div>
<div id="sidebar" class="sidebar">
				<h2>Layanan Kami</h2>
				<ul class="arrow_list">
					<li><a href="jadwal.php">Pesan Tiket</a></li>
				  <li><a href="search.php">Tracking Tiket</a></li>
				  <li><a href="promo.php">Promo</a></li>
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
                      <td><input type="submit" value="Kirim" />
                      <input name="Reset" type="reset" value="Reset" /></td>
                    </tr>
                  </table>
                  <input type="hidden" name="MM_insert" value="form1" />
                </form>
                <p>&nbsp;</p>
</div>
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
			<li><a href="contact.php">Contact</a></li>
			  </ul>
				<p id="copy">INF14 &copy;RPL-6</p>
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
