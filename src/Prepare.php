<?php

namespace Taoti\DrupalPantheon;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

/**
 * Prepare a code base for deploy.
 */
class Prepare
{

    /**
     * Remove files that shouldn't be pushed to destination.
     *
     * Currently only .git dirs
     *
     * @return void
     */
    public static function cleanup()
    {
        $dirsToDelete = [];
        $finder = new Finder();
        foreach (
            $finder
                ->directories()
                ->in(getcwd())
                ->ignoreDotFiles(false)
                ->ignoreVCS(false)
                ->depth('> 0')
                ->name('.git')
            as $dir) {
            $dirsToDelete[] = $dir;
        }
        $fs = new Filesystem();
        $fs->remove($dirsToDelete);
    }

    /**
     * Fix up .gitignore: remove everything above the "::: cut :::" line
     *
     * @return void
     */
    public static function updateIgnoreFiles()
    {
        $ignoreFiles = [
            $_ENV['GITHUB_WORKSPACE'] . '/.gitignore',
            $_ENV['GITHUB_WORKSPACE'] . $_ENV['THEME_DIR'] . '/.gitignore',
        ];
        foreach ($ignoreFiles as $file) {
            $contents = file_get_contents($file);
            $contents = preg_replace('/.*::: cut :::*/s', '', $contents);
            file_put_contents($file, $contents);
        }
    }

}
