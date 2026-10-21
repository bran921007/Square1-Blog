# Supported PHP and Laravel runtime

This application now requires Laravel 12 and PHP 8.2.35 or a patched compatible 8.3, 8.4 or 8.5 runtime. The lock file was resolved on PHP 8.2.35. Keep the existing application structure, controller namespaces, database schema and routes.

Install with `composer install`, configure your local environment, then run `php artisan package:discover`, `php artisan route:list` and the complete test suite (`vendor/bin/phpunit` or `vendor/bin/pest`). Tests use SQLite in memory and an explicitly synthetic application key. Never run tests against production credentials or databases.

The framework now supplies proxy, CORS and maintenance middleware. Legacy factories remain supported to preserve seeders and existing tests. Existing database tables and data do not need to be replaced. Deployments must retain their existing application key and environment configuration.

Validation was performed locally in a network-disabled PHP 8.2.35 container, with synthetic SQLite data. Existing frontend assets and external integrations require their own staging checks before deployment; this change does not deploy the application.
