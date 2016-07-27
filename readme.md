# Game Card Manager Application

## System Requirements
1. Web server(optional)
2. PHP >= 5.6
3. Mysql
4. Composer (https://getcomposer.org/download/)
5. git (https://git-scm.com/)

##Steps
1. Clone the repo using git or download the zip and extract it.
2. In your .env file change DB_HOST, DB_DATABASE,DB_USERNAME and DB_PASSWORD according to your settings.
3. From terminal/command prompt go to the app directory using cd command.
4. Type composer install and press enter.
5. Type php artisan migrate and press enter.
6. Type php artisan db:seed and press enter.
7. Type php artisan serve and press enter. Open the displayed url in web browser.
