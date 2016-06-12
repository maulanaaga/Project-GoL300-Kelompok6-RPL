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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO reservasi (nama, no_identitas, identitasID, no_telp, email, jadwalID, KAID, stasiunID, stasiunID1, pembayaranID, pemilik, bankID, rekening, jumlahID, tanggal_berangkat) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['nama'], "text"),
                       GetSQLValueString($_POST['no_identitas'], "text"),
                       GetSQLValueString($_POST['identitasID'], "int"),
                       GetSQLValueString($_POST['no_telp'], "text"),
                       GetSQLValueString($_POST['email'], "text"),
                       GetSQLValueString($_POST['jadwalID'], "int"),
                       GetSQLValueString($_POST['KAID'], "int"),
                       GetSQLValueString($_POST['stasiunID'], "int"),
                       GetSQLValueString($_POST['stasiunID1'], "int"),
                       GetSQLValueString($_POST['pembayaranID'], "int"),
                       GetSQLValueString($_POST['pemilik'], "text"),
                       GetSQLValueString($_POST['bankID'], "int"),
                       GetSQLValueString($_POST['rekening'], "text"),
                       GetSQLValueString($_POST['jumlahID'], "int"),
                       GetSQLValueString($_POST['tanggal_berangkat'], "date"));

  mysql_select_db($database_connkereta, $connkereta);
  $Result1 = mysql_query($insertSQL, $connkereta) or die(mysql_error());

  $insertGoTo = "tiket.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

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

$tiket_rsjadwal = "1";
if (isset($_GET["jadwalID"])) {
  $tiket_rsjadwal = $_GET["jadwalID"];
}
mysql_select_db($database_connkereta, $connkereta);
$query_rsjadwal = sprintf("SELECT jadwal.jadwalID, jadwal.KAID, jadwal.stasiunID, jadwal.StasiunID1, jadwal.kelasID, jadwal.Harga, jadwal.Jam, ka.KANama, kelas.kelasNama, stasiun.stasiunNama, stasiun1.stasiunNama1 FROM jadwal, ka, kelas, stasiun, stasiun1 WHERE (jadwal.KAID=KA.KAID) AND (jadwal.stasiunID=stasiun.stasiunID) AND (jadwal.stasiunID1=stasiun1.stasiunID1) AND (jadwal.kelasID=kelas.kelasID) AND (jadwal.jadwalID=%s) ORDER BY jadwal.jadwalID ASC", GetSQLValueString($tiket_rsjadwal, "int"));
$rsjadwal = mysql_query($query_rsjadwal, $connkereta) or die(mysql_error());
$row_rsjadwal = mysql_fetch_assoc($rsjadwal);
$totalRows_rsjadwal = mysql_num_rows($rsjadwal);

mysql_select_db($database_connkereta, $connkereta);
$query_rsjumlah = "SELECT * FROM jumlah";
$rsjumlah = mysql_query($query_rsjumlah, $connkereta) or die(mysql_error());
$row_rsjumlah = mysql_fetch_assoc($rsjumlah);
$totalRows_rsjumlah = mysql_num_rows($rsjumlah);

mysql_select_db($database_connkereta, $connkereta);
$query_rsreservasi = "SELECT reservasi.reservasiID, reservasi.nama, reservasi.no_identitas, reservasi.identitasID, reservasi.no_telp, reservasi.email, reservasi.jadwalID, reservasi.KAID, reservasi.KAID, reservasi.stasiunID, reservasi.stasiunID1, reservasi.pembayaranID, reservasi.pemilik, reservasi.bankID, reservasi.rekening, reservasi.jumlahID, reservasi.tanggal_berangkat, jadwal.Harga, jadwal.Jam, ka.KANama, pembayaran.jenisPembayaran, stasiun.stasiunNama, stasiun1.stasiunNama1, identitas.jenisID, bank.bankNama, jumlah.jumlahNama FROM reservasi, jadwal, ka, pembayaran, stasiun, stasiun1, identitas, bank, jumlah WHERE (reservasi.identitasID=identitas.identitasID) AND (reservasi.jadwalID=jadwal.jadwalID) AND (reservasi.KAID=KA.KAID) AND (reservasi.stasiunID=stasiun.stasiunID) AND (reservasi.stasiunID1=stasiun1.stasiunID1) AND (reservasi.pembayaranID=pembayaran.pembayaranID) AND (reservasi.bankID=bank.bankID) AND (reservasi.jumlahID=jumlah.jumlahID) ORDER BY reservasi.reservasiID ASC";
$rsreservasi = mysql_query($query_rsreservasi, $connkereta) or die(mysql_error());
$row_rsreservasi = mysql_fetch_assoc($rsreservasi);
$totalRows_rsreservasi = mysql_num_rows($rsreservasi);

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
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pesan Tiket</title>
<link rel="Shortcut Icon" href="images/train.ico">
<link rel="stylesheet" href="styles.css" type="text/css" />
<style type="text/css">
<!--
.style1 {color: #FF0000}
.style2 {
	color: #FF0000;
	font-size: 16px;
	font-weight: bold;
}
-->
</style>
<script type="text/javascript">
<!--
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; if ((val=val.value)!="") {
        if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
          if (p<1 || p==(val.length-1)) errors+='- '+nm+' must contain an e-mail address.\n';
        } else if (test!='R') { num = parseFloat(val);
          if (isNaN(val)) errors+='- '+nm+' must contain a number.\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' must contain a number between '+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' is required.\n'; }
    } if (errors) alert('The following error(s) occurred:\n'+errors);
    document.MM_returnValue = (errors == '');
} }
//-->
</script>
</head>

