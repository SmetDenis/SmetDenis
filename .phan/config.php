<?php

/**
 * SmetDenis - Readme
 *
 * This file is part of the SmetDenis project.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package    Readme
 * @license    MIT
 * @copyright  Copyright (C) Denis Smetannikov, All rights reserved.
 * @link       https://github.com/SmetDenis
 */

declare(strict_types=1);

$default = include __DIR__ . '/../vendor/jbzoo/codestyle/src/phan/default.php';

$phanConfig = array_merge($default, [
    'directory_list' => [
        'src',
    ]
]);

$phanConfig['plugins'][] = 'NotFullyQualifiedUsagePlugin';
$phanConfig['plugins'][] = 'UnknownElementTypePlugin';

return $phanConfig;
