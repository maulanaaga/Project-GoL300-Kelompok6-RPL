<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_connkereta = "localhost";
$database_connkereta = "l300";
$username_connkereta = "root";
$password_connkereta = "";
$connkereta = mysql_pconnect($hostname_connkereta, $username_connkereta, $password_connkereta) or trigger_error(mysql_error(),E_USER_ERROR); 
?>