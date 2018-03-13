<?php	

/**
 * This file is part of ExeguibileDotIt Package
 *
 * @copyright 2018 Stefano Bonvicini <stefano.bonvicini@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

namespace ExeguibileDotIt\Kontrast;

/**
 * APP PATHS
 */
define(__NAMESPACE__ . '\APP_ROOT_DIR', __DIR__ . DIRECTORY_SEPARATOR);



/**
 * COMPOSER AUTOLOADER
 * BOOTSTRAP 
 */
include namespace\APP_ROOT_DIR. implode(DIRECTORY_SEPARATOR, array('vendor', 'autoload.php'));

