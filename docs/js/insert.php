<?php
//save data to database

require('dbconnect.php');

//รับค่าจาก app.js POST
$postData = file_get_contents('php://input');
$jsondata = json_decode($postData);
// echo "postData =".json_encode($jsondata->name,JSON_UNESCAPED_UNICODE);
$data =  json_encode($jsondata->signature);
$name =  json_encode($jsondata->name,JSON_UNESCAPED_UNICODE);
$sername =  json_encode($jsondata->sername,JSON_UNESCAPED_UNICODE);
$gender =  json_encode($jsondata->gender,JSON_UNESCAPED_UNICODE);
// mysql_query("SET NAMES UTF8");
$sql = "INSERT INTO test (NAME,SERNAME,GENDER,SIG) VALUES ($name,$sername,$gender,$data)";


$result = mysqli_query($connect,$sql); //save data

if($result) {
    echo "SAVE DONE";
} else {
    mysqil_error($connect);
}
?>