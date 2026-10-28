## Project Purpose

This project expands the WNC Birds database application from Assignment 07 by implementing the Active Record pattern using PHP, PDO, and the wnc_birds MySQL database. It allows users to view a directory of bird species and access individual bird details.

## Active Record Methods

find_all() — Retrieves all bird records, sorted alphabetically by common name.

find_by_id() — Uses a prepared SQL statement to retrieve a specific bird by its ID.

from_row() — Converts an associative database row into a Bird object.

Refactoring Explanation: Both find_all() and find_by_id() use the same from_row() method to turn database records into objects. This reduces duplicated code and makes it easier to maintain the class.

## Running locally

Local Setup:

Place the asgn08 folder inside the MAMP htdocs/web250 directory.

Start the Apache and MySQL servers in MAMP.

Configure the database connection locally using private/db_credentials.php.

Open the project at http://localhost:8888/web250/asgn08/public/index.php.

## Navigation URLs

Local Home: http://localhost:8888/web250/asgn08/public/index.php

Local Bird Directory: http://localhost:8888/web250/asgn08/public/birds.php

Local Bird Details: http://localhost:8888/web250/asgn08/public/bird.php?id=1

Hosted Home: https://ethanjbennett.com/web250/asgn08/public/index.php

Hosted Bird Directory: https://ethanjbennett.com/web250/asgn08/public/birds.php