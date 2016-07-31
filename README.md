## Task description

Please write a PHP web application and send us back a github link.

- Wait for a user action, like clicking buttons. According to these actions some data (see further below) should be:
    - either shown nicely formatted on the screen
    - or downloaded as CSV file
- You can either download the data on each request during the runtime of your PHP program or load the data from a database (in this case do NOT provide a DB dump, but a script which automatically transfers the data from the remote location to the DB)
- preferably the implementation should be written in "clean code", separate concerns using pattern like MVC, be object oriented, very good testable, best even already contain Unit tests and maybe even follow the KISS and SOLID principles

## Setup

* Load PHP server inside the /../web/ folder using 'php -S localhost:8000'
* Run 'composer install' inside the root folder to install dependencies

## Technologies Used

Backend: PHP, Silex
Front-End: Bootstrap framework with HTML5, CSS
