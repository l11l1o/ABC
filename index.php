<html>
<head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link rel="stylesheet" type="text/css" media="screen" href="cardno_style.css">
        <title>會員卡條碼查詢</title>
        <script src="function.js"></script>
</head>
<body>
<form onsubmit="return confirmInput()" name='input_form' action='index.php' method='post' >
      <div class="contact_left_text"><font color="#fe8502">*</font> 輸入身份字號</div>
      <input  id="twid" name="twid" class="width_235" type="text" value="" >

      <div class="contact_left_text"><font color="#fe8502">*</font> 輸入生日MMDD<br>(例如7月1日請輸入0701)</div>
      <input  id="birthday" name="birthday" class="width_235" type='text' value="">
      <input id="op" name="op" type='hidden' value="q_card">
      <div class="contact_left_text">
      <input type=submit  value="查詢卡號"></div>
</form>      


<?php
include "setup.php";
include "function.php";
$op = $_POST['op'];
$tw_id = $_POST['twid'];
$birth_no = $_POST['birthday'];
$s_str =$_POST['s_str'];

switch ($op){
  case "q_card":
    get_card_no($tw_id,$birth_no);
    break;
  case "0":
    $ID=$_POST['s_id'];
    $BIRTH=$_POST['s_bir'];
    $CARD_NO=$_POST['s_cardno'];
    $CODE=$_POST['s_code'];
    $STR=$_POST['s_str'];
    require_once(dirname(__FILE__).'/tcpdf_barcodes_1d_include.php');
    $barcodeobj = new TCPDFBarcode( $CARD_NO , 'C128');
    echo "<div class=order_form >\n";
    echo " <table class=tbl border=1  align=center>\n";
/*
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
*/
    echo "<tr><td id=BcodeHtml colspan=5 align=center>\n";
    echo $barcodeobj->getBarcodeHTML(2, 30, 'black');
    echo "</td></tr>\n";
    echo "<tr><td colspan=5 align=center>\n";
    echo "$CARD_NO\n";
    echo "</td></tr>\n";
    echo "</table>\n";
     echo "</div>\n";
//echo "<p>$s_str</p>\n";
    break;
/*
case "10":
echo "<p>$s_str</p>\n";
  break;
case "12":
//echo "<p>Living Card 會員不存在</p>\n";
echo "<p>$s_str</p>\n";
  break;
case "13":
//echo "<p>查無有效的Living Card</p>\n";
echo "<p>$s_str</p>\n";
  break;
case "99":
//echo "<p>異常說明</p>\n";
echo "<p>$s_str</p>\n";
  break;    
*/
 default:
echo "<p>$s_str</p>\n";
    break;
}

?>
</body>
</html>

