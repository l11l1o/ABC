<?php
$DB = '//192.168.1.53:1521/oradb';
$DB_USER = 'qrylp';
$DB_PASS = 'qrylp';
$DB_CHAR = 'UTF8';

$conn = oci_connect($DB_USER,$DB_PASS,$DB,$DB_CHAR);
 $sql="CALL GETCARD(:as_id, :as_birth, :as_cardno, :as_retval, :as_retstr)";
    // Assign a value to the input
#    $ID = strtoupper($tw_id);//大寫字母
#    $BIRTH = substr($birth_no,0 ,4);//只取前4字元
    $ID = 'N120315317';//大寫字母
    $BIRTH = '0410';//只取前4字元
    $stid=oci_parse($conn,$sql);

    //  Bind the input parameter
    oci_bind_by_name($stid,":as_id",$ID);
    oci_bind_by_name($stid,":as_birth",$BIRTH);

    // Bind the output parameter
    oci_bind_by_name($stid,":as_cardno",$CARD_NO,32);
    oci_bind_by_name($stid,":as_retval",$CODE,32);
    oci_bind_by_name($stid,":as_retstr",$STR,32);


oci_execute($stid);

    echo "<div class=order_form >\n";
    echo " <table class=tbl border=1  align=center>\n";
    echo "  <tr>\n";
    echo "    <th>身份證號</th>\n";
    echo "    <th>生日</th>\n";
    echo "    <th>會員卡號</th>\n";
    echo "    <th>狀態碼</th>\n";
    echo "    <th>說明</th>\n";
    echo "  </tr>\n";
    echo "<tr>\n\n";
    echo "<td id=id_no>".$ID."</td>\n";
    echo "<td id=birth_no>".$BIRTH."</td>\n";
    echo "<td id=card_no>".$CARD_NO."</td>\n";
    echo "<td id=code_no>".$CODE."</td>\n";
    echo "<td id=str_str>".$STR."</td>\n";
    echo "</tr>\n";
    echo "<tr><td id=BcodeHtml colspan=5 align=center>\n";
#    echo $barcodeobj->getBarcodeHTML(2, 30, 'black');
    echo "</td></tr>\n";
    echo "<tr><td colspan=5 align=center>\n";
    echo "$CARD_NO\n";
    echo "</td></tr>\n";
    echo "</table>\n";
    echo "</div>\n";
?>
