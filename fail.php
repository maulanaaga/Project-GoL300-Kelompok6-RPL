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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Selamat Datang di GO-L300</title>
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
            <form id="form1" method="POST" action="<?php echo $loginFormAction; ?>">
                      <fieldset>
                      <label for="text1">Username</label>
                      USERNAME
                      <br />
                        <input id="text1" type="text" name="text1" value="" />
                        <br />
                      <label for="text2">Password</label>
                        <p>PASSWORD<br />
                          <input id="text2" type="password" name="text2" value="" />
                          <br />
                          <input type="submit" id="login-submit" value="Login" />
                      
                          <input name="Reset" type="reset" id="login-submit2" value="Reset" />
                      </p>
                        <p class="style1">Login Gagal !!!!</p>
                        <p class="style2"><a href="register.php">Mendaftar&gt;&gt;&gt;&gt;&gt;</a></p>
                      </fieldset>
              </form>
            <br />
                    <div id="left_bot"></div>
            </div>
          <h2 align="center">&nbsp;</h2>
        </div>
        <p>&nbsp;</p>
<div class="twoOfThree last headline">
          <h1>Selamat Datang di GO-L300</h1>
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
        <p id="copy">Designed by &copy;alter </p>
      </div>
    </div>
    <div class="clear"></div>
  </div>
</body> 
</html>
<?php
mysql_free_result($rsusers);
?>