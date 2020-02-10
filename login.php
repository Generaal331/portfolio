<?php
session_start();
ob_start();
?>



<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initail-scale=1" />
	<link rel="stylesheet" href="style/login.css">
	<title>login</title>
</head>
<body>
<div div="container">
    <div class="blok2">
      <div id="mainblok1">
      <form method="post" onsubmit="return validateForm()">
            <input type="email" name="field_email" id="mail" placeholder="E-mailadres" required/>
            <input type="password" name="field_password" id="passwd" placeholder="Wachtwoord" required/><br>
            <input type="submit" name="login" value="Login"/>
             <a class="registreer" href="registratie.php">registreer</a>
         </div>
     </div>
 </div>
            <?php
        
                require_once('connect.php');
                if(isset($_POST['login'])){
                    $email = mysqli_real_escape_string($conn, $_POST['field_email']);
                    $password = mysqli_real_escape_string($conn, $_POST['field_password']);
                    $sql = "SELECT * FROM customer WHERE email= ? AND password= ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("ss", $email, $password);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    if($result->num_rows === 0) {
                        exit('Deze gebruiker bestaat niet');
                    } else {
                        $_SESSION['email'] = $email;
                        $_SESSION['customerID'] = $row['id'];
                        while($row = $result->fetch_assoc()){
                            $_SESSION['customerID'] = $row['id'];
                        }
                        header("Location: index.php");
                    }
                    $stmt->close();
                }
                    
            ?>
            </form>
        <script>
        function validateForm() {
        if(!validateEmail(document.getElementById("login").value)){
            alert("ongeldig emailadres");
            return false;
        }
        }  
        function validateEmail(email) {
            var re = ("/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]
                    +)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,
                    3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/");
            return re.test(String(email).toLowerCase());
        }
        </script>
</body>
</html>