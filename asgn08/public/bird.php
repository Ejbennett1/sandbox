<?php
declare(strict_types=1);

require_once dirname(__DIR__) . '/private/initialize.php';
require_once dirname(__DIR__) . '/private/classes/Bird.php';

$pdo = Database::connect();
Bird::set_database($pdo);

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
]);

if ($id === null || $id === false) {
    http_response_code(400);
    exit('Invalid bird ID.');
}

$bird = Bird::find_by_id($id);

if ($bird === null) {
    http_response_code(404);
    exit('Bird not found.');
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bird Details</title>
</head>

<body>
    <h1><?= htmlspecialchars($bird->common_name) ?></h1>

    <p><strong>ID:</strong> <?= $bird->id ?></p>

    <p><strong>Common Name:</strong>
        <?= htmlspecialchars($bird->common_name) ?>
    </p>

    <p><strong>Scientific Name:</strong>
        <?= htmlspecialchars($bird->scientific_name) ?>
    </p>

    <p><strong>Family:</strong>
        <?= htmlspecialchars($bird->family_name) ?>
    </p>

    <p><strong>Primary Habitat:</strong>
        <?= htmlspecialchars($bird->primary_habitat) ?>
    </p>

    <p><strong>Seasonal Status:</strong>
        <?= htmlspecialchars($bird->seasonal_status) ?>
    </p>

    <p><strong>Description:</strong>
        <?= htmlspecialchars($bird->description) ?>
    </p>

    <p><a href="birds.php">Back to Bird Directory</a></p>
</body>

</html>