<?php

declare(strict_types=1);

require_once __DIR__ . '/../private/initialize.php';

log_out_member();

header('Location: birds.php');
exit;