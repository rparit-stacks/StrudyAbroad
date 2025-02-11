<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST['password'];

    if ($password === "this_is_rohit_parit_project_for_University_Insights") {
        $_SESSION['authenticated'] = true;
        header("Location: index.php");
        exit();
    } else {
        $error = "Invalid password. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Protection</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="auth-container">
        <h2>Please enter the password to access the project</h2>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="post" action="auth.php">
            <input type="password" name="password" required>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>