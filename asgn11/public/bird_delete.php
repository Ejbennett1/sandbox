<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/private/initialize.php';

$error_message = '';

// Get the Bird ID from GET or POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
} else {
    $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
}

// Find the selected Bird
$bird = ($id !== false && $id !== null && $id > 0)
    ? Bird::find_by_id($id)
    : null;

// Delete only after confirmation with POST
if ($bird !== null && $_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($bird->delete()) {
        header('Location: birds.php');
        exit;
    }

    $error_message = 'The bird could not be deleted.';
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Delete Bird</title>
</head>
<body>

    <h1>Delete Bird</h1>

    <?php if ($bird === null): ?>

        <p>Bird not found or invalid ID.</p>

    <?php else: ?>

        <p><strong>Bird ID:</strong> <?= (int) $bird->id ?></p>
        <p><strong>Common name:</strong> <?= h($bird->common_name) ?></p>

        <p>Are you sure you want to delete this Bird?</p>

        <?php if ($error_message !== ''): ?>
            <p><?= h($error_message) ?></p>
        <?php endif; ?>

        <form method="post" action="bird_delete.php">
            <input type="hidden" name="id" value="<?= (int) $bird->id ?>">

            <button type="submit">Delete Bird</button>
            <a href="birds.php">Cancel</a>
        </form>

    <?php endif; ?>

    <p><a href="birds.php">Back to bird directory</a></p>

</body>
</html>
