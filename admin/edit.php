<?php require_once('../Connections/connkereta.php'); ?><?php
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

$maxRows_rskelas = 5;
$pageNum_rskelas = 0;
if (isset($_GET['pageNum_rskelas'])) {
  $pageNum_rskelas = $_GET['pageNum_rskelas'];
}
$startRow_rskelas = $pageNum_rskelas * $maxRows_rskelas;

mysql_select_db($database_connkereta, $connkereta);
$query_rskelas = "SELECT * FROM kelas";
$query_limit_rskelas = sprintf("%s LIMIT %d, %d", $query_rskelas, $startRow_rskelas, $maxRows_rskelas);
$rskelas = mysql_query($query_limit_rskelas, $connkereta) or die(mysql_error());
$row_rskelas = mysql_fetch_assoc($rskelas);

if (isset($_GET['totalRows_rskelas'])) {
  $totalRows_rskelas = $_GET['totalRows_rskelas'];
} else {
  $all_rskelas = mysql_query($query_rskelas);
  $totalRows_rskelas = mysql_num_rows($all_rskelas);
}
$totalPages_rskelas = ceil($totalRows_rskelas/$maxRows_rskelas)-1;

$maxRows_rska = 5;
$pageNum_rska = 0;
if (isset($_GET['pageNum_rska'])) {
  $pageNum_rska = $_GET['pageNum_rska'];
}
$startRow_rska = $pageNum_rska * $maxRows_rska;

mysql_select_db($database_connkereta, $connkereta);
$query_rska = "SELECT * FROM ka";
$query_limit_rska = sprintf("%s LIMIT %d, %d", $query_rska, $startRow_rska, $maxRows_rska);
$rska = mysql_query($query_limit_rska, $connkereta) or die(mysql_error());
$row_rska = mysql_fetch_assoc($rska);

if (isset($_GET['totalRows_rska'])) {
  $totalRows_rska = $_GET['totalRows_rska'];
} else {
  $all_rska = mysql_query($query_rska);
  $totalRows_rska = mysql_num_rows($all_rska);
}
$totalPages_rska = ceil($totalRows_rska/$maxRows_rska)-1;

mysql_select_db($database_connkereta, $connkereta);
$query_rspembayaran = "SELECT * FROM pembayaran";
$rspembayaran = mysql_query($query_rspembayaran, $connkereta) or die(mysql_error());
$row_rspembayaran = mysql_fetch_assoc($rspembayaran);
$totalRows_rspembayaran = mysql_num_rows($rspembayaran);

$maxRows_rsstasiun = 5;
$pageNum_rsstasiun = 0;
if (isset($_GET['pageNum_rsstasiun'])) {
  $pageNum_rsstasiun = $_GET['pageNum_rsstasiun'];
}
$startRow_rsstasiun = $pageNum_rsstasiun * $maxRows_rsstasiun;

mysql_select_db($database_connkereta, $connkereta);
$query_rsstasiun = "SELECT * FROM stasiun";
$query_limit_rsstasiun = sprintf("%s LIMIT %d, %d", $query_rsstasiun, $startRow_rsstasiun, $maxRows_rsstasiun);
$rsstasiun = mysql_query($query_limit_rsstasiun, $connkereta) or die(mysql_error());
$row_rsstasiun = mysql_fetch_assoc($rsstasiun);

if (isset($_GET['totalRows_rsstasiun'])) {
  $totalRows_rsstasiun = $_GET['totalRows_rsstasiun'];
} else {
  $all_rsstasiun = mysql_query($query_rsstasiun);
  $totalRows_rsstasiun = mysql_num_rows($all_rsstasiun);
}
$totalPages_rsstasiun = ceil($totalRows_rsstasiun/$maxRows_rsstasiun)-1;

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

mysql_select_db($database_connkereta, $connkereta);
$query_rsjumlah = "SELECT * FROM jumlah";
$rsjumlah = mysql_query($query_rsjumlah, $connkereta) or die(mysql_error());
$row_rsjumlah = mysql_fetch_assoc($rsjumlah);
$totalRows_rsjumlah = mysql_num_rows($rsjumlah);

