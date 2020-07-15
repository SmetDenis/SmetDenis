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

namespace JBZoo\PHPUnit;

/**
 * Class SmetDenisCopyrightTest
 *
 * @package JBZoo\PHPUnit
 */
class SmetDenisCopyrightTest extends AbstractCopyrightTest
{
    /**
     * @var string
     */
    protected $packageName = 'Readme';

    /**
     * @var string
     */
    protected $packageVendor = 'SmetDenis';

    /**
     * @var string
     */
    protected $packageCopyright = 'Copyright (C) Denis Smetannikov, All rights reserved.';

    /**
     * @var string
     */
    protected $packageLink = 'https://github.com/SmetDenis';
}
