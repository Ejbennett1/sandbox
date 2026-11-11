# WEB 250 - asgn09: Create a Record

This assignment builds off of assignment 8 by adding the create portion of CRUD. Users can now add bird records through an HTML form. 

## Assignment goal

Add the **Create** portion of CRUD using:

- `public/bird_new.php`
- a `Bird::create()` instance method
- a PDO prepared `INSERT`
- named placeholders and `bindValue()`

## Database

Use the existing `wnc_birds` database and `birds` table from the previous assignments.

## Credentials

I copied `private/db_credentials.example.php` to `private/db_credentials.php` and configured it to connect to my local MAMP MySQL database.

The credentials file is excluded from Git using `.gitignore` to prevent database usernames and passwords from being uploaded to GitHub.

## Active Record and MVC

Bird.php acts as the model and handles database operations, while birds.php acts as the directory view that displays the bird records. bird_new.php handles form submissions and displays the Create Bird form.

## Create Functionality

When a user submits the form, the values are copied into a Bird object. The create() method uses a PDO prepared INSERT statement with named placeholders and bindValue() to safely insert the values into the database.

After a successful insert, the new record receives an automatically generated ID, and the user is redirected to the bird directory.

## Git Workflow

I created the dev-create branch from main and completed the assignment on that branch. After testing, the changes are committed, pushed to GitHub, and merged back into main.

## Running Locally

Start Apache and MySQL through MAMP.

Configure private/db_credentials.php with the local database settings.

Open http://localhost:8888/web250/asgn09/public/birds.php.

Click Create Bird to add a new record.

## Links

GitHub: https://github.com/Ejbennett1/sandbox/tree/main/asgn09
BlueHost: https://ethanjbennett.com/web250/asgn09/public/birds.php


## Student README TODO

Before submitting asgn09, replace or expand this README with the information requested in the assignment instructions, including your create flow, prepared-statement explanation, MVC direction, Git branch workflow, and final URLs.
