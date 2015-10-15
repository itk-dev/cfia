Setup guidelines
================

### CFIA 

```
vagrant up
vagrant ssh
/vagrant/site-setup.sh
```

Then, we import all configuration

```
drush  config-import sync
```

Get gulp up and running
-----------------------
Setup gulp

```
npm install
```

and run gulp
```
gulp
```

Resetting the admin password
----------------------------
Cifa comes with user and password: admin, admin else:

```
drush user-password admin --password=admin
```


Local (development) settings
----------------------------

Local developer settings can – and should – be kept in a local settings file:

```
vagrant ssh
cd /vagrant/htdocs
chmod a+w sites/default/
cp sites/example.settings.local.php sites/default/settings.local.php
chmod a+w sites/default/settings.local.php
```

Edit sites/default/settings.local.php and make the changes you want.

### Full error reporting

Add this to settings.local.php

```
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
```

### Disable Twig cache

Add this line:

```
$settings['container_yamls'][] = __DIR__ . '/services.local.yml';
```

and create the file sites/default/services.local.yml with this content:

```
parameters:
  twig.config:
    debug: true
    auto_reload: true
    cache: false
```

Finally, edit sites/settings.local.php and uncomment these lines
```
if (file_exists(__DIR__ . '/settings.local.php')) {
  include __DIR__ . '/settings.local.php';
}
```

Clear cache and start hacking
```
drush cache-rebuild
```


# Deploying on server

1. Perform a backup

    ```
    cd htdocs
    drush archive-dump
    ```

2. Clone any new modules

    ```
    cd htdocs/modules
	git clone «…»
    ```

3. Checkout release

    ```
    cd htdocs/sites/all
    git checkout master
	git pull
    git checkout «some release tag»
	```

4. Import partial configuration

    ```
    drush config-import --partial
	drush cache-rebuild
	drush updatedb
    ```

-------------------------------------------------------------------------------
