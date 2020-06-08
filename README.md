## Getting Started
test on 
xampp with apache and mysql
**Make sure [composer](https://getcomposer.org/) has been installed !**
First, create `.env` file based from `.env.example`. Then 
run this command 
```bash
composer install
```

```bash
php artisan key:generate
```

```bash
php artisan migrate

# seeding data in table
php artisan migrate:refresh --seed
```

run development server by running these command:

```bash
php artisan serve
```

Open [http://127.0.0.1:8000/digimons](http://127.0.0.1:8000/digimons) with your browser to see the result