$maxRows_rsreservasi = 5;
$pageNum_rsreservasi = 0;
if (isset($_GET['pageNum_rsreservasi'])) {
  $pageNum_rsreservasi = $_GET['pageNum_rsreservasi'];
}
$startRow_rsreservasi = $pageNum_rsreservasi * $maxRows_rsreservasi;

$alter_rsreservasi = "3";
if (isset($_GET["jadwalID"])) {
  $alter_rsreservasi = $_GET["jadwalID"];
}
mysql_select_db($database_connkereta, $connkereta);
$query_rsreservasi = sprintf("SELECT reservasi.reservasiID, reservasi.nama, reservasi.no_identitas, reservasi.identitasID, reservasi.no_telp, reservasi.email, reservasi.jadwalID, reservasi.KAID, reservasi.KAID, reservasi.stasiunID, reservasi.stasiunID1, reservasi.pembayaranID, reservasi.pemilik, reservasi.bankID, reservasi.rekening, reservasi.jumlahID, reservasi.tanggal_berangkat, jadwal.Harga, jadwal.Jam, ka.KANama, pembayaran.jenisPembayaran, stasiun.stasiunNama, stasiun1.stasiunNama1, identitas.jenisID, bank.bankNama, jumlah.jumlahNama FROM reservasi, jadwal, ka, pembayaran, stasiun, stasiun1, identitas, bank, jumlah WHERE (reservasi.identitasID=identitas.identitasID) AND (reservasi.jadwalID=jadwal.jadwalID) AND (reservasi.KAID=KA.KAID) AND (reservasi.stasiunID=stasiun.stasiunID) AND (reservasi.stasiunID1=stasiun1.stasiunID1) AND (reservasi.pembayaranID=pembayaran.pembayaranID) AND (reservasi.bankID=bank.bankID) AND (reservasi.jumlahID=jumlah.jumlahID) AND (reservasi.jadwalID=%s) ORDER BY reservasi.reservasiID ASC", GetSQLValueString($alter_rsreservasi, "int"));
$query_limit_rsreservasi = sprintf("%s LIMIT %d, %d", $query_rsreservasi, $startRow_rsreservasi, $maxRows_rsreservasi);
$rsreservasi = mysql_query($query_limit_rsreservasi, $connkereta) or die(mysql_error());
$row_rsreservasi = mysql_fetch_assoc($rsreservasi);

if (isset($_GET['totalRows_rsreservasi'])) {
  $totalRows_rsreservasi = $_GET['totalRows_rsreservasi'];
} else {
  $all_rsreservasi = mysql_query($query_rsreservasi);
  $totalRows_rsreservasi = mysql_num_rows($all_rsreservasi);
}
$totalPages_rsreservasi = ceil($totalRows_rsreservasi/$maxRows_rsreservasi)-1;

$maxRows_rsstasuin1 = 5;
$pageNum_rsstasuin1 = 0;
if (isset($_GET['pageNum_rsstasuin1'])) {
  $pageNum_rsstasuin1 = $_GET['pageNum_rsstasuin1'];
}
$startRow_rsstasuin1 = $pageNum_rsstasuin1 * $maxRows_rsstasuin1;

mysql_select_db($database_connkereta, $connkereta);
$query_rsstasuin1 = "SELECT * FROM stasiun1";
$query_limit_rsstasuin1 = sprintf("%s LIMIT %d, %d", $query_rsstasuin1, $startRow_rsstasuin1, $maxRows_rsstasuin1);
$rsstasuin1 = mysql_query($query_limit_rsstasuin1, $connkereta) or die(mysql_error());
$row_rsstasuin1 = mysql_fetch_assoc($rsstasuin1);

if (isset($_GET['totalRows_rsstasuin1'])) {
  $totalRows_rsstasuin1 = $_GET['totalRows_rsstasuin1'];
} else {
  $all_rsstasuin1 = mysql_query($query_rsstasuin1);
  $totalRows_rsstasuin1 = mysql_num_rows($all_rsstasuin1);
}
$totalPages_rsstasuin1 = ceil($totalRows_rsstasuin1/$maxRows_rsstasuin1)-1;

