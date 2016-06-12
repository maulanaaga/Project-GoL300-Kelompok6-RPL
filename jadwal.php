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

$currentPage = $_SERVER["PHP_SELF"];

mysql_select_db($database_connkereta, $connkereta);
$query_rskelas = "SELECT * FROM kelas";
$rskelas = mysql_query($query_rskelas, $connkereta) or die(mysql_error());
$row_rskelas = mysql_fetch_assoc($rskelas);
$totalRows_rskelas = mysql_num_rows($rskelas);

mysql_select_db($database_connkereta, $connkereta);
$query_rska = "SELECT * FROM ka";
$rska = mysql_query($query_rska, $connkereta) or die(mysql_error());
$row_rska = mysql_fetch_assoc($rska);
$totalRows_rska = mysql_num_rows($rska);

mysql_select_db($database_connkereta, $connkereta);
$query_rspembayaran = "SELECT * FROM pembayaran";
$rspembayaran = mysql_query($query_rspembayaran, $connkereta) or die(mysql_error());
$row_rspembayaran = mysql_fetch_assoc($rspembayaran);
$totalRows_rspembayaran = mysql_num_rows($rspembayaran);

mysql_select_db($database_connkereta, $connkereta);
$query_rsstasiun = "SELECT * FROM stasiun";
$rsstasiun = mysql_query($query_rsstasiun, $connkereta) or die(mysql_error());
$row_rsstasiun = mysql_fetch_assoc($rsstasiun);
$totalRows_rsstasiun = mysql_num_rows($rsstasiun);

mysql_select_db($database_connkereta, $connkereta);
$query_rstrayek = "SELECT * FROM trayek";
$rstrayek = mysql_query($query_rstrayek, $connkereta) or die(mysql_error());
$row_rstrayek = mysql_fetch_assoc($rstrayek);
$totalRows_rstrayek = mysql_num_rows($rstrayek);

$maxRows_rsjadwal = 5;
$pageNum_rsjadwal = 0;
if (isset($_GET['pageNum_rsjadwal'])) {
  $pageNum_rsjadwal = $_GET['pageNum_rsjadwal'];
}
$startRow_rsjadwal = $pageNum_rsjadwal * $maxRows_rsjadwal;

mysql_select_db($database_connkereta, $connkereta);
$query_rsjadwal = "SELECT jadwal.jadwalID, jadwal.KAID, jadwal.stasiunID, jadwal.StasiunID1, jadwal.kelasID, jadwal.Harga, jadwal.Jam, ka.KANama, kelas.kelasNama, stasiun.stasiunNama, stasiun1.stasiunNama1 FROM jadwal, ka, kelas, stasiun, stasiun1 WHERE (jadwal.KAID=KA.KAID) AND (jadwal.stasiunID=stasiun.stasiunID) AND (jadwal.stasiunID1=stasiun1.stasiunID1) AND (jadwal.kelasID=kelas.kelasID) ORDER BY jadwal.jadwalID ASC";
$query_limit_rsjadwal = sprintf("%s LIMIT %d, %d", $query_rsjadwal, $startRow_rsjadwal, $maxRows_rsjadwal);
$rsjadwal = mysql_query($query_limit_rsjadwal, $connkereta) or die(mysql_error());
$row_rsjadwal = mysql_fetch_assoc($rsjadwal);

if (isset($_GET['totalRows_rsjadwal'])) {
  $totalRows_rsjadwal = $_GET['totalRows_rsjadwal'];
} else {
  $all_rsjadwal = mysql_query($query_rsjadwal);
  $totalRows_rsjadwal = mysql_num_rows($all_rsjadwal);
}
$totalPages_rsjadwal = ceil($totalRows_rsjadwal/$maxRows_rsjadwal)-1;

$queryString_rsjadwal = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rsjadwal") == false && 
        stristr($param, "totalRows_rsjadwal") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rsjadwal = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rsjadwal = sprintf("&totalRows_rsjadwal=%d%s", $totalRows_rsjadwal, $queryString_rsjadwal);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Jadwal</title>
