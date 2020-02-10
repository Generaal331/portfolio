<?php
require_once('connect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Img display</title>
</head>
<body>
<div class="header">
  <a href="#default" class="logo">CompanyLogo</a>
  <div class="header-right">
    <a class="active" href="hoofdscherm.php">Home</a>
    <a href="project.php">Projecten</a>
    <a href="image.php"> Upload img</a>
    <a href="displayimg.php">Display</a>
    <a href="update.php">Update</a>
    <a href="delete.php">Delete</a>
    <a href="index.html">Website</a>
  </div>
</div>
</div>
<div style="padding-left:20px">
  <div id="container">
    <div id="content">
     <h1> Nieuwe projecten </h1>
    </div>
    <hr>
    <button onclick="myFunction()">Toggle dark mode</button>

<script>
function myFunction() {
   var element = document.body;
   element.classList.toggle("dark-mode");
}
</script>

<button class="open-button" onclick="openForm()">Chat</button>

<div class="chat-popup" id="myForm">
  <form action="/action_page.php" class="form-container">
    <h1>Chat</h1>

    <label for="msg"><b>Message</b></label>
    <textarea placeholder="Type message.." name="msg" required></textarea>

    <button type="submit" class="btn">Send</button>
    <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
  </form>
</div>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
<div id="statblock">
<?php
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
</div>


</body>
</html>