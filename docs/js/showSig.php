<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/sig2/docs/css/show.css">
    <title>ShowSig</title>
</head>
<body>
    <div class="center">
    <?php
        require('dbconnect.php');

        $sql ="SELECT * FROM hardtothinkingthename";
        // $len = "SELECT COUNT(id_sig) FROM hardtothinkingthename";
        $result = mysqli_query($connect,$sql);

        $i = 1;
        while ($row = mysqli_fetch_row($result)) {
            echo '<div class="elem">';
            echo "<p> คนที่= ".$i."</p>";
            echo "<p> id= ".$row[0]."</p>";
            echo "<p>name= ".$row[1]."sername = ".$row[2]."</p>";
            echo "<p>gender= ".$row[3]."</p>";
            echo '<div class="img"><p>ลายเซ็น =></p><img class="" src="'.$row[4].'"></div>';
            echo "</div>";

            $i++;
        }

?>
    </div>
</body>
</html>