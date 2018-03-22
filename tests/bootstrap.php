<?php

/**
 * This file is part of ExeguibileDotIt
 *
 * @copyright 2015 Stefano Bonvicini <stefano.bonvicini@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 **/


list($loaderpath, ) = explode('vendor', __DIR__);

$loaderpath .= 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

$autoloader = require($loaderpath);
