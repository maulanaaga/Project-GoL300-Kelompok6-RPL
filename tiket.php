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

mysql_select_db($database_connkereta, $connkereta);
$query_rsreservasi = "SELECT reservasi.reservasiID, reservasi.nama, reservasi.no_identitas, reservasi.identitasID, reservasi.no_telp, reservasi.email, reservasi.jadwalID, reservasi.KAID, reservasi.stasiunID, reservasi.stasiunID1, reservasi.pembayaranID, reservasi.pemilik, reservasi.bankID, reservasi.rekening, reservasi.jumlahID, reservasi.tanggal_berangkat, jadwal.Harga, jadwal.Jam, ka.KANama, pembayaran.jenisPembayaran, stasiun.stasiunNama, stasiun1.stasiunNama1, identitas.jenisID, bank.bankNama, jumlah.jumlahNama, reservasi.rekening, reservasi.pemilik, reservasi.tanggal_berangkat FROM reservasi, jadwal, ka, pembayaran, stasiun, stasiun1, identitas, bank, jumlah WHERE (reservasi.identitasID=identitas.identitasID) AND (reservasi.jadwalID=jadwal.jadwalID) AND (reservasi.KAID=KA.KAID) AND (reservasi.stasiunID=stasiun.stasiunID) AND (reservasi.stasiunID1=stasiun1.stasiunID1) AND (reservasi.pembayaranID=pembayaran.pembayaranID) AND (reservasi.bankID=bank.bankID) AND (reservasi.jumlahID=jumlah.jumlahID) ORDER BY reservasi.reservasiID DESC";
$rsreservasi = mysql_query($query_rsreservasi, $connkereta) or die(mysql_error());
$row_rsreservasi = mysql_fetch_assoc($rsreservasi);
$totalRows_rsreservasi = mysql_num_rows($rsreservasi);

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
<title>Tiket On - Line GO-L300</title>
<script language="javascript">
function cetak(reservasiID){
window.open("cetak.php?reservasiID="+reservasiID,"cetak","width=500,heigth=500,scrollbars=1")
}
</script>
<link rel="Shortcut Icon" href="images/train.ico">
<link rel="stylesheet" href="styles.css" type="text/css" />
<style type="text/css">
<!--
.style1 {color: #FF0000}
.style3 {color: #FF0000; font-weight: bold; }
.style4 {
  color: #33FF00;
  font-weight: bold;
  font-size: 18px;
}
-->
</style>
</head>

<body>
<div id="container">
  <div id="header">
      <h1><a href="/"><img src="Go1.png" alt="" width="94" height="89" longdesc="images/200px-PT.KA.svg.png" /></a></h1>
      <h2>Welcome to ticket GO-L300/h2>
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
      <h2>Welcome to ticket GO-L300</h2>
        <p>Membuat kemudahan dan kenyamanan dalam pemesanan tiket L300, "NO REPOT, NO NGANTRI, NO CALO"



</p>
    </div>
    <div id="body">
    <div id="content">
      <h2><strong>FORM TIKET</strong></h2>
          <p><img src="Go2.png" alt="" width="265" height="55" longdesc="images/footer-l2.png" /></p>
            <p class="style1">Selamat FORM tiket anda telah sukses.!!</p>
            <table width="100%" border="0" cellspacing="0" cellpadding="3">
              <tr>
                <td><span class="style1"><strong>Reservasi ID</strong></span></td>
                <td><?php echo $row_rsreservasi['reservasiID']; ?></td>
              </tr>
              <tr>
                <td><span class="style1"><strong>Nama</strong></span></td>
                <td><?php echo $row_rsreservasi['nama']; ?></td>
              </tr>
              <tr>
                <td><span class="style1"><strong>No. Identitas</strong></span></td>
                <td><?php echo $row_rsreservasi['no_identitas']; ?></td>
              </tr>
              <tr>
                <td><span class="style1"><strong>Jenis ID</strong></span></td>
                <td><?php echo $row_rsreservasi['jenisID']; ?></td>
              </tr>
              <tr>
                <td><span class="style1"><strong>No. Telp</strong></span></td>
                <td><?php echo $row_rsreservasi['no_telp']; ?></td>
              </tr>
              <tr>
                <td><span class="style1"><strong>e-mail</strong></span></td>
                <td><?php echo $row_rsreservasi['email']; ?></td>
              </tr>
              <tr>
                <td><span class="style1"><strong>Jadwal ID</strong></span></td>
                <td><?php echo $row_rsreservasi['jadwalID']; ?></td>
              </tr>
              <tr>
                <td><span class="style1"><strong>Nama KA</strong></span></td>
                <td><?php echo $row_rsreservasi['KANama']; ?></td>
              </tr>
              <tr>
                <td><span class="style1"><strong>Dari</strong></span></td>
                <td><?php echo $row_rsreservasi['stasiunNama']; ?></td>
              </tr>
              <tr>
                <td><span class="style1"><strong>Tujuan</strong></span></td>
                <td><?php echo $row_rsreservasi['stasiunNama1']; ?></td>
              </tr>
              <tr>
                <td><span class="style1"><strong>Jam</strong></span></td>
                <td><?php echo $row_rsreservasi['Jam']; ?></td>
              </tr>
              <tr>
                <td><span class="style1"></span></td>
                <td><span class="style3">Informasi Pembayaran</span></td>
              </tr>
              <tr>
                <td><span class="style1"><strong>Jumlah Tiket</strong></span></td>
                <td><?php echo $row_rsreservasi['jumlahNama']; ?></td>
              </tr>
              <tr>
                <td><span class="style1"><strong>Jenis Pembayaran</strong></span></td>
                <td><?php echo $row_rsreservasi['jenisPembayaran']; ?></td>
              </tr>
              <tr>
                <td><span class="style1"><strong>Bank</strong></span></td>
                <td><?php echo $row_rsreservasi['bankNama']; ?></td>
              </tr>
              <tr>
                <td><span class="style1"><strong>No. Rekening</strong></span></td>
                <td><?php echo $row_rsreservasi['rekening']; ?></td>
              </tr>
              <tr>
                <td><span class="style1"><strong>Pemilik Rekening</strong></span></td>
                <td><?php echo $row_rsreservasi['pemilik']; ?></td>
              </tr>
              <tr>
                <td><span class="style1"><strong>Harga</strong></span></td>
                <td>Rp.<?php echo $row_rsreservasi['Harga']; ?> X <?php echo $row_rsreservasi['jumlahNama']; ?></td>
              </tr>
              <tr>
                <td><span class="style1"><strong>Total Yang Harus dibayar</strong></span></td>
                <td>Rp.<?php echo $row_rsreservasi['jumlahNama'] * $row_rsreservasi['Harga']; ?></td>
              </tr>
            </table>
            <p class="style1">NB: </p>
            <p class="style1">Silahkan lakukan pembayaran, lalu bawa bukti pembayaran dan form di stasiun keberangkatan, untuk mendapatkan no.tempat duduk.</p>
            <input type="button" name="btn_cetak" onClick="cetak(<?php echo $param;?>)" value="Cetak"></p>
    </div>
        
        <div class="sidebar">
          <ul>
            <li>
              <h4 align="center"><span>KETERANGAN BANK</span></h4>
              <ul class="blocklist">
                <li><a href="file:///D|/kuliah/php/Html Template/fascin/fascin/index.html"><strong>Rek BCA A.N GO-L300</strong></a></li>
                <li><a href="file:///D|/kuliah/php/Html Template/fascin/fascin/examples.html">No. Rekening: 1234567890</a></li>
                <li><a href="#"><strong>Rek BNI A.N GO-L300</strong></a></li>
                <li><a href="#">No. Rekening: 1234567890</a>
                    <li>
                    <li><a href="#"><strong>Rek Mandiri A.N GO-L300</strong></a>
                    <li><li><a href="#">No. Rekening: 1234567890</a>
                    <li>
                    <li><a href="#"><strong>Rek Muammalat A.N GO-L300</strong></a>
                    <li><li><a href="#">No. Rekening: 1234567890</a>
                    <li>
                    <li><a href="#"><strong>Rek Bukopin A.N GO-L300</strong></a>
                    <li><li><a href="#">No. Rekening: 1234567890</a>
                    <li></li>
                  </ul>
                </li>
                <li>
                  <ul>
                      <li class="style1">
                        <div align="center"><strong>REKENING ONLINE</strong></div>
                    </li>
                    <li><strong>Paypal Account</strong></li>
                    <li>GO-L300@yahoo.com</li>
                  </ul>
                </li>
              </ul>
      </div>
        <p>&nbsp;</p>
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

mysql_free_result($rsreservasi);
?>
