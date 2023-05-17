# CFIA local development

## Local setup

Create the file `web/sites/default/settings.local.php` and add:

```php
<?php
/**
 * @file
 * Local settings.
 */

/**
 * Add development service settings.
 */
if (file_exists(__DIR__ . '/services.local.yml')) {
  $settings['container_yamls'][] = __DIR__ . '/services.local.yml';
}

/**
 * Disable CSS and JS aggregation.
 */
$config['system.performance']['css']['preprocess'] = FALSE;
$config['system.performance']['js']['preprocess'] = FALSE;

/**
 * Disable caching.
 */
$settings['cache']['bins']['render'] = 'cache.backend.null';
$settings['cache']['bins']['dynamic_page_cache'] = 'cache.backend.null';
$settings['cache']['bins']['page'] = 'cache.backend.null';

/**
 * Setup logging.
 */
$config['system.logging']['error_level'] = 'verbose';

/**
 * Set Hash salt value.
 */
$settings['hash_salt'] = 'GIVE_ME_STRING';

/**
 * Set trusted host pattern.
 */
$settings['trusted_host_patterns'] = [
  '^cfia\.local\.itkdev\.dk$',
];

/**
 * Set local db.
 */
$databases['default']['default'] = [
  'database' => getenv('DATABASE_DATABASE') ?: 'db',
  'username' => getenv('DATABASE_USERNAME') ?: 'db',
  'password' => getenv('DATABASE_PASSWORD') ?: 'db',
  'host' => getenv('DATABASE_HOST') ?: 'mariadb',
  'port' => getenv('DATABASE_PORT') ?: '',
  'driver' => getenv('DATABASE_DRIVER') ?: 'mysql',
  'prefix' => '',
];

/**
 * Set config directory.
 */
$settings['config_sync_directory'] = '../config/sync';
```

Start docker and install site

```sh
docker-compose pull
docker-compose up --detach
docker-compose exec phpfpm composer install
docker-compose exec phpfpm vendor/bin/drush --yes site:install --existing-config
# Get admin sign in url
docker-compose exec phpfpm vendor/bin/drush --yes --uri="http://cfia.local.itkdev.dk" user:login
```