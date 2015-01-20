# Bugsnag for Rocketeer

Track your deploys in Bugsnag using their [tracking api](https://bugsnag.com/docs/deploy-tracking-api)

## Installation

`composer require rocketeers/rocketeer-bugsnag`

Then you'll need to set it up, so do `artisan config:publish rocketeers/rocketeer-bugsnag` and complete the configuration in `app/packages/rocketeers/rocketeer-bugsnag/config.php` :

- key: Your Bugsnag project API key

Once that's done add the following to your providers array in `app/config/app.php` :

```php
'Rocketeer\Plugins\Bugsnag\RocketeerBugsnagServiceProvider',
```

Enjoy