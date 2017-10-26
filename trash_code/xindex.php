<html>
<head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <link rel="stylesheet" type="text/css" media="screen" href="style.css">
        <title>會員查尋系統</title>
</head>
<body>
<div class="order_form">
 <table class=tbl border=1>
  <tr>
    <th>身份證號</th>
    <th>生日</th>
    <th>會員卡號</th>
    <th>狀態碼</th>
    <th>說明</th>
  </tr>
<?php
 include "setup.php";
 require_once(../tcpdf/tcpdf_include.php);
 $pdf= new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

 $sql="CALL GETCARD(:as_id, :as_birth, :as_cardno, :as_retval, :as_retstr)";

// Assign a value to the input 
$ID = 'N120315317';
$BIRTH ='0410';

$stmt=oci_parse($conn,$sql);


//  Bind the input parameter
oci_bind_by_name($stmt,":as_id",$ID);
oci_bind_by_name($stmt,":as_birth",$BIRTH);

// Bind the output parameter
oci_bind_by_name($stmt,":as_cardno",$CARD_NO,32);
oci_bind_by_name($stmt,":as_retval",$CODE,32);
oci_bind_by_name($stmt,":as_retstr",$STR,32);

oci_execute($stmt);
echo "<tr>\n";
echo "<td>$ID</td>";
echo "<td>$BIRTH</td>";
echo "<td>$CARD_NO</td>";
echo "<td>$CODE</td>";
echo "<td>$STR</td>";
echo "</tr>\n";

/*
$nrows = oci_fetch_all( $stmt, $result);
for ($i = 0; $i < $nrows; $i++) {
    $j = $i+1;
    echo "<tr>\n";
    echo "<td>$j</td>";
    foreach($result as $data){
    //共用元件，replace "null" "." space &nbsp
        if ( $data[$i]=="" || $data[$i]=="." || $data[$i]==" "){
           $data[$i]="&nbsp;";
        }
        echo "<td>$data[$i]</td>\n";
    }
      echo "</tr>\n";
}
*/
oci_close($conn);
?>
 </table>

</div>
</body>
</html>

