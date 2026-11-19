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

// Process the edit form
if ($bird !== null && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $bird->common_name = trim($_POST['common_name'] ?? '');
    $bird->scientific_name = trim($_POST['scientific_name'] ?? '');
    $bird->family_name = trim($_POST['family_name'] ?? '');
    $bird->primary_habitat = trim($_POST['primary_habitat'] ?? '');
    $bird->seasonal_status = trim($_POST['seasonal_status'] ?? '');
    $bird->description = trim($_POST['description'] ?? '');

    // Validate required fields
    if ($bird->common_name === '' || $bird->scientific_name === '') {
        $error_message = 'Common name and scientific name are required.';
    } else {

        // Save the changes
        if ($bird->update()) {
            header('Location: bird.php?id=' . $bird->id);
            exit;
        }

        $error_message = 'The bird could not be updated.';
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Update Bird</title>
</head>

<body>

    <h1>Update Bird</h1>

    <p><a href="birds.php">Back to bird directory</a></p>

    <?php if ($bird === null): ?>

        <p>Bird not found or invalid ID.</p>

    <?php else: ?>

        <?php if ($error_message !== ''): ?>
            <p><?= h($error_message) ?></p>
        <?php endif; ?>

        <form method="post" action="bird_edit.php">
            <input type="hidden" name="id" value="<?= (int) $bird->id ?>">

            <p>
                <label for="common_name">Common name</label><br>
                <input type="text" id="common_name" name="common_name" value="<?= h($bird->common_name) ?>" required>
            </p>

            <p>
                <label for="scientific_name">Scientific name</label><br>
                <input type="text" id="scientific_name" name="scientific_name" value="<?= h($bird->scientific_name) ?>"
                    required>
            </p>

            <p>
                <label for="family_name">Family name</label><br>
                <input type="text" id="family_name" name="family_name" value="<?= h($bird->family_name) ?>">
            </p>

            <p>
                <label for="primary_habitat">Primary habitat</label><br>
                <input type="text" id="primary_habitat" name="primary_habitat" value="<?= h($bird->primary_habitat) ?>">
            </p>

            <p>
                <label for="seasonal_status">Seasonal status</label><br>
                <input type="text" id="seasonal_status" name="seasonal_status" value="<?= h($bird->seasonal_status) ?>">
            </p>

            <p>
                <label for="description">Description</label><br>
                <textarea id="description" name="description" rows="5" cols="50"><?= h($bird->description) ?></textarea>
            </p>

            <p>
                <button type="submit">Update Bird</button>
                <a href="birds.php">Cancel</a>
            </p>

        </form>

    <?php endif; ?>

</body>

</html>
