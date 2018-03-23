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
 * Interface ColorSystemsEnsambleBehaviour.
 *
 * 
 *
 * @author Stefano Bonvicini <stefano.bonvicini@gmail.com>
 *
 * @see http://stefanobonvicini.altervista.org
 *
 */

interface ColorSystemsEnsambleBehaviour extends \Countable
{

    /**
     * Method defineColorSystem.
     *
     * @param ColorSystemBehaviour $cs
     *
     * @param mixed $identifier
     * 
     * @return self
     */
    public function defineColorSystem(ColorSystemBehaviour $cs, $identifier);
    
    
    /**
     * Method getSystemObject
     *
     * @param int $sysID identifier of the required color system
     * 
     * @throws \InvalidArgumentException
     * @throws \OutOfRangeException
     *
     * @return ColorSystemBehaviour
     */
    public function getSystemObject($sysID = null);

}


