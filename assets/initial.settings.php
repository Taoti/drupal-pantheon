<?php

/**
 * Load services definition file.
 */
$settings['container_yamls'][] = __DIR__ . '/services.yml';

/**
 * Include the Pantheon-specific settings file.
 */
include __DIR__ . "/settings.pantheon.php";

/**
 * Include Taoti specific settings.
 */
include __DIR__ . "/settings.taoti.php";


/**
 * If there is a local settings file, then include it
 */
$local_settings = __DIR__ . "/settings.local.php";
if (file_exists($local_settings)) {
    include $local_settings;
}