<?php
declare(strict_types=1);

require_once dirname(__DIR__) . '/private/initialize.php';
require_once dirname(__DIR__) . '/private/classes/Bird.php';

$pdo = Database::connect();
Bird::set_database($pdo);

$birds = Bird::find_all();
$total = Bird::count_all();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WNC Bird Directory</title>
</head>

<body>
    <h1>WNC Bird Directory</h1>

    <p>Total birds: <?= $total ?></p>

    <table>
        <caption>Western North Carolina Bird Directory</caption>
        <thead>
            <tr>
                <th scope="col">Common Name</th>
                <th scope="col">Scientific Name</th>
                <th scope="col">Habitat</th>
                <th scope="col">Season</th>
                <th scope="col">Details</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($birds as $bird): ?>
                <tr>
                    <td><?= htmlspecialchars($bird->common_name, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($bird->scientific_name, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($bird->primary_habitat, ENT_QUOTES, 'UTF-8') ?></td>
                    <td><?= htmlspecialchars($bird->seasonal_status, ENT_QUOTES, 'UTF-8') ?></td>
                    <td>
                        <a href="bird.php?id=<?= urlencode((string) $bird->id) ?>">
                            View Details
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <p><a href="index.php">Back to Home</a></p>
</body>

</html>
