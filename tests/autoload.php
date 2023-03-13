<?php

/**
 * SmetDenis - Readme.
 *
 * Denis Smetannikov - Personal Dashboard on GitHub.
 *
 * @license    MIT
 * @copyright  SmetDenis/Readme. All rights reserved.
 * @see        https://github.com/SmetDenis
 */

declare(strict_types=1);

// main autoload
if ($autoload = \realpath('./vendor/autoload.php')) {
    require_once $autoload;
} else {
    echo 'Please execute "composer update" !' . \PHP_EOL;
    exit(1);
}