<body>
<div id="container">
	<div id="header">
    	<h1><a href="/"><img src="Go1.png" alt="" width="200" height="55" longdesc="images/200px-PT.KA.svg.png" /></a></h1>
      <h2>Welcome to GO-L300</h2>
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
    	<h2>Welcome to ticket On-Line L300</h2>
        <p>Membuat kemudahan dan kenyamanan dalam pemesanan tiket L300, "NO COPET, NO NGANTRI, NO CALO"



</p>
    </div>
    <div id="body">
		<div id="content">
			<h2><strong>Pemesanan Tiket L300</strong></h2>
            <p><img src="Go2.png" alt="" width="265" height="55" longdesc="images/footer-l2.png" /></p>
            <p><?php 
$nextWeek = time() + (7*24*60*60);//7days;24 hours;60 mins;60 secs
echo 'SEKARANG: '.date('d-m-Y')."\n";
echo 'MINGGU DEPAN:'.date('d-m-Y',$nextWeek)."\n";
?>
  </h10></p>
        <form id="form1" method="post" action="">
              <?php do { ?>
              <table width="100%" border="0" cellspacing="0" cellpadding="3">
                <tr>
                  <td width="17%"><div align="center"><strong>JADWAL ID</strong></div></td>
                  <td width="20%"><div align="center"><strong>CV</strong></div></td>
                  <td width="22%"><div align="center"><strong>DARI</strong></div></td>
                  <td width="11%"><div align="center"><strong>TUJUAN</strong></div></td>
                  <td width="10%"><div align="center"><strong>KELAS</strong></div></td>
                  <td width="10%"><div align="center"><strong>HARGA</strong></div></td>
                  <td width="10%"><div align="center"><strong>JAM</strong></div></td>
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
              <?php } while ($row_rsjadwal = mysql_fetch_assoc($rsjadwal)); ?></form>
            <p align="center" class="style2">INPUT DATA DIRI ANDA</p>
            <p>&nbsp;</p>
	  
            <form action="<?php echo $editFormAction; ?>" method="post" id="form2">
              <table>
                <tr valign="baseline">
                  <td align="right"><div align="left" class="style1"><strong>Nama:</strong></div></td>
                  <td><input type="text" name="nama" value="" size="32" /></td>
                </tr>
                <tr valign="baseline">
                  <td align="right"><div align="left" class="style1"><strong>No Identitas:</strong></div></td>
                  <td><input type="text" name="no_identitas" value="" size="32" /></td>
                </tr>
                <tr valign="baseline">
                  <td align="right"><div align="left" class="style1"><strong>Jenis Identitas:</strong></div></td>
                  <td><select name="identitasID">
                      <?php 
do {  
?>
                      <option value="<?php echo $row_rsidentitas['identitasID']?>" ><?php echo $row_rsidentitas['jenisID']?></option>
                      <?php
} while ($row_rsidentitas = mysql_fetch_assoc($rsidentitas));
?>
                    </select>                  </td>
                </tr>
                <tr> </tr>
                <tr valign="baseline">
                  <td align="right"><div align="left" class="style1"><strong>No. Telp/HP:</strong></div></td>
                  <td><input type="text" name="no_telp" value="" size="32" /></td>
                </tr>
                <tr valign="baseline">
                  <td align="right"><div align="left" class="style1"><strong>Email:</strong></div></td>
                  <td><input name="email" type="text" id="email" onblur="MM_validateForm('email','','NisEmail');return document.MM_returnValue" size="32" /></td>
                </tr>
                <tr valign="baseline">
                  <td align="right"><div align="left" class="style1"><strong>Jadwal:</strong></div></td>
                  <td><input type="text" name="jadwalID" value="Input sesuai jadwal ada di atas FORM" size="42" /></td>
                </tr>
                <tr valign="baseline">
                  <td align="right"><div align="left" class="style1"><strong>Nama CV:</strong></div></td>
                  <td><select name="KAID">
                      <?php 
