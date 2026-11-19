<?php

declare(strict_types=1);

function is_logged_in(): bool
{
    return isset($_SESSION['member_id']);
}

function require_login(): void
{
    if (!is_logged_in()) {
        header('Location: login.php');
        exit;
    }
}

function log_in_member(array $member): void
{
    session_regenerate_id(true);

    $_SESSION['member_id'] = $member['id'];
    $_SESSION['username'] = $member['username'];
    $_SESSION['role'] = $member['role'];
}

function log_out_member(): void
{
    unset(
        $_SESSION['member_id'],
        $_SESSION['username'],
        $_SESSION['role']
    );

    session_regenerate_id(true);
}
