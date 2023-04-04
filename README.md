<h1>How to SetUp</h1>

<p>
    Clone your project
    <br>
    Go to the folder application using cd command on your cmd or terminal
    <br>
    Run composer install on your cmd or terminal<br>
    Copy .env.example file to .env on the root folder. You can type copy .env.example .env if using command prompt Windows or cp .env.example .env if using terminal, Ubuntu
    <br>
    Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.
    <br>
    By default, the username is root and you can leave the password field empty. (This is for Xampp)
    <br>
    By default, the username is root and password is also root. (This is for Lamp)
    <br>
    Run php artisan key:generate
    <br>
    Run php artisan migrate
    <br>
    Run php artisan db:seed
    <br>
    Run php artisan serve
    <br>
    Go to 127.0.0.1:8000
</p>
