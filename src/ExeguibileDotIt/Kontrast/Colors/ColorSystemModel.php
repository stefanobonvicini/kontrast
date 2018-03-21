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

namespace ExeguibileDotIt\Kontrast\Colors;

/** 
 * Trait ColorSystemModel.
 *
 * 
 *
 * @author Stefano Bonvicini <stefano.bonvicini@gmail.com>
 *
 * @see http://stefanobonvicini.altervista.org
 *
 */

Trait ColorSystemModel 
{

    /** 
     * @var int $ID 
     *
     */
    protected static $ID;

    /**
     * Method getSystemID.
     * Returns the ID of the ColorSystem
     *
     * @return mixed ID of the color system
     */
    public static function getSystemID()
    {

        return self::$ID;

    }


    /**
     * Method setSystemID.
     *
     * @param mixed $id
     *
     * @throws \InvalidArgumentException
     *
     * @return void
     */
    public static function setSystemID($id)
    {
        
        self::$ID = $id;

    }
          
}


