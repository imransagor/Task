## Project Description
###### A simple signup &amp; login syslem using username and password.  
###### -signup   
###### -signin (username & password)  
###### -email verification  
###### -Forgot Password (using username)

## Installation Process
###### clone project
git clone https://github.com/imransagor/Task.git 

###### install dependencies
composer install  
npm install

###### create .env file and generate the application key
cp .env.example .env  
php artisan key:generate

###### clear cache & config
php artisan config:clear  
php artisan cache:clear

###### run the database migrations (Set the database connection in .env before migrating)
php artisan migrate

###### build CSS and JS assets
npm run dev

###### run server
php artisan serve
