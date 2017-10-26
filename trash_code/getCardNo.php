<?php
 include "setup.php";
//global $CARD_NO2;
unset($_SESSION['card_no']);
$tw_id = $_REQUEST['tw_id'];
$birth_no = $_REQUEST['birth_no'];
 $sql="CALL GETCARD(:as_id, :as_birth, :as_cardno, :as_retval, :as_retstr)";

    // Assign a value to the input
    $ID = $tw_id;
    $BIRTH = $birth_no;
    $stmt=oci_parse($conn,$sql);

    //  Bind the input parameter
    oci_bind_by_name($stmt,":as_id",$ID);
    oci_bind_by_name($stmt,":as_birth",$BIRTH);

    // Bind the output parameter
    oci_bind_by_name($stmt,":as_cardno",$CARD_NO,32);
    oci_bind_by_name($stmt,":as_retval",$CODE,32);
    oci_bind_by_name($stmt,":as_retstr",$STR,32);
    
    oci_execute($stmt);
$_SESSION['card_no']=$CARD_NO;
//$CARD_NO2=$CARD_NO;
$main=<<<LASTLINE
document.getElementById("twid").value="";
document.getElementById("birthday").value="";
document.getElementById("id_no").innerHTML="$ID";
document.getElementById("birth_no").innerHTML="$BIRTH";
document.getElementById("card_no").innerHTML="$CARD_NO";
document.getElementById("code_no").innerHTML="$CODE";
document.getElementById("str_str").innerHTML="$STR";
LASTLINE;
echo $main;
oci_close($conn);
?>
