# CFIA
Site for cfiaarhus.dk

## Installation instructions for development
Setup Docker environment (Optional):
```
itkdev-docker-compose up -d
```
Get php packages
```
itkdev-docker-compose composer install
```
Setup local site configuration:
```
cp web/sites/default/_docker.settings.local.php web/sites/default/docker.settings.local.php
```
Install site:
```
itkdev-docker-compose vendor/bin/drush site-install minimal --existing-config -y
```

## Sync files and DB
```
itkdev-docker-compose sync
```