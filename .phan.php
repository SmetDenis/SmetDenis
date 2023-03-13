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

$default = include __DIR__ . '/vendor/jbzoo/codestyle/src/phan.php';

return \array_merge($default, [
    'directory_list' => [
        'src',
    ],
]);
