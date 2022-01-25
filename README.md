# nlxSessionOptimizer

## About nlxSessionOptimizer

This plugin optimize session handling in shopware.

The cronjob Shopware_CronJob_nlxClearExpiredSessions clears all expired sessions by default every day.

To prevent the automatically cleanup of expired sessions, overwrite the shopware default config with this value

    'session' => [
        'gc_probability' => 0,
    ],

## Running Tests

### phpspec

    $ vendor/bin/phpspec-standalone.php7.2.phar

## License

Please see [License File](LICENSE) for more information.
