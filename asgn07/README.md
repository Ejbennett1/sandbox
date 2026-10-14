# asgn07 README

## 1. Why does this many-to-many design use three tables instead of putting one bird_id in bird_images?

The design uses three tables because one bird can have multiple images, and one image can also be connected to multiple birds. The bird_image_links table creates the many-to-many relationship without duplicating bird or image records.

## 2. What happens to the links, image records, and physical JPEG files when a species record is deleted?

When a species record is deleted, the related rows in bird_image_links are automatically deleted because of ON DELETE CASCADE. The image records in bird_images and the physical JPEG files are not deleted.

## 3. What does the PDO DSN contain, and why is Database::$connection static?

The PDO DSN contains the database driver, host, port, database name, and character set. Database::$connection is static so the same PDO connection can be reused during the current PHP request instead of creating a new connection each time.

## 4. What is the difference between query() and fetchColumn() in the count example?

query() sends the SQL statement to the database and returns a PDOStatement object. fetchColumn() retrieves one value from the query result, which is useful for returning a count.

## Database Counts

- birds: 8
- bird_images: 17
- bird_image_links: 18

## Connection Error Test

I temporarily changed the database name in db_credentials.php to an invalid database name. The page displayed the generic database failure message, and the detailed error was written to the PHP error log. After restoring the database name to wnc_birds, the page worked normally again.