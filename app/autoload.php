<?php

/**
 * NOTICE OF LICENSE
 *
 * This source file is licensed exclusively to Laurie Plociennik.
 *
 * @copyright   Copyright © 2017 Laurie Plociennik
 * @license     All rights reserved
 * @author      Laurie Plociennik
 */

use Composer\Autoload\ClassLoader;
use Doctrine\Common\Annotations\AnnotationRegistry;

/** @var ClassLoader $loader */
$loader = require __DIR__.'/../vendor/autoload.php';

AnnotationRegistry::registerLoader([$loader, 'loadClass']);

return $loader;
