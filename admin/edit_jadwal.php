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

mysql_select_db($database_connkereta, $connkereta);
$query_rsstasuin1 = "SELECT * FROM stasiun1";
$rsstasuin1 = mysql_query($query_rsstasuin1, $connkereta) or die(mysql_error());
$row_rsstasuin1 = mysql_fetch_assoc($rsstasuin1);
$totalRows_rsstasuin1 = mysql_num_rows($rsstasuin1);

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
<title>EDIT DELETE JADWAl</title>
<script>function confirmDelete() {  
        return confirm("Ingin Hapus data ini?")  
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
.style3 {color: #000000}
.style4 {color: #FF0000; font-weight: bold; }
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
    	<h2>Welcome to ticket GO-L300 </h2>
        <p>Membuat kemudahan dan kenyamanan dalam pemesanan tiket L300, "NO REPOT, NO NGANTRI, NO CALO"</p>
        <p>&nbsp;</p>
  </div>
    <div id="body">
		<div id="content">
			<h2><strong>EDIT &amp; DELETE DATA</strong></h2>
          <p><img src="../images/footer-l2.png" alt="" width="265" height="55" longdesc="images/footer-l2.png" /></p>
            <p><?php 
$nextWeek = time() + (7*24*60*60);//7days;24 hours;60 mins;60 secs
echo 'SEKARANG: '.date('d-m-Y')."\n";
echo 'MINGGU DEPAN:'.date('d-m-Y',$nextWeek)."\n";
?>
  </h10></p>
            <p class="style1">Records <?php echo ($startRow_rsjadwal + 1) ?> to <?php echo min($startRow_rsjadwal + $maxRows_rsjadwal, $totalRows_rsjadwal) ?> of <?php echo $totalRows_rsjadwal ?> </p>
            <form id="form1" method="post" action="">
              <?php do { ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="3">
                <tr>
                  <td><div align="center"><strong>JADWAL ID</strong></div></td>
                  <td><div align="center"><strong>CV</strong></div></td>
                  <td><div align="center"><strong>DARI</strong></div></td>
                  <td><div align="center"><strong>TUJUAN</strong></div></td>
                  <td><div align="center"><strong>KELAS</strong></div></td>
                  <td><div align="center"><strong>HARGA</strong></div></td>
                  <td><div align="center"><strong>JAM</strong></div></td>
                  <td><div align="center"><strong><a href="jadwal_edit.php?jadwalID=<?php echo $row_rsjadwal['jadwalID']; ?>">EDIT</a></strong></div></td>
                  <td><div align="center"><strong><a href="delete_jadwal.php?jadwalID=<?php echo $row_rsjadwal['jadwalID']; ?>"onclick="return confirmDelete()">DELETE</a></strong></div></td>
                </tr>
                <tr>
                  <td><div align="center"><?php echo $row_rsjadwal['jadwalID']; ?></div></td>
                  <td><div align="center"><?php echo $row_rsjadwal['KANama']; ?></div></td>
                  <td><div align="center"><?php echo $row_rsjadwal['stasiunNama']; ?></div></td>
                  <td><div align="center"><?php echo $row_rsjadwal['stasiunNama1']; ?></div></td>
                  <td><div align="center"><?php echo $row_rsjadwal['kelasNama']; ?></div></td>
                  <td><div align="center"><?php echo $row_rsjadwal['Harga']; ?></div></td>
                  <td><div align="center"><?php echo $row_rsjadwal['Jam']; ?></div></td>
                </tr>
              </table>
              <?php } while ($row_rsjadwal = mysql_fetch_assoc($rsjadwal)); ?>
            </form>
          <p align="center" class="style2">&nbsp;</p>
          <div align="center">&nbsp;</div>
          <table border="0" class="style1">
  <tr>
    <td><div align="center" class="style3">
      <?php if ($pageNum_rsjadwal > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_rsjadwal=%d%s", $currentPage, 0, $queryString_rsjadwal); ?>">First</a>
        <?php } // Show if not first page ?>
    </div></td>
    <td><div align="center" class="style3">
      <?php if ($pageNum_rsjadwal > 0) { // Show if not first page ?>
        <a href="<?php printf("%s?pageNum_rsjadwal=%d%s", $currentPage, max(0, $pageNum_rsjadwal - 1), $queryString_rsjadwal); ?>">Previous</a>
        <?php } // Show if not first page ?>
    </div></td>
    <td><div align="center" class="style3">
      <?php if ($pageNum_rsjadwal < $totalPages_rsjadwal) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_rsjadwal=%d%s", $currentPage, min($totalPages_rsjadwal, $pageNum_rsjadwal + 1), $queryString_rsjadwal); ?>">Next</a>
        <?php } // Show if not last page ?>
    </div></td>
    <td><div align="center" class="style3">
      <?php if ($pageNum_rsjadwal < $totalPages_rsjadwal) { // Show if not last page ?>
        <a href="<?php printf("%s?pageNum_rsjadwal=%d%s", $currentPage, $totalPages_rsjadwal, $queryString_rsjadwal); ?>">Last</a>
        <?php } // Show if not last page ?>
    </div></td>
  </tr>
</table>
</p>
<p align="left" class="style1">&nbsp;</p>
<p align="left" class="style1"><a href="tambah_jadwal.php"><strong>TAMBAH JADWAL</strong></a></p>
<p align="left" class="style1"><a href="tambah_kereta.php"><strong>TAMBAH CV L300</strong></a></p>
<p align="left" class="style1"><a href="tambah_stasiun.php"><strong>TAMBAH TERMINAL</strong></a></p>
<p align="left" class="style4"><a href="tambah_kelas.php">TAMBAH KELAS</a></p>
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
