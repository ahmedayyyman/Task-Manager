<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);
    
    $users = file("users.txt", FILE_IGNORE_NEW_LINES);
    foreach ($users as $user) {
        list($stored_username, $stored_hash) = explode("|", $user);
        if ($stored_username == $username && password_verify($password, $stored_hash)) {
            $_SESSION["username"] = $username;
            header("Location: index.php");
            exit();
        }
    }
    echo "Invalid username or password";
}
?>

<form method="post" action="login.php">
    Username: <input type="text" name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Login">
</form>
