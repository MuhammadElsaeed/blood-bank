# Blood Bank
REST API backend for an android blood bank application using Laravel framework

## Running Localy
## Step 1
clone the repository
```sh
git clone https://github.com/MuhammadAlsaied/blood-bank.git # or clone your own fork
```

## Step 2
open your terminal and 'cd' to source code directory, then run composer install command to install all  different packages.
```sh
composer install
```

## Step 3
open .env file and provide your database information and make sure that your database is up and running
```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task-test
DB_USERNAME=root
DB_PASSWORD=""
```

## Step 4
run migrations
```sh
php artisan migrate --seed
```

## Step 5
start your server
```sh
php artisan serve –port=8888
```
Your app should now be running on [localhost:8888](http://localhost:8888).
