# Republic of the Philippines

## Story

2020 has been a Hell of a year in many ways.
You got interested in the financial aspects and, to be more precise, the pandemic's effect on the inflation of the Philippine peso.
It is exhausting to always type it into the search box, so you started to use the ISO 4217 code instead, which is PHP.
More and more, there's this so-called "programming language" that's popping up. After a while you got curious and looked into it.
What you found was fascinating and sucked you in for a long and joyful journey…

Your task is to create an application to keep track your learning process.

## What are you going to learn?

- the basics of `PHP Syntax`
- use `OOP` with `PHP`
- connect to a database with `PDO`
- document your code with `phpDocumentor`

## Tasks

1. Create a `MySQL` database with name `intro_to_php` using `UTF-8` character set
    - New `intro_to_php` database is shown by the following MySQL statement: `SHOW DATABASES`

2. Create a `MySQL` table with name `learning_step`.
Make sure it has the following fields:
  - `id` as the primary key
  - `topic` a string to put the topics in
  - `is_learned` logical value to check if you learned the topic
  - `step` this number represents which topic comes after which
  - `created` a timestamp with the date and time the record was inserted
  - `last_updated` a timestamp with the date and time the record was last updated
    - New `learning_step` table is in `intro_to_php` database, which can be checked with the `SHOW TABLES FROM intro_to_php` statement.
The `DESCRIBE learning_step` statement should show that the table has the previously described fields (`id`, `topic`, `is_learned`, `step`, `created`, `last_updated`).

3. Create your own class in a `classes` folder with name `LearningStep` and without a namespace.
    - New `LearningStep` class exists in `classes/LearningStep.php` file.

4. Implement the `save(array values) : int` method which inserts data into the `learning_step` table and returns the `id` of the new record.
    - New `save(array values) : int` method exists in `LearningStep` class.
This method inserts data into `learning_step` and returns the `id` of the new record.

5. Implement the `find(int id) : ?object` method which selects data from the `learning_step` table by `id` and returns an `object` or `null`.
    - New `find(int id) : ?object` method exists in `LearningStep` class, that selects data from `learning_step` by `id` and returns the result or `null`, if empty.

6. Implement the `all() : object[]` method which selects all rows from the `learning_step` table and returns an array of objects.
    - New `all() : object[]` method exists in `LearningStep` class, that selects all rows from `learning_step` and returns the result as an array of objects.

7. Implement the `update(int id, array values) : void` method which updates data in the `learning_step` table by `id`.
    - New `update(int id, array values) : void` method exists in `LearningStep` class, that updates data in `learning_step` by `id`.

8. Implement the `delete(int id) : void` method which deletes data from the `learning_step` table by `id`.
    - New `delete(int id) : void` method exists in `LearningStep` class, that deletes data from `learning_step` by `id`.

9. Implement the list page that displays all learning steps
    - The page is available under `/index.php`
    - The data from `learning_step` table is loaded and displayed
    - The topics are sorted step-by-step and the already learned ones are at the bottom

10. Implement a form that allows you to add a learning step.
    - There is an `/add_learning_step.php` file with a form
    - The page is linked from the list page
    - There is a `POST` form with at least `topic` and `step` fields.
    - After submitting, you are redirected to "List learning steps" page. If `step` field is empty, store the next number in line.

11. Implement deleting a learning step.
    - There is a `/delete_learning_step.php` file
    - There should be a deletion link on every row of the "List learning steps" page
    - Deleting redirects you back to the list of learning steps

12. Implement setting a learning step as learned.
    - There is a `/learn_learning_step.php` file
    - There should be a learned link on every row of the "List learning steps" page
    - Setting as learned redirects you back to the list of learning steps

13. Add `PHPDoc` block comments for every class and function in your codebase.
    - There are `PHPDoc` block comments above every class and function

14. Document your code using `phpDocumentor` by executing the `php phpDocumentor.phar project:run -d "." -t "docs"` terminal command.
    - The `phpDocumentor.phar` file exists in the project's root folder
    - The `docs` folder exists and contains the generated documentation in `.html` files and can be read in a web browser.

## General requirements

None

## Hints

- `If` statements in `PHP` can work in case of assignments as well. You can avoid a common mistake by using `Yoda conditions`.
- You can easily check your databases or tables and try out different queries with a database administration tool. Notable mentions are [MySQL Workbench](https://www.mysql.com/products/workbench/) and [DataGrip](https://www.jetbrains.com/datagrip/).

## Background materials

- <i class="far fa-exclamation"></i> [Data Types and Data Structures of PHP](https://www.w3schools.com/php/php_datatypes.asp)
- <i class="far fa-video"></i> [Associative arrays](https://youtu.be/qTZJLJ3Gm6Q)
- <i class="far fa-video"></i> [PHP Syntax](https://youtu.be/MgDmC9cE5XU)
- <i class="far fa-video"></i> [PHP for Web Development](https://youtu.be/B1vC2zBC5wY)
- <i class="far fa-book-open"></i> [Function arguments in PHP](https://www.php.net/manual/en/functions.arguments.php)
- <i class="far fa-book-open"></i> [Comparison operators of PHP](https://www.php.net/manual/en/language.operators.comparison.php)
- <i class="far fa-exclamation"></i> [SoloLearn PHP tutorial](https://www.sololearn.com/Course/PHP/)
- <i class="far fa-book-open"></i> [PHP OOP](https://www.w3schools.com/php/php_oop_what_is.asp)
- <i class="far fa-candy-cane"></i> [Yoda conditions](https://knowthecode.io/yoda-conditions-yoda-not-yoda)
- <i class="far fa-video"></i> [PDO](https://youtu.be/kEW6f7Pilc4)
- <i class="far fa-book-open"></i> [Migrating from PHP 5.6 to PHP 7.x](https://www.php.net/manual/en/migration70.php)
- <i class="far fa-video"></i> [Rasmus Lerdorf: PHP in 2018](https://youtu.be/SvEGwtgLtjA)
- <i class="far fa-book-open"></i> [PHPDoc comments in PhpStorm](https://www.jetbrains.com/help/phpstorm/phpdoc-comments.html)
- <i class="far fa-exclamation"></i> [Installing phpDocumentor](https://docs.phpdoc.org/3.0/guide/getting-started/installing.html#installing-phpdocumentor)
- <i class="far fa-exclamation"></i> [Your First Set of Documentation](https://docs.phpdoc.org/3.0/guide/getting-started/your-first-set-of-documentation.html#your-first-set-of-documentation)