mysql_select_db($database_connkereta, $connkereta);
$query_rsidentitas = "SELECT * FROM identitas";
$rsidentitas = mysql_query($query_rsidentitas, $connkereta) or die(mysql_error());
$row_rsidentitas = mysql_fetch_assoc($rsidentitas);
$totalRows_rsidentitas = mysql_num_rows($rsidentitas);

mysql_select_db($database_connkereta, $connkereta);
$query_rsbank = "SELECT * FROM bank";
$rsbank = mysql_query($query_rsbank, $connkereta) or die(mysql_error());
$row_rsbank = mysql_fetch_assoc($rsbank);
$totalRows_rsbank = mysql_num_rows($rsbank);

$queryString_rska = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rska") == false && 
        stristr($param, "totalRows_rska") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rska = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rska = sprintf("&totalRows_rska=%d%s", $totalRows_rska, $queryString_rska);

$queryString_rsstasiun = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rsstasiun") == false && 
        stristr($param, "totalRows_rsstasiun") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rsstasiun = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rsstasiun = sprintf("&totalRows_rsstasiun=%d%s", $totalRows_rsstasiun, $queryString_rsstasiun);

$queryString_rsstasuin1 = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rsstasuin1") == false && 
        stristr($param, "totalRows_rsstasuin1") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rsstasuin1 = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rsstasuin1 = sprintf("&totalRows_rsstasuin1=%d%s", $totalRows_rsstasuin1, $queryString_rsstasuin1);

$queryString_rskelas = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rskelas") == false && 
        stristr($param, "totalRows_rskelas") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rskelas = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rskelas = sprintf("&totalRows_rskelas=%d%s", $totalRows_rskelas, $queryString_rskelas);

$queryString_rsreservasi = "";
if (!empty($_SERVER['QUERY_STRING'])) {
  $params = explode("&", $_SERVER['QUERY_STRING']);
  $newParams = array();
  foreach ($params as $param) {
    if (stristr($param, "pageNum_rsreservasi") == false && 
        stristr($param, "totalRows_rsreservasi") == false) {
      array_push($newParams, $param);
    }
  }
  if (count($newParams) != 0) {
    $queryString_rsreservasi = "&" . htmlentities(implode("&", $newParams));
  }
}
$queryString_rsreservasi = sprintf("&totalRows_rsreservasi=%d%s", $totalRows_rsreservasi, $queryString_rsreservasi);

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
<title>EDIT DATA</title>
<script>function confirmDelete() {  
        return confirm("Yakin Dihapus?")  
      }  </script>
