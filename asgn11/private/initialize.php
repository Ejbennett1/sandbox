<?php

declare(strict_types=1);
session_start();

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

$dotenv->required([
    'DB_HOST',
    'DB_PORT',
    'DB_NAME',
    'DB_USER',
    'DB_PASS'
]);

require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/auth_functions.php';
require_once __DIR__ . '/classes/Database.php';
require_once __DIR__ . '/classes/Bird.php';
require_once __DIR__ . '/classes/Member.php';

$pdo = Database::connect();

Bird::set_database($pdo);
Member::set_database($pdo);