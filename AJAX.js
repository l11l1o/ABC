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