<link rel="Shortcut Icon" href="../images/train.ico">
<link rel="stylesheet" href="../styles.css" type="text/css" />
<style type="text/css">
<!--
.style1 {color: #FF0000}
.style2 {
	color: #FF0000;
	font-size: 16px;
	font-weight: bold;
}
.style4 {font-size: 10}
.style6 {font-size: 12px}
.style7 {font-size: 10px}
-->
</style>
</head>

<body>
<div id="container">
	<div id="header">
    	<h1><a href="/"><img src="../images/footer-l.png" alt="" width="94" height="89" longdesc="images/200px-PT.KA.svg.png" /></a></h1>
      <h2>Welcome to GO-L300</h2>
        <div class="clear"></div>
    </div>
<div id="nav">
    	<ul>
        	<li><a href="admin.php">Home</a></li>
            <li><a href="edit_jadwal.php">Jadwal</a></li>
          <li><a href="edit.php">EDIT DATA</a></li>
          <li class="nav-search"></li>
    </ul>
  </div>
    <div id="page-intro">
    	<h2>Welcome to ticket GO-L300</h2>
        <p>Membuat kemudahan dan kenyamanan dalam pemesanan tiket L300, "NO COPET, NO NGANTRI, NO CALO"</p>
        <p>&nbsp;</p>
  </div>
    <div id="body">
		<div id="content">
			<h2><strong>EDIT &amp; DELETE DATA</strong></h2>
          <p><img src="../images/footer-l2.png" alt="" width="265" height="55" longdesc="images/footer-l2.png" /></p>
            <p align="left"><?php 
$nextWeek = time() + (7*24*60*60);//7days;24 hours;60 mins;60 secs
echo 'SEKARANG: '.date('d-m-Y')."\n";
echo 'MINGGU DEPAN:'.date('d-m-Y',$nextWeek)."\n";
?>
  </h10></p>
            <div align="left"></div>
          <p align="left" class="style2">EDIT DAFTAR CV L300</p>
          <p align="left" class="style1 searchform style4"><strong> Records <?php echo ($startRow_rska + 1) ?> to <?php echo min($startRow_rska + $maxRows_rska, $totalRows_rska) ?> of <?php echo $totalRows_rska ?> </strong></p>
          <?php do { ?>
          <table width="100%" border="0" cellspacing="0" cellpadding="3">
            <tr>
              <td><div align="center"><strong>CV ID</strong></div></td>
              <td><div align="center"><strong>Nama CV</strong></div></td>
              <td><div align="center"><strong>EDIT</strong></div></td>
              <td><div align="center"><strong>DELETE</strong></div></td>
            </tr>
            <tr>
              <td><div align="center"><?php echo $row_rska['KAID']; ?></div></td>
              <td><div align="center"><?php echo $row_rska['KANama']; ?></div></td>
              <td><div align="center"><a href="edit_kereta.php?KAID=<?php echo $row_rska['KAID']; ?>">EDIT</a></div></td>
              <td><div align="center"><a href="delete_kereta.php?KAID=<?php echo $row_rska['KAID']; ?>"onclick="return confirmDelete()">DELETE</a></div></td>
            </tr>
                          </table>
            <?php } while ($row_rska = mysql_fetch_assoc($rska)); ?>
            <table border="0">
              <tr>
                <td><div align="center" class="style4 style1">
                  <?php if ($pageNum_rska > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_rska=%d%s", $currentPage, 0, $queryString_rska); ?>">First</a>
                  <?php } // Show if not first page ?>
                </div></td>
                <td><div align="center" class="style4 style1">
                  <?php if ($pageNum_rska > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_rska=%d%s", $currentPage, max(0, $pageNum_rska - 1), $queryString_rska); ?>">Previous</a>
                  <?php } // Show if not first page ?>
                </div></td>
                <td><div align="center" class="style4 style1">
                  <?php if ($pageNum_rska < $totalPages_rska) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_rska=%d%s", $currentPage, min($totalPages_rska, $pageNum_rska + 1), $queryString_rska); ?>">Next</a>
                  <?php } // Show if not last page ?>
                </div></td>
                <td><div align="center" class="style4 style1">
                  <?php if ($pageNum_rska < $totalPages_rska) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_rska=%d%s", $currentPage, $totalPages_rska, $queryString_rska); ?>">Last</a>
                  <?php } // Show if not last page ?>
                </div></td>
              </tr>
            </table>
            </p>
