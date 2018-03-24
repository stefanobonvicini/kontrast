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
 * Interface ColorSystemBehaviour.
 *
 * This interface defines a ColorSystem as an abstraction:
 *
 * - a transform to and from a given rappresentation the RGB one
 *
 * - an integer ID identifing uniquely the color system
 *
 * In this way a passage from a ColorSpace rappresentation to another one is done in this way:
 *
 * ```php
 *
 * B = new BColor();
 * A = new AColor(param1, param2, param3);
 *
 * B->fromRGB(A->toRGB());
 *
 *```
 * @todo toRGB method could recive an RGBColor as argument and return it defined
 * to reduce coupling  
 *
 * @author Stefano Bonvicini <stefano.bonvicini@gmail.com>
 *
 * @see http://stefanobonvicini.altervista.org
 *
 */

interface ColorSystemBehaviour
{

    /**
     * Method toRGB.
     *
     * @return RGBColor object
     */
    public function toRGB();
    

    /**
     * Method fromRGB. Sets up object
     * params by RGBColor object
     *
     * @param RGBColor $color
     *
     * @return self
     */
    public function fromRGB(RGBColor $color);


    /**
     * Method getSystemID.
     * Returns the ID of the ColorSystem
     *
     * @return int ID of the color system
     */
    public static function getSystemID();


    /**
     * Method setSystemID.
     *
     * @param int $id
     *
     * @throws \InvalidArgumentException
     *
     * @return void
     */
    public static function setSystemID($id);

}


