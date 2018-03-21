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
 * Interface ColorObjectBehaviour.
 *
 * 
 *
 * @author Stefano Bonvicini <stefano.bonvicini@gmail.com>
 *
 * @see http://stefanobonvicini.altervista.org
 *
 */

interface ColorObjectBehaviour 
{

    /**
     * Method __clone.
     * 
     * @return 
     */
    public function __clone();


    /**
     * Method setUndefined
     * Make color undefined setting its 
     * params to null
     *
     * @return self
     */
    public function setUndefined();


    /**
     * Method isUndefined.
     *
     * @return bool true if the color is not defined
     */
    public function isUndefined();

}


