<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = htmlspecialchars($_POST["title"]);
    $description = htmlspecialchars($_POST["description"]);
    $category_id = htmlspecialchars($_POST["category_id"]);
    $due_date = htmlspecialchars($_POST["due_date"]);
    
    $task = $_SESSION["username"] . "|" . $title . "|" . $description . "|" . $category_id . "|" . $due_date . "|pending" . PHP_EOL;
    
    $file = fopen("tasks.txt", "a");
    fwrite($file, $task);
    fclose($file);
    
    header("Location: index.php");
}
?>

<form method="post" action="create_task.php">
    Title: <input type="text" name="title" required><br>
    Description: <textarea name="description"></textarea><br>
    Category ID: <input type="number" name="category_id"><br>
    Due Date: <input type="date" name="due_date"><br>
    <input type="submit" value="Create Task">
</form>
