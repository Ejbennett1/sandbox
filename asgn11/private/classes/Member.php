<?php

declare(strict_types=1);

final class Member
{
    private static PDO $database;

    public static function set_database(PDO $database): void
    {
        self::$database = $database;
    }

    public static function find_by_username(string $username): ?array
    {
        $sql = "SELECT * FROM members WHERE username = :username";
        $statement = self::$database->prepare($sql);
        $statement->execute(['username' => $username]);

        return $statement->fetch() ?: null;
    }

    public static function find_by_email(string $email): ?array
    {
        $sql = "SELECT * FROM members WHERE email = :email";
        $statement = self::$database->prepare($sql);
        $statement->execute(['email' => $email]);

        return $statement->fetch() ?: null;
    }

    public static function find_by_id(int $id): ?array
    {
        $sql = "SELECT id, first_name, last_name, email, username, role, created_at
                FROM members WHERE id = :id";

        $statement = self::$database->prepare($sql);
        $statement->execute(['id' => $id]);

        return $statement->fetch() ?: null;
    }

    public static function register(array $data): bool
    {
        $sql = "INSERT INTO members
                (first_name, last_name, email, username, password_hash, role)
                VALUES
                (:first_name, :last_name, :email, :username, :password_hash, 'member')";

        $statement = self::$database->prepare($sql);

        return $statement->execute([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'username' => $data['username'],
            'password_hash' => password_hash(
                $data['password'],
                PASSWORD_DEFAULT
            )
        ]);
    }
}
