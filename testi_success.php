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

$maxRows_rsusers = 2;
$pageNum_rsusers = 0;
if (isset($_GET['pageNum_rsusers'])) {
  $pageNum_rsusers = $_GET['pageNum_rsusers'];
}
$startRow_rsusers = $pageNum_rsusers * $maxRows_rsusers;

mysql_select_db($database_connkereta, $connkereta);
$query_rsusers = "SELECT * FROM users";
$query_limit_rsusers = sprintf("%s LIMIT %d, %d", $query_rsusers, $startRow_rsusers, $maxRows_rsusers);
$rsusers = mysql_query($query_limit_rsusers, $connkereta) or die(mysql_error());
$row_rsusers = mysql_fetch_assoc($rsusers);

if (isset($_GET['totalRows_rsusers'])) {
  $totalRows_rsusers = $_GET['totalRows_rsusers'];
} else {
  $all_rsusers = mysql_query($query_rsusers);
  $totalRows_rsusers = mysql_num_rows($all_rsusers);
}
$totalPages_rsusers = ceil($totalRows_rsusers/$maxRows_rsusers)-1;

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
?>
<!DOCTYPE html PUBLIC>
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
					<li><a href="contact.php">Contact</a></li>
			  </ul>
				<p id="copy">Designed by &copy;RPL-6</p>
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