<?php
// oracle query data to json formatter 
 header( "content=text/html; charset=utf-8");
 include "setup.php";
 include "function.php";
 $op=$_REQUEST['op'];
 $arg1=$_REQUEST['arg1'];
 $arg2=$_REQUEST['arg2'];

 switch($op){
   case "pos_json":
     pos_json($arg1,$arg2);
     break;
   case "pc_json":
     pc_json();
     break;
 }
/*
 $sql="select unique a.store_name,b.location_id,b.floor_id,a.store_id,b.pos_id,b.edc_no,b.pos_server_id,decode(a.pos_yn ,'0','Ⅹ','1','○'),to_char(end_date, 'YYYY/MM/DD'),decode(b.start_use,'1','','2','Ⅹ') from pos b left join constract a on a.store_id=b.store_id where b.start_use in ('1','2') and to_char(end_date, 'YYYY/MM/DD') >= to_char(sysdate, 'YYYY/MM/DD') and (to_char(contract_proid_e, 'YYYY/MM/DD') >= to_char(sysdate, 'YYYY/MM/DD') or contract_proid_e is null ) and a.store_name<> 'null' order by b.floor_id,b.location_id,a.store_id";

$json=array();
$stmt=oci_parse($conn,$sql);
oci_execute($stmt);
     while( $data= oci_fetch_object($stmt)){
         $json[]=$data; 
    }
oci_close($conn);
echo json_encode($json);
*/
?>