<link rel="Shortcut Icon" href="images/train.ico">
<link rel="stylesheet" href="styles.css" type="text/css" />
<style type="text/css">
<!--
.style1 {color: #FF0000}
.style2 {color: #FF0000; font-weight: bold; }
-->
</style>
</head>

<body>
<div id="container">
	<div id="header">
    	<h1><a href="/"><img src="Go1.png" alt="" width="200" height="55" longdesc="images/200px-PT.KA.svg.png" /></a></h1>
      <h2>Welcome to GO-L300<h2>
        <div class="clear"></div>
    </div>
<div id="nav">
    	<ul>
        	<li><a href="user.php">Home</a></li>
            <li><a href="jadwal.php">Jadwal</a></li>
          <li><a href="berita.php">Berita</a></li>
            <li><a href="arsip.php">Arsip</a></li>
            <li><a href="contact.php">Contact</a></li>
      <li class="nav-search"></li>
    </ul>
    </div>
    <div id="page-intro">
    	<h2>Welcome to ticket On-Line GO-L300</h2>
        <p>Membuat kemudahan dan kenyamanan dalam pemesanan tiket kereta api, "NO NGANTRI, NO CALO, GA PAKE RIBET"



</p>
    </div>
    <div id="body">
		<div id="content">
			<h2><strong>Jadwal Perjalanan L300</strong></h2>
            <p><img src="Go2.png" alt="" width="265" height="55" longdesc="images/footer-l2.png" /></p>
            <p><?php 
$nextWeek = time() + (7*24*60*60);//7days;24 hours;60 mins;60 secs
echo 'SEKARANG: '.date('d-m-Y')."\n";
echo 'MINGGU DEPAN:'.date('Y-m-d',$nextWeek)."\n";
?>
  </h10></p>
          <p class="style1">Klik Jadwal ID untuk memesan tiket!!</p>
            <p class="style1">Records <?php echo ($startRow_rsjadwal + 1) ?> to <?php echo min($startRow_rsjadwal + $maxRows_rsjadwal, $totalRows_rsjadwal) ?> of <?php echo $totalRows_rsjadwal ?></p>
            </p>
<form id="form1" method="post" action="">
              <?php do { ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="3">
                <tr>
                  <td width="17%"><div align="center"><strong>JADWAL ID</strong></div></td>
                  <td width="20%"><div align="center"><strong>L300</strong></div></td>
                  <td width="22%"><div align="center"><strong>DARI</strong></div></td>
                  <td width="11%"><div align="center"><strong>TUJUAN</strong></div></td>
                  <td width="10%"><div align="center"><strong>KELAS</strong></div></td>
                  <td width="10%"><div align="center"><strong>HARGA</strong></div></td>
                  <td width="10%"><div align="center"><strong>JAM</strong></div></td>
                </tr>
                <tr>
                  <td><div align="center"><a href="pesan.php?jadwalID=<?php echo $row_rsjadwal['jadwalID']; ?>"><?php echo $row_rsjadwal['jadwalID']; ?></a></div></td>
                  <td><div align="center" class="style2"><?php echo $row_rsjadwal['KANama']; ?></div></td>
                  <td><div align="center"><?php echo $row_rsjadwal['stasiunNama']; ?></div></td>
                  <td><div align="center"><?php echo $row_rsjadwal['stasiunNama1']; ?></div></td>
                  <td><div align="center"><?php echo $row_rsjadwal['kelasNama']; ?></div></td>
                  <td><div align="center"><?php echo $row_rsjadwal['Harga']; ?></div></td>
                  <td><div align="center"><?php echo $row_rsjadwal['Jam']; ?></div></td>
                </tr>
                                  </table>
              <?php } while ($row_rsjadwal = mysql_fetch_assoc($rsjadwal)); ?></form>
            <p>&nbsp;</p>
            <table border="0">
              <tr>
                <td><div align="center">
                    <?php if ($pageNum_rsjadwal > 0) { // Show if not first page ?>
                    <a href="<?php printf("%s?pageNum_rsjadwal=%d%s", $currentPage, 0, $queryString_rsjadwal); ?>">First</a>
                    <?php } // Show if not first page ?>
                </div></td>
                <td><div align="center">
                    <?php if ($pageNum_rsjadwal > 0) { // Show if not first page ?>
                    <a href="<?php printf("%s?pageNum_rsjadwal=%d%s", $currentPage, max(0, $pageNum_rsjadwal - 1), $queryString_rsjadwal); ?>">Previous</a>
                    <?php } // Show if not first page ?>
                </div></td>
                <td><div align="center">
                    <?php if ($pageNum_rsjadwal < $totalPages_rsjadwal) { // Show if not last page ?>
                    <a href="<?php printf("%s?pageNum_rsjadwal=%d%s", $currentPage, min($totalPages_rsjadwal, $pageNum_rsjadwal + 1), $queryString_rsjadwal); ?>">Next</a>
                    <?php } // Show if not last page ?>
                </div></td>
                <td><div align="center">
                    <?php if ($pageNum_rsjadwal < $totalPages_rsjadwal) { // Show if not last page ?>
                    <a href="<?php printf("%s?pageNum_rsjadwal=%d%s", $currentPage, $totalPages_rsjadwal, $queryString_rsjadwal); ?>">Last</a>
                    <?php } // Show if not last page ?>
                </div></td>
              </tr>
            </table>
            <p>&nbsp;</p>
	  </div>
        
        <p>&nbsp;</p>
<div class="sidebar">
            <ul>	
               <li>
                    <h4><span>Navigate</span></h4>
                    <ul class="blocklist">
                        <li><a href="user.php">Home</a></li>
                        <li><a href="jadwal.php">Jadwal</a></li>
                        <li><a href="berita.php">Berita</a></li>
                        <li><a href="arsip.php">Arsip</a></li>
                      <li><a href="contact.php">Contact</a></li>
                    </ul>
                </li>
                
                <li>
                    <h4>About</h4>
                    <ul>
                        <li>
                        	<p style="margin: 0;"><strong>Programmer and Designer:</strong></p>
                        </li>
                        <li>INF14 RPL-6</li>
                       <!-- <li><strong>Tester and Analyser:</strong></li>
                        <li>Abdul Gani</li>
                      <li><strong>Documentation:</strong></li>
                        <li>Bactiar Pradesta</li> -->
                    </ul>
              </li>
            </ul> 
        </div>
    	<div class="clear"></div>
    </div>
</div>
<div id="footer">
	<p>&copy; Go-L300 Kelompok 6 RPL</p>
</div>
</body>
</html>
<?php
mysql_free_result($rskelas);

mysql_free_result($rska);

mysql_free_result($rspembayaran);

mysql_free_result($rsstasiun);

mysql_free_result($rstrayek);

mysql_free_result($rsjadwal);
?>
