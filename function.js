function confirmInput(){
  var x = document.getElementById("twid").value;
  var re_id = new RegExp("^([a-zA-Z]{1})([0-9]{9})$");//ID pattern
  var idValidation = true;
  if( x.length != 10 || !re_id.test(x)){
    idValidation = false;
  }

  var y = document.getElementById("birthday").value;
  var re = new RegExp("^([0-9]{2})([0-9]{1,2})$");//birthday pattern
  var strDataValue;
  var  birthdayValidation = true;
  if ((strDataValue = re.exec(y)) != null) {
    var i;
    i = parseFloat(strDataValue[1]);
    if (i <= 0 || i > 12) { /*月*/
      birthdayValidation = false;
    }
    i = parseFloat(strDataValue[2]);
    if (i <= 0 || i > 31) { /*日*/
      birthdayValidation = false;
    }
  } else {
    birthdayValidation = false;
  }
var alert_str=[];
 if (!idValidation){
  alert_str.push("身份證格式錯誤\n範例:A123456789\n\n");
 }
 if (!birthdayValidation){
  alert_str.push("生日格式錯誤\n 範例　MMDD 月日共 4 位數\n\n");
 }
  if (!idValidation || !birthdayValidation){
   alert(alert_str);
   return false;
  }
}

function IDcheck(){
  var x = document.getElementById("twid");
  if( x.value.length == 0 )
  {
    alert("身份不能空白");
    //document.input_form.twid.focus();
    //return false;
  }
    return true;
}

function onlyNum(str){
var re = new RegExp("^([0-9]{2})([0-9]{1,2})$");
var strDataValue;
var infoValidation = true;
if ((strDataValue = re.exec(str)) != null) {
    var i;
    i = parseFloat(strDataValue[1]);
    if (i <= 0 || i > 12) { /*月*/
      infoValidation = false;
    }
    i = parseFloat(strDataValue[2]);
    if (i <= 0 || i > 31) { /*日*/
      infoValidation = false;
    }
  } else {
    infoValidation = false;
  }
if (!infoValidation) {
    alert("請輸入 MMDD 日期格式");
  }
return infoValidation;
}

function bigText(x) {
    x.style.height = "64px";
    x.style.width = "100%";
    x.style.fontSize = "64pt";
    x.style.background = "lightgreen";
}

function normalText(x) {
    x.style.height = "auto";
    x.style.width = "auto";
    x.style.fontSize = "10pt";
    x.style.background = "white";
}

