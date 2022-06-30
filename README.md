# taoti/drupal-ops

This project provides managed versions of Taoti Drupal ops file for sites
that are hosted on Pantheon. Generally should be used with taoti/drupal-ops.

## Enabling this project

This project must be enabled in the top-level composer.json file, or it will be
ignored and will not perform any of its functions. `.lando.base.yml` should be
committed to the project to ensure those using lando don't have to run an
initial `composer install` outside of lando.
```
{
    ...
    "require": {
        "taoti/drupal-pantheon"
    },
    ...
    "extra": {
        "drupal-scaffold": {
            "allowed-packages": [
                "taoti/drupal-pantheon"
            ]
        }
    }
}
```
