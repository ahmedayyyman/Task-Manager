<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
$tasks = file("tasks.txt", FILE_IGNORE_NEW_LINES);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Tasks</title>
    <link rel="stylesheet" href="Projects/task_manager/css/styles.css">

</head>
<body>
    <div class="container">
        <h1>Your Tasks</h1>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Category</th>
                    <th>Due Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task): ?>
                <?php
                    list($username, $title, $description, $category_id, $due_date, $status) = explode("|", $task);
                    if ($username == $_SESSION["username"]):
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($title); ?></td>
                    <td><?php echo htmlspecialchars($description); ?></td>
                    <td><?php echo htmlspecialchars($category_id); ?></td>
                    <td><?php echo htmlspecialchars($due_date); ?></td>
                    <td><?php echo htmlspecialchars($status); ?></td>
                </tr>
                <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
        <a href="create_task.php">Add New Task</a>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