<p align="left" class="style2">EDIT DAFTAR TERMINAL KEBERANGKATAN</p>
<p align="left" class="style2"><span class="s style6">&nbsp;Records <?php echo ($startRow_rsstasiun + 1) ?> to <?php echo min($startRow_rsstasiun + $maxRows_rsstasiun, $totalRows_rsstasiun) ?> of <?php echo $totalRows_rsstasiun ?></span> </p>
<?php do { ?>
            <table width="100%" border="0" cellspacing="0" cellpadding="3">
              <tr>
                <td><div align="center"><strong>TERMINAL ID</strong></div></td>
                <td><div align="center"><strong>KEBERANGKATAN</strong></div></td>
                <td><div align="center"><strong>EDIT</strong></div></td>
                <td><div align="center"><strong>DELETE</strong></div></td>
              </tr>
              <tr>
                <td><div align="center"><?php echo $row_rsstasiun['stasiunID']; ?></div></td>
                <td><div align="center"><?php echo $row_rsstasiun['stasiunNama']; ?></div></td>
                <td><div align="center"><a href="edit_stasiun.php?stasiunID=<?php echo $row_rsstasiun['stasiunID']; ?>">EDIT</a></div></td>
                <td><div align="center"><a href="delete_stasiun.php?stasiunID=<?php echo $row_rsstasiun['stasiunID']; ?>"onclick="return confirmDelete()">DELETE</a></div></td>
              </tr>
            </table>
            <?php } while ($row_rsstasiun = mysql_fetch_assoc($rsstasiun)); ?>
            <table border="0">
              <tr>
                <td><div align="center" class="style7 style4 style1">
                  <?php if ($pageNum_rsstasiun > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_rsstasiun=%d%s", $currentPage, 0, $queryString_rsstasiun); ?>">First</a>
                  <?php } // Show if not first page ?>
                </div></td>
                <td><div align="center" class="style7 style4 style1">
                  <?php if ($pageNum_rsstasiun > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_rsstasiun=%d%s", $currentPage, max(0, $pageNum_rsstasiun - 1), $queryString_rsstasiun); ?>">Previous</a>
                  <?php } // Show if not first page ?>
                </div></td>
                <td><div align="center" class="style7 style4 style1">
                  <?php if ($pageNum_rsstasiun < $totalPages_rsstasiun) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_rsstasiun=%d%s", $currentPage, min($totalPages_rsstasiun, $pageNum_rsstasiun + 1), $queryString_rsstasiun); ?>">Next</a>
                  <?php } // Show if not last page ?>
                </div></td>
                <td><div align="center" class="style7 style4 style1">
                  <?php if ($pageNum_rsstasiun < $totalPages_rsstasiun) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_rsstasiun=%d%s", $currentPage, $totalPages_rsstasiun, $queryString_rsstasiun); ?>">Last</a>
                  <?php } // Show if not last page ?>
                </div></td>
              </tr>
            </table>
            </p>
<p align="left" class="style2">EDIT DAFTAR TERMINAL TUJUAN</p>
<p align="left" class="style1 searchform"><strong>&nbsp;
  Records <?php echo ($startRow_rsstasuin1 + 1) ?> to <?php echo min($startRow_rsstasuin1 + $maxRows_rsstasuin1, $totalRows_rsstasuin1) ?> of <?php echo $totalRows_rsstasuin1 ?> </strong></p>
<?php do { ?>
          <table width="100%" border="0" cellspacing="0" cellpadding="3">
            <tr>
              <td><div align="center"><strong>TERMINAL ID</strong></div></td>
              <td><div align="center"><strong>Tujuan</strong></div></td>
              <td><div align="center"><strong>EDIT</strong></div></td>
              <td><div align="center"><strong>DELETE</strong></div></td>
            </tr>
            <tr>
              <td><div align="center"><?php echo $row_rsstasuin1['stasiunID1']; ?></div></td>
              <td><div align="center"><?php echo $row_rsstasuin1['stasiunNama1']; ?></div></td>
              <td><div align="center"><a href="edit_stasiun1.php?stasiunID1=<?php echo $row_rsstasuin1['stasiunID1']; ?>">EDIT</a></div></td>
              <td><div align="center"><a href="delete_stasiun1.php?stasiunID1=<?php echo $row_rsstasuin1['stasiunID1']; ?>"onclick="return confirmDelete()">DELETE</a></div></td>
            </tr>
                          </table>
            <?php } while ($row_rsstasuin1 = mysql_fetch_assoc($rsstasuin1)); ?>
            <table border="0">
              <tr>
                <td><div align="center" class="style7 style4 style1">
                  <?php if ($pageNum_rsstasuin1 > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_rsstasuin1=%d%s", $currentPage, 0, $queryString_rsstasuin1); ?>">First</a>
                  <?php } // Show if not first page ?>
                </div></td>
                <td><div align="center" class="style7 style4 style1">
                  <?php if ($pageNum_rsstasuin1 > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_rsstasuin1=%d%s", $currentPage, max(0, $pageNum_rsstasuin1 - 1), $queryString_rsstasuin1); ?>">Previous</a>
                  <?php } // Show if not first page ?>
                </div></td>
                <td><div align="center" class="style7 style4 style1">
                  <?php if ($pageNum_rsstasuin1 < $totalPages_rsstasuin1) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_rsstasuin1=%d%s", $currentPage, min($totalPages_rsstasuin1, $pageNum_rsstasuin1 + 1), $queryString_rsstasuin1); ?>">Next</a>
                  <?php } // Show if not last page ?>
                </div></td>
                <td><div align="center" class="style7 style4 style1">
                  <?php if ($pageNum_rsstasuin1 < $totalPages_rsstasuin1) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_rsstasuin1=%d%s", $currentPage, $totalPages_rsstasuin1, $queryString_rsstasuin1); ?>">Last</a>
                  <?php } // Show if not last page ?>
                </div></td>
              </tr>
            </table>
            </p>
