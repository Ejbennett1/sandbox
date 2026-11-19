<?php

declare(strict_types=1);

require_once __DIR__ . '/../private/initialize.php';

$errors = [];

$first_name = '';
$last_name = '';
$email = '';
$username = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $first_name = trim($_POST['first_name'] ?? '');
    $last_name = trim($_POST['last_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    // Check required fields
    if ($first_name === '' || $last_name === '' ||
        $email === '' || $username === '' ||
        $password === '' || $confirm_password === '') {
        $errors[] = 'All fields are required.';
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    }

    // Check for duplicate username
    if (Member::find_by_username($username)) {
        $errors[] = 'That username is already taken.';
    }

    // Check for duplicate email
    if (Member::find_by_email($email)) {
        $errors[] = 'That email address is already registered.';
    }

    // Validate password length
    if (strlen($password) < 8) {
        $errors[] = 'Password must be at least 8 characters.';
    }

    // Confirm passwords match
    if ($password !== $confirm_password) {
        $errors[] = 'Passwords do not match.';
    }

    // Register member if there are no errors
    if (empty($errors)) {
        try {
            $result = Member::register([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'username' => $username,
                'password' => $password
            ]);

            if ($result) {
                header('Location: login.php?registered=1');
                exit;
            }

            $errors[] = 'Registration failed.';
        } catch (PDOException $e) {
            $errors[] = 'Unable to register. Please try again.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - WNC Birds</title>
</head>

<body>

    <h1>Register</h1>

    <nav>
        <a href="birds.php">Birds</a>
        <a href="login.php">Login</a>
    </nav>

    <?php if (!empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="register.php" method="post">

        <p>
            <label for="first_name">First Name</label><br>
            <input type="text" id="first_name"
                name="first_name" maxlength="100"
                value="<?= htmlspecialchars($first_name) ?>" required>
        </p>

        <p>
            <label for="last_name">Last Name</label><br>
            <input type="text" id="last_name"
                name="last_name" maxlength="100"
                value="<?= htmlspecialchars($last_name) ?>" required>
        </p>

        <p>
            <label for="email">Email</label><br>
            <input type="email" id="email"
                name="email" maxlength="255"
                value="<?= htmlspecialchars($email) ?>" required>
        </p>

        <p>
            <label for="username">Username</label><br>
            <input type="text" id="username"
                name="username" maxlength="50"
                value="<?= htmlspecialchars($username) ?>" required>
        </p>

        <p>
            <label for="password">Password</label><br>
            <input type="password" id="password"
                name="password" minlength="8"
                autocomplete="new-password" required>
        </p>

        <p>
            <label for="confirm_password">Confirm Password</label><br>
            <input type="password" id="confirm_password"
                name="confirm_password"
                autocomplete="new-password" required>
        </p>

        <button type="submit">Register</button>

    </form>

</body>

</html>
