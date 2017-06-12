# StatisticsManager

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/16b923e371364c2da8655c84a0455007)](https://www.codacy.com/app/laravel-enso/StatisticsManager?utm_source=github.com&utm_medium=referral&utm_content=laravel-enso/StatisticsManager&utm_campaign=badger)

The package depends on the Laravel/Passport official package.

### Installation

Follow the standard steps for completing the Passport package install:
* Add `Laravel\Passport\PassportServiceProvider::class,` to your providers list in `config/app.php`.
* run `php artisan migrate`
* run `php artisan passport:install`
* put  `Passport::routes()` within the boot method of the `AuthServiceProvider` class
* set `'driver' => 'passport',` inside `config/auth.php` for the api guard.
* publish the laravel passport FE components: `php artisan vendor:publish --tag=passport-components`
* register the components in `resources/assets/js/app.js`
* compile the js assets `npm run dev`, `gulp`, etc.
* include the component `<passport-clients></passport-clients>` where desired.

Next steps are required for this package:

* Add `'LaravelEnso\StatisticsManager\StatisticsManagerServiceProvider::class'` to your providers list in `config/app.php`.
* Run the migrations. 
* Use the FE to define an OAuth client, and take note of the ID and the secret.