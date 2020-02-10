<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/login.css">
    <title>Document</title>
</head>
<body>
<div class="container">
<a href="index.html">Home</a>
<div class="blok2">
<?php
require_once('connect.php');
$sql = "SELECT id, naam, img, datum  FROM img";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> id: ". $row["id"]. "
        <br> 
        - naam: ". $row["naam"]. "
        <br> 
        - img: ". $row["img"]. "
        <br> 
           - datum: " . $row["datum"] . "
           <br><HR><br>";
    }
} else {
    echo "0 results";
}

$conn->close();
        ?>
</div>
</div>
</body>
</html>