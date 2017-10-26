<html>
<head>

<script>
function showBarcode(){
  var ID=document.getElementById("twid").value;
  var BIRTH=document.getElementById("birthday").value;
  loadAJAX(ID,BIRTH);
}

function loadAJAX(ID,BIRTH){
  var xmlhttp;
  if (window.XMLHttpRequest){// code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
    }
  else{// code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  
   xmlhttp.onreadystatechange=function()
    {
    if (xmlhttp.readyState==4 && xmlhttp.status==200)
      {
    eval(xmlhttp.responseText);
      }
    }
  
   xmlhttp.open("GET","getCardNo.php?tw_id="+ID+"&birth_no="+BIRTH,true);
   xmlhttp.send();
}
</script>

        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <link rel="stylesheet" type="text/css" media="screen" href="style.css">
        <title>會員查尋系統</title>
</head>
<body>
<div class="contact_bg_center">
  <div class="contact_bg_bottom">
    <div class="contact_contant">
      <p>
      <div class="contact_left_text"><font color="#fe8502">*</font> 輸入身份字號</div>
      <input id="twid" class="width_235" type='text' value="A123456789">
      </p>

      <p>
      <div class="contact_left_text"><font color="#fe8502">*</font> 輸入生日MMDD</div>
      <input id="birthday" class="width_235" type='text' value="0101">
      </p>
    </div>
  </div>
</div>
<button onclick="showBarcode()">產生條碼</button>
      <div id='barcore_area'>
      </div>            


<div class="order_form">
 <table class=tbl border=1  align=center>
  <tr>
    <th>身份證號</th>
    <th>生日</th>
    <th>會員卡號</th>
    <th>狀態碼</th>
    <th>說明</th>
  </tr>
<?php
include "setup.php";
echo "<tr>\n";
echo "<td id='id_no'></td>";
echo "<td id='birth_no'></td>";
echo "<td id='card_no'></td>";
echo "<td id='code_no'></td>";
echo "<td id='str_str'></td>";
echo "</tr>\n";
$CARD_NO = $_SESSION['card_no'];
require_once(dirname(__FILE__).'/tcpdf_barcodes_1d_include.php');
$barcodeobj = new TCPDFBarcode( $CARD_NO , 'C128');
echo "<tr><td id=BcodeHtml colspan=5 align=center>";
//echo "<img id=LinearBarcode1 src=test_1d_html.php/>";
echo $barcodeobj->getBarcodeHTML(2, 30, 'black');
echo "</td></tr>";
echo "<tr><td colspan=5 align=center>";
echo $_SESSION['card_no'];
echo "</td></tr>";
echo "</table>";
?>

</div>
</body>
</html>

