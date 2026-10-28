<?php

require_once __DIR__ . '/../private/initialize.php';
require_once __DIR__ . '/../private/classes/Bird.php';

$database_name = '';
$summary = [];
$error_message = null;

try {
    $database = Database::connect();
    Bird::set_database($database);

    $database_name = (string) $database->query(
        'SELECT DATABASE()'
    )->fetchColumn();

    $bird_count = Bird::count_all();
    $bird_count = Bird::count_all();

    $image_count = (int) $database->query(
        'SELECT COUNT(*) FROM bird_images'
    )->fetchColumn();

    $link_count = (int) $database->query(
        'SELECT COUNT(*) FROM bird_image_links'
    )->fetchColumn();

    $summary = [
        [
            'table_name' => 'birds',
            'row_count' => $bird_count,
            'purpose' => 'Species records'
        ],
        [
            'table_name' => 'bird_images',
            'row_count' => $image_count,
            'purpose' => 'Image file metadata'
        ],
        [
            'table_name' => 'bird_image_links',
            'row_count' => $link_count,
            'purpose' => 'Bird-to-image relationships'
        ],
    ];

} catch (PDOException $exception) {
    http_response_code(500);

    error_log(
        'asgn08 database error: ' . $exception->getMessage()
    );

    $error_message =
        'Database check failed. Check the server, credentials, '
        . 'and imported tables. See the local PHP error log for details.';
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>asgn08 - WNC Birds Database Check</title>
</head>

<body>

    <h1>WNC Birds Database Check</h1>

    <?php if ($error_message !== null): ?>

        <p><?= h($error_message) ?></p>

    <?php else: ?>

        <p>PDO connection and database queries: successful.</p>

        <p>Database: <?= h($database_name) ?></p>

        <table>
            <caption>Database record counts</caption>

            <thead>
                <tr>
                    <th scope="col">Table</th>
                    <th scope="col">Rows</th>
                    <th scope="col">Purpose</th>
                </tr>
            </thead>

            <tbody>

                <?php foreach ($summary as $item): ?>

                    <tr>
                        <th scope="row">
                            <?= h($item['table_name']) ?>
                        </th>

                        <td>
                            <?= h((string) $item['row_count']) ?>
                        </td>

                        <td>
                            <?= h($item['purpose']) ?>
                        </td>
                    </tr>

                <?php endforeach; ?>

            </tbody>
        </table>

        <p>
            This page displays the database record counts.
            The bird directory uses Active Record to retrieve and display bird information.
            Image galleries and image resizing are not included in this assignment.
        </p>

    <?php endif; ?>

    <p>
        <a href="birds.php">View WNC Bird Directory</a>
    </p>

</body>

</html>