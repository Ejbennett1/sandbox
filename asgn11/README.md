# WEB 250 - asgn10: Update and delete a bird

This assignment builds off of Assignment 9 by adding the Update and Delete portions of CRUD. Users can now create, view, update, and delete bird records through the website.

## Assignment goal

Complete all four CRUD operations using:

bird_new.php to create bird records.

birds.php and bird.php to view bird records.

bird_edit.php to update existing bird records.

bird_delete.php to delete bird records after confirmation.

Bird::update() and Bird::delete() methods using PDO prepared statements.

## Database

I continued using the existing wnc_birds database and birds table from the previous assignments.

The Update and Delete methods use WHERE id = :id to make sure only the selected bird record is affected.

## Credentials

I copied `private/db_credentials.example.php` to `private/db_credentials.php` and configured it to connect to my local MAMP MySQL database.

The credentials file is excluded from Git using `.gitignore` to prevent database usernames and passwords from being uploaded to GitHub.

## Active Record and MVC

Bird.php acts as the model and handles database operations using PDO prepared statements.

birds.php displays the bird directory, while bird_new.php, bird_edit.php, and bird_delete.php handle the forms and user interactions.

SQL statements are kept inside the Bird class rather than the public PHP pages.

## Update Functionality

When a user clicks Update, bird_edit.php uses a GET request to retrieve the selected bird using Bird::find_by_id().

The form is filled with the bird's existing information.

When the user submits the form, a POST request sends the updated values. The Bird::update() method uses a prepared UPDATE statement with named placeholders and bindValue() to update all six editable fields.

The common name and scientific name are required. After a successful update, the user is redirected to the bird's detail page.

## Delete Functionality

When a user clicks Delete, bird_delete.php uses a GET request to display the bird's ID, common name, and a confirmation message.

The user can either cancel or confirm the deletion.

The actual deletion only happens after submitting the confirmation form using POST.

The Bird::delete() method uses a prepared DELETE statement and binds the bird's ID as an integer.

After a successful deletion, the user is redirected to the bird directory.

## Git Workflow

Git Workflow

I created the dev-update-delete branch from main and completed the Assignment 10 development on that branch.

After testing, I committed the changes, pushed the development branch to GitHub, and merged it back into main.

## Running Locally

Running Locally

Start Apache and MySQL through MAMP.

Configure private/db_credentials.php with the local database settings.

Open http://localhost:8888/web250/asgn10/public/birds.php.

Use the Create, View, Update, and Delete links to manage bird records.

## Links

Links

GitHub: https://github.com/Ejbennett1/sandbox/tree/main/asgn10

Bluehost: https://ethanjbennett.com/web250/asgn10/public/birds.php



