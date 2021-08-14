<?php
//save data to database

require('dbconnect.php');
$phpVersion = substr(phpversion(), 0, 3)*1;
// preg_replace('/\\\\u([a-f0-9]{4})/e', "iconv('UCS-4LE','UTF-8',pack('V', hexdec('U$1')))", json_encode($value));
//รับค่าจาก app.js POST
$postData = file_get_contents('php://input');
$jsondata = json_decode($postData);
// echo "postData =".json_encode($jsondata->name,JSON_UNESCAPED_UNICODE);
echo $phpVersion;
if($phpVersion >= 5.4) {
    $data =  json_encode($jsondata->signature);
    $name =  json_encode($jsondata->name,JSON_UNESCAPED_UNICODE);
    $sername =  json_encode($jsondata->sername,JSON_UNESCAPED_UNICODE);
    $gender =  json_encode($jsondata->gender,JSON_UNESCAPED_UNICODE);
} else {
    $data =  json_encode($jsondata->signature);
    $name =  preg_replace( "/\\\\u([a-f0-9]{4})/e", "iconv('UCS-4LE','UTF-8',pack('V', hexdec('U$1')))", json_encode($jsondata->name));
    $sername = preg_replace( "/\\\\u([a-f0-9]{4})/e", "iconv('UCS-4LE','UTF-8',pack('V', hexdec('U$1')))", json_encode($jsondata->sername));
    $gender =  preg_replace( "/\\\\u([a-f0-9]{4})/e", "iconv('UCS-4LE','UTF-8',pack('V', hexdec('U$1')))", json_encode($jsondata->gender));
  }
// mysql_query("SET NAMES UTF8");
$sql = "INSERT INTO test (NAME,SERNAME,GENDER,SIG) VALUES ($name,$sername,$gender,$data)";


$result = mysqli_query($connect,$sql); //save data

if($result) {
    echo "SAVE DONE";
} else {
    mysqil_error($connect);
}
?>