do {  
?>
                      <option value="<?php echo $row_rska['KAID']?>" ><?php echo $row_rska['KANama']?></option>
                      <?php
} while ($row_rska = mysql_fetch_assoc($rska));
?>
                    </select>                  </td>
                </tr>
                <tr> </tr>
                <tr valign="baseline">
                  <td align="right"><div align="left" class="style1"><strong>Terminal Keberangkatan:</strong></div></td>
                  <td><select name="stasiunID">
                      <?php 
do {  
?>
                      <option value="<?php echo $row_rsstasiun['stasiunID']?>" ><?php echo $row_rsstasiun['stasiunNama']?></option>
                      <?php
} while ($row_rsstasiun = mysql_fetch_assoc($rsstasiun));
?>
                    </select>                  </td>
                </tr>
                <tr> </tr>
                <tr valign="baseline">
                  <td align="right"><div align="left" class="style1"><strong>Terminal Tujuan:</strong></div></td>
                  <td><select name="stasiunID1">
                      <?php 
do {  
?>
                      <option value="<?php echo $row_rsstasuin1['stasiunID1']?>" ><?php echo $row_rsstasuin1['stasiunNama1']?></option>
                      <?php
} while ($row_rsstasuin1 = mysql_fetch_assoc($rsstasuin1));
?>
                    </select>                  </td>
                </tr>
                <tr> </tr>
                <tr valign="baseline">
                  <td align="right"><div align="left" class="style1"><strong>Jenis Pembayaran:</strong></div></td>
                  <td><select name="pembayaranID">
                      <?php 
do {  
?>
                      <option value="<?php echo $row_rspembayaran['pembayaranID']?>" ><?php echo $row_rspembayaran['jenisPembayaran']?></option>
                      <?php
} while ($row_rspembayaran = mysql_fetch_assoc($rspembayaran));
?>
                    </select>                  </td>
                </tr>
                <tr> </tr>
                <tr valign="baseline">
                  <td align="right"><div align="left" class="style1"><strong>Pemilik Rekening:</strong></div></td>
                  <td><input type="text" name="pemilik" value="" size="32" /></td>
                </tr>
                <tr valign="baseline">
                  <td align="right"><div align="left" class="style1"><strong>Bank:</strong></div></td>
                  <td><select name="bankID">
                      <?php 
do {  
?>
                      <option value="<?php echo $row_rsbank['bankID']?>" ><?php echo $row_rsbank['bankNama']?></option>
                      <?php
} while ($row_rsbank = mysql_fetch_assoc($rsbank));
?>
                    </select>                  </td>
                </tr>
                <tr> </tr>
                <tr valign="baseline">
                  <td align="right"><div align="left" class="style1"><strong>No. Rekening:</strong></div></td>
                  <td><input type="text" name="rekening" value="" size="32" /></td>
                </tr>
                <tr valign="baseline">
                  <td align="right"><div align="left" class="style1"><strong>Jumlah Tiket:</strong></div></td>
                  <td><select name="jumlahID">
                      <?php 
do {  
?>
                      <option value="<?php echo $row_rsjumlah['jumlahID']?>" ><?php echo $row_rsjumlah['jumlahNama']?></option>
                      <?php
} while ($row_rsjumlah = mysql_fetch_assoc($rsjumlah));
?>
                    </select>                  </td>
                </tr>
                <tr> </tr>
                <tr valign="baseline">
                  <td align="right"><div align="left" class="style1"><strong>Tanggal Keberangkatan:</strong></div></td>
                  <td><input type="text" name="tanggal_berangkat" value="yyyy/mm/dd" size="32" /></td>
                </tr>
                <tr valign="baseline">
                  <td align="right"><span class="style1"></span></td>
                  <td><input type="submit" value="Order NOW" />
                  <label>
                  <input type="reset" name="reset" id="reset" value="Reset" />
                  </label></td>
                </tr>
              </table>
              <input type="hidden" name="MM_insert" value="form2" />
            </form>
            <p align="center" class="style1"><a href="jadwal.php">BACK TO JADWAL</a></p>
	  </div>
        
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
                
                <li></li>
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

mysql_free_result($rsjumlah);

mysql_free_result($rsreservasi);

mysql_free_result($rsstasuin1);

mysql_free_result($rsidentitas);

mysql_free_result($rsbank);
?>
