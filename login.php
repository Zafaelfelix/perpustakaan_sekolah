<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login perpustakaan</title>
</head>

<body>
    <h2>Login Perpustakaan</h2>
    <form action = "proses_login.php" method = "POST">
        <label> username: </label><br>
        <input  type = "text" name = "username" required><br><br>

        <label> password: </label><br>
        <input  type = "password" name = "password" required><br><br>

        <button type  = "submit "name = "login">LOGIN</button>
    </form>
    <?php
    if (isset($_GET['pesan'])){
        echo "<P style = 'color:red'>".$_GET['pesan']."</p>";
    }
    ?>

</body>
</html>