# How to Run the Laravel-Events_Club
## Prerequisites

XAMPP installed
PHP installed
Composer installed
Git installed

## Steps

### 1. Clone the repository
bashCopy git clone https://github.com/asukulu/Laravel-Events_Club.git

### 2. Navigate to the project directory
bashCopy cd Laravel-Events_Club

### 3. Install dependencies
bashCopy composer install

### 4. Set up the environment file
bashCopycp .env.example .env
php artisan key:generate

### 5. Configure the database connection

Open the .env file and update the database settings:
CopyDB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=



### 6. Start XAMPP

Launch XAMPP Control Panel
Start Apache and MySQL services
Click on "Admin" next to MySQL to open phpMyAdmin in your browser
Create a new database named "laravel" if it doesn't exist


### 7. Run database migrations
bashCopyphp artisan migrate

This will create all necessary tables in the database


### 8. Seed the database (optional)
bashCopyphp artisan db:seed

This will populate the database with sample data, if available


### 9. Start the development server
bashCopyphp artisan serve

The website will be accessible at http://127.0.0.1:8000


### 10. Access the website

Open your browser and navigate to http://127.0.0.1:8000



## Troubleshooting

If you encounter any database connection issues, make sure MySQL is running in XAMPP
If you get a 500 error, check the Laravel logs at storage/logs/laravel.log
For permission issues, ensure the storage and bootstrap/cache directories are writable
