<?php
function get_card_no($tw_id,$birth_no){
include "setup.php";
 $sql="CALL GETCARD(:as_id, :as_birth, :as_cardno, :as_retval, :as_retstr)";

    // Assign a value to the input
    $ID = strtoupper($tw_id);//大寫字母
    $BIRTH = substr($birth_no,0 ,4);//只取前4字元 
    $stmt=oci_parse($conn,$sql);

    //  Bind the input parameter
    oci_bind_by_name($stmt,":as_id",$ID);
    oci_bind_by_name($stmt,":as_birth",$BIRTH);

    // Bind the output parameter
    oci_bind_by_name($stmt,":as_cardno",$CARD_NO,32);
    oci_bind_by_name($stmt,":as_retval",$CODE,32);
    oci_bind_by_name($stmt,":as_retstr",$STR,32);

    oci_execute($stmt);
switch ($CODE){
case "0":
//header("location:index.php?op=0&s_id=$ID&s_bir=$BIRTH&s_cardno=$CARD_NO&s_code=$CODE&s_str=$STR");
?>
    <form name="myForm" id="myForm"  action="" method="POST">
            <input name="op" value="0" type='hidden'/>
            <input name="s_id" value="<?php echo $ID;?>" type='hidden'/>
            <input name="s_bir" value="<?php echo $BIRTH;?>" type='hidden'/>
            <input name="s_cardno" value="<?php echo $CARD_NO;?>" type='hidden'/>
            <input name="s_code" value="<?php echo $CODE;?>" type='hidden'/>
            <input name="s_str" value="<?php echo $STR;?>" type='hidden'/>
    </form>

    <script>
    function submitform()
    {
      document.getElementById("myForm").submit();
    }
    window.onload = submitform;
    </script>
<?php
  break;
default :
//header("location:index.php?op=99");
?>
    <form name="myForm" id="myForm"  action="" method="POST">
            <input name="op" value="99" type='hidden'/>
            <input name="s_str" value="<?php echo $STR;?>" type='hidden'/>
    </form>

    <script>
    function submitform()
    {
      document.getElementById("myForm").submit();
    }
    window.onload = submitform;
    </script>
<?php

  break;
}
}
?>

