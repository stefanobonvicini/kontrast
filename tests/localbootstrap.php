<?php

/*
 * This file is part of ExeguibileDotIt Library.
 *
 * (c) 2014 Stefano Bonvicini
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace ExeguibileDotIt;

/**
 * Autoloads Classes.
 *
 * @author Stefano Bonvicini <stefano.bonvincini@gmail.com>
 */

class Autoloader
{
    /**
     * Registers Autoloader as an SPL autoloader.
     *
     * @param bool    $prepend Whether to prepend the autoloader or not.
     */

    protected static $AUTOLOAD_ROOT_DIR = null;

    const NAMESPACE_ROOT = 'ExeguibileDotIt';

    public static function register($prepend = false)
    {

        if (version_compare(phpversion(), '5.3.0', '>=')) {

            spl_autoload_register(array(__CLASS__, 'autoload'), true, $prepend);

        } else {

            spl_autoload_register(array(__CLASS__, 'autoload'));

        }

        //Otherwise ExeguibileDotit\ROOT_DIR defined in bootstrap

        self::$AUTOLOAD_ROOT_DIR = realpath(dirname(__FILE__) . DIRECTORY_SEPARATOR . 

            '..' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 

            self::NAMESPACE_ROOT . DIRECTORY_SEPARATOR);

    }

    /**
     * Handles autoloading of classes.
     *
     * @param string $class A class name.
     */
    public static function autoload($class)
    {   

        if (0 !== strpos($class, self::NAMESPACE_ROOT)) {

            return;

        }

        $file = str_replace(array(self::NAMESPACE_ROOT, '\\'), array(self::$AUTOLOAD_ROOT_DIR, '/'), $class) . '.php';

        //error_log("Trying to load {$class} via {$file}\n");

        if (file_exists($file)){

            require $file;

        } else {

            throw new \RunTimeException("Unable to load required class {$class} from {$file} in " .  self::$AUTOLOAD_ROOT_DIR . "\n");

        }

    }

}


Autoloader::register();
