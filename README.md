# phpProject
Setup

1. Download or clone the repo

2. Put this repo in your xampp/htdocs folder

3. Create a database called moviesdb

4. In the database create a table movies with 5 columns
 - id [type int/auto increment]
 - title [type varchar]
 - description [type text/is nullable]
 - imdb_rating [type int]
 - release_year [type int]

5. Create a table users with 4 columns
 - id [type int/auto increment]
 - username [type varchar]
 - password [type varchar]
 - role [type varchar]

6. Add some records to the table

7. Edit phpProject/moviesapp/app/core/App.php file
  - change define('PROJECT_URL', '...')
  to
  define('PROJECT_URL', 'http://localhost/phpProject-main/moviesapp');
  
  - change define('SERVER_PATH', '...')
  to
  define('SERVER_PATH', '[PATH_TO_XAMPP]\htdocs\phpProject-main\moviesapp');
  
