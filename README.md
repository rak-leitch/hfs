Sample Laravel app for Article CRUD

## Installation with Laravel Sail

Clone the repository:

```bash
git clone git@github.com:rak-leitch/hfs.git
```
Copy the .env.example file to .env:
```bash
cp .env.example .env
```
Ensure the DB config is correct in .env:

```
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password
```

Install the dependancies:
 ```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```
Start Sail:
```
sail up
```
Generate the application key:
```
sail artisan key:generate
```
Finally, run the migrations:
```
sail artisan migrate
```
