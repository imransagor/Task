## Project Description
###### A simple signup &amp; login syslem using username and password.  
###### -signup   
###### -signin (username & password)  
###### -email verification  
###### -Forgot Password (using username)

## Installation Process
###### clone project
git clone https://github.com/imransagor/Task.git 

###### generate the application key
php artisan key:generate

###### clear cache & config
php artisan config:clear  
php artisan cache:clear

###### run the database migrations (Set the database connection in .env before migrating)
php artisan migrate

###### run server
php artisan serve
