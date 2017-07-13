<!--h-->
# Control Panel

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/107141c2158147599733881169b801a7)](https://www.codacy.com/app/laravel-enso/ControlPanel?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=laravel-enso/ControlPanel&amp;utm_campaign=Badge_Grade)
[![StyleCI](https://styleci.io/repos/94111370/shield?branch=master)](https://styleci.io/repos/94111370)
[![License](https://poser.pugx.org/laravel-enso/controlpanel/license)](https://https://packagist.org/packages/laravel-enso/controlpanel)
[![Total Downloads](https://poser.pugx.org/laravel-enso/controlpanel/downloads)](https://packagist.org/packages/laravel-enso/controlpanel)
[![Latest Stable Version](https://poser.pugx.org/laravel-enso/controlpanel/version)](https://packagist.org/packages/laravel-enso/controlpanel)
<!--/h-->

This package pulls data from the [Control Panel API](https://github.com/laravel-enso/ControlPanelApi) package, running on a [Laravel Enso](https://github.com/laravel-enso/Enso) app.

### Features

- allows you to choose the information you want to display/monitor
- permits clearing the logs for each monitored application
- it refresh the data at the given interval (min 1 minute) 
- you may put the monitored application in maintenance mode (you need to log into the server to put it back up)

### Installation Steps

* Add `'LaravelEnso\ControlPanel\ControlPanelServiceProvider::class'` to your providers list in `config/app.php`.
* Run the migrations. 
* Use the FE to add the applications you want to monitor, providing the necessary credentials

<!--h-->
### Contributions

are welcome. Pull requests are great, but issues are good too.

### License

This package is released under the MIT license.
<!--/h-->