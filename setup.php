<?php
#$DB = '//10.5.21.81:1521/oradb';
$DB = '//192.168.1.53:1521/oradb';
$DB_USER = 'qrylp';
$DB_PASS = 'qrylp';
$DB_CHAR = 'UTF8';
 $conn = oci_connect($DB_USER,$DB_PASS,$DB,$DB_CHAR );

 #$conn = oci_connect('qrylp', 'qrylp', '//10.5.21.81/oradb', "AL32UTF8" ) or die ("無法連上 會員 資料庫!" . oci_error());
 //$conn = oci_connect('etek', 'etek', '10.2.21.10/oradb', 'AL32UTF8' ) or die ("無法連上POS資料庫!" . oci_error());
 //'AL32UTF8' 處理Big5 2 utf-8
 //避免出現亂碼 ？
?>

