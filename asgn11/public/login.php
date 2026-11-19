<?php

declare(strict_types=1);

require_once __DIR__ . '/../private/initialize.php';

$error = '';
$username = '';

if (is_logged_in()) {
    header('Location: birds.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    $member = Member::find_by_username($username);

    if ($member && password_verify(
        $password,
        $member['password_hash']
    )) {
        log_in_member($member);

        header('Location: birds.php');
        exit;
    }

    $error = 'Invalid username or password.';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - WNC Birds</title>
</head>

<body>

    <h1>Member Login</h1>

    <nav>
        <a href="birds.php">Birds</a>
        <a href="register.php">Register</a>
    </nav>

    <?php if (isset($_GET['registered'])): ?>
        <p>Registration successful! You may now log in.</p>
    <?php endif; ?>

    <?php if ($error !== ''): ?>
        <p><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form action="login.php" method="post">

        <p>
            <label for="username">Username</label><br>
            <input type="text" id="username"
                name="username"
                value="<?= htmlspecialchars($username) ?>"
                autocomplete="username" required>
        </p>

        <p>
            <label for="password">Password</label><br>
            <input type="password" id="password"
                name="password"
                autocomplete="current-password" required>
        </p>

        <button type="submit">Login</button>

    </form>

</body>

</html>
