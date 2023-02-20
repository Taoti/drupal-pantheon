# taoti/drupal-pantheon

This project provides managed versions of Taoti Drupal ops file for sites
that are hosted on Pantheon. Generally should be used with `taoti/drupal-profile`.

## Enabling this project

Use with `taoti/drupal-profile` and everything will work out of the box for scaffolding.

`.lando.base.yml` should be committed to the project to ensure those using Lando don't have to run an
initial `composer install` outside of lando.

Additionally, anything in `.github` should be committed.

## Features

### Lando base setup
Provides a base lando file `.lando.base.yml` for working with Pantheon/Drupal 10 sites.
