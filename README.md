# StatisticsManager

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/107141c2158147599733881169b801a7)](https://www.codacy.com/app/laravel-enso/ControlPanel?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=laravel-enso/ControlPanel&amp;utm_campaign=Badge_Grade)
[![StyleCI](https://styleci.io/repos/94111370/shield?branch=master)](https://styleci.io/repos/94111370)

The package depends on the Laravel/Passport official package.

### Installation

Follow the standard steps for completing the [Passport package install](https://laravel.com/docs/5.4/passport#installation), also reproduced below:
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