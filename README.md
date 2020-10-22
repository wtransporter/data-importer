## CSV File Import

Simple application for CSV import:

- Register
- Login
- Admin and member role

## Api endpoint

- api/clients (list of clients grouped by gender)

## Run project

Download / clone project. Navigate to project folder.</br>
Install composer dependencies (composer install).</br>
Install npm dependencies (npm install).</br>
Create .env file (copy from .env.example).</br>
Generate application key (php artisan key:generate).</br>
Create empty DB and set up .env file with database information.</br>
Run migrations. Seed database.</br>
Users table contains two demo users:</br>
admin@test.com with role admin</br>
member@test.com with role member (passwords 12345678).</br>
Test file is in demo directory.

## License

The application is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
