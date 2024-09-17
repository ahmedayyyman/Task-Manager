<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    
    $file = fopen("users.txt", "a");
    fwrite($file, $username . "|" . $password_hash . PHP_EOL);
    fclose($file);
    
    header("Location: login.php");
}
?>

<form method="post" action="register.php">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Register">
</form>
