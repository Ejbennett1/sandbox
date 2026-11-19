# WEB-250 - asgn11: Members, Login, and Bird Permissions

This assignment builds off of Assignment 10 by adding member registration, login, logout, and authentication to the existing WNC Birds application.

## Assignment goal

The goal of this assignment is to control which users have access to the CRUD operations based on whether they are logged in.


## Visitors

- Can view the bird directory.
- Can view individual bird records.
- Can register for an account.
- Can log in.
- Cannot create, update, or delete bird records.

## Members

- Can create bird records.
- Can view bird records.
- Can update bird records.
- Can delete bird records.
- Can log out.

## Database

I continued using the existing wnc_birds database from the previous assignments.

I added a members table to store member information, usernames, hashed passwords, roles, and registration dates.

All newly registered users automatically receive the member role.

## Composer

I used Composer to install the vlucas/phpdotenv package.

This package allows the application to retrieve database credentials from environment variables.

The composer.json and composer.lock files are included in GitHub, while the vendor directory is excluded using .gitignore.


## Credentials

I moved the database credentials from db_credentials.php into a .env file.

The .env file is excluded from GitHub using .gitignore to prevent sensitive database information from being exposed.

The .env.example file is included to show which environment variables are required.

## Member Registration

I created a Member class to handle member-related database operations using PDO prepared statements.

The registration form checks for:

- Required fields.
- Valid email addresses.
- Duplicate usernames.
- Duplicate email addresses.
- Passwords containing at least eight characters.
- Matching passwords.

## Password Protection

Passwords are hashed using password_hash() before being stored in the database.

The login page uses password_verify() to verify the entered password against the stored password hash.

Passwords are not stored as plain text in the database or session.

## Git Workflow

I created the dev-users-login branch from main and completed Assignment 11 development on that branch.

I made separate commits for Composer configuration, member registration, authentication, and Bird CRUD permissions.

## Running Locally

1. Start Apache and MySQL through MAMP.
2. Run composer install if the vendor directory is missing.
3. Create a .env file using .env.example as a template.
4. Configure the database credentials.
5. Create the members table in the wnc_birds database.
6. Open http://localhost:8888/web250/asgn11/public/birds.php.

## Links

GitHub: https://github.com/Ejbennett1/sandbox/tree/main/asgn11

Bluehost: https://ethanjbennett.com/web250/asgn11/public/birds.php



