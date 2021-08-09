<?php
//save data to database

require('dbconnect.php');
//รับค่าจาก app.js POST
$postData = file_get_contents('php://input');
$jsondata = json_decode($postData);
echo $postData;
$data =  json_encode($jsondata->signature);
$name =  json_encode($jsondata->name);
$sername =  json_encode($jsondata->sername);
$gender =  json_encode($jsondata->gender);


$sql = "INSERT INTO hardtothinkingthename (name,sername,gender,sig) VALUES ($name,$sername,$gender,$data)";

$result = mysqli_query($connect,$sql); //save data

if($result) {
    echo "SAVE DONE";
} else {
    mysqil_error($connect);
}
// header("http://localhost/sig2/docs/");
 ?>