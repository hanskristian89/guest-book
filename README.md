# Guest Book by Yohanes Hans Kristian

## Installation
1. Clone project using `git clone https://github.com/hanskristian89/guest-book.git` or download zip and extract it.
2. Go to the project folder and rename `.env.example` to `.env`.
3. Make sure to adjust `DB_USERNAME` and `DB_PASSWORD` field in `.env` file correspond to your configuration.
4. Create database with `laravel` as the its name.
5. Open your CLI and direct it to the project folder.
6. Run commands below in order:
    - `composer install`
    - `php artisan key:generate`
    - `php artisan migrate --seed`
    - `php artisan update:grab-data-province`
    - `php artisan update:grab-data-city`
7. Run `php artisan serve` to access the website.
8. Go to 127.0.0.1:8000 and you are ready to go.

## Front End
1. User can add guest data in the main page.
2. The city input form will automatically appear after the user selects a province, and the choice of city according to the selected province.
3. User must fill out the entire form.

## Back End
1. Admin login username/email: "admin@guestbook.com", password: "adminguestbook".
2. Admin can add, read, edit, and delete guest list.
3. In the Add Guest Data page, the city input form will automatically appear after the user selects a province, and the choice of city according to the selected province.
4. If Admin wants to delete guest data, a confirmation box will appear.
5. Delete data will only change the status of data to "Inactive", and the data will disappear from the list, but still in database.