<p align="left" class="style2">EDIT DAFTAR KELAS</p>
<p align="left" class="searchform">&nbsp;<span class="style1"><strong>
Records <?php echo ($startRow_rskelas + 1) ?> to <?php echo min($startRow_rskelas + $maxRows_rskelas, $totalRows_rskelas) ?> of <?php echo $totalRows_rskelas ?> </strong></span></p>
<?php do { ?>
          <table width="100%" border="0" cellspacing="0" cellpadding="3">
            <tr>
              <td width="27%"><div align="center"><strong>KELAS ID</strong></div></td>
              <td width="34%"><div align="center"><strong>NAMA KELAS</strong></div></td>
              <td width="16%"><div align="center"><strong>EDIT</strong></div></td>
              <td width="23%"><div align="center"><strong>DELETE</strong></div></td>
            </tr>
              
            <tr>
              <td width="27%"><div align="center"><?php echo $row_rskelas['kelasID']; ?></div></td>
              <td width="34%"><div align="center"><?php echo $row_rskelas['kelasNama']; ?></div></td>
              <td width="16%"><div align="center"><a href="edit_kelas.php?kelasID=<?php echo $row_rskelas['kelasID']; ?>">EDIT</a></div></td>
              <td width="23%"><div align="center"><a href="delete_kelas.php?kelasID=<?php echo $row_rskelas['kelasID']; ?>"onclick="return confirmDelete()">DELETE</a></div></td>
            </tr>
              </table>
            <?php } while ($row_rskelas = mysql_fetch_assoc($rskelas)); ?>
<table border="0">
              <tr>
                <td><div align="center" class="style7 style4 style1">
                  <?php if ($pageNum_rskelas > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_rskelas=%d%s", $currentPage, 0, $queryString_rskelas); ?>">First</a>
                  <?php } // Show if not first page ?>
                </div></td>
                <td><div align="center" class="style7 style4 style1">
                  <?php if ($pageNum_rskelas > 0) { // Show if not first page ?>
                  <a href="<?php printf("%s?pageNum_rskelas=%d%s", $currentPage, max(0, $pageNum_rskelas - 1), $queryString_rskelas); ?>">Previous</a>
                  <?php } // Show if not first page ?>
                </div></td>
                <td><div align="center" class="style7 style4 style1">
                  <?php if ($pageNum_rskelas < $totalPages_rskelas) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_rskelas=%d%s", $currentPage, min($totalPages_rskelas, $pageNum_rskelas + 1), $queryString_rskelas); ?>">Next</a>
                  <?php } // Show if not last page ?>
                </div></td>
                <td><div align="center" class="style7 style4 style1">
                  <?php if ($pageNum_rskelas < $totalPages_rskelas) { // Show if not last page ?>
                  <a href="<?php printf("%s?pageNum_rskelas=%d%s", $currentPage, $totalPages_rskelas, $queryString_rskelas); ?>">Last</a>
                  <?php } // Show if not last page ?>
                </div></td>
              </tr>
            </table>
            </p>
</p>
<p>&nbsp;</p>
          <p align="center" class="style1">&nbsp;</p>
	  </div>
        
      <div class="clear"></div>
    </div>
</div>
<div id="footer">
	<p>&copy; GO-L300 KELOMPOK 6 RPL</p>
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

mysql_free_result($rsjumlah);

mysql_free_result($rsreservasi);

mysql_free_result($rsstasuin1);

mysql_free_result($rsidentitas);

mysql_free_result($rsbank);
?>
