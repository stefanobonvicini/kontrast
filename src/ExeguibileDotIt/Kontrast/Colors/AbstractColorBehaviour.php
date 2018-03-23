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
 * Interface AbstractColorBehaviour.
 *
 * 
 *
 * @author Stefano Bonvicini <stefano.bonvicini@gmail.com>
 *
 * @see http://stefanobonvicini.altervista.org
 *
 */

interface AbstractColorBehaviour 
{

    /**
     * Method convertTo.
     *
     * @param int $sysID
     * 
     * @throws \RuntimeException
     *
     * @todo complete the logic
     *
     * @return self
     */
    public function convertTo($sysID);


    /**
     * Method setSupportedColorSystems
     *
     * @param ColorSystemsEnsambleBehaviour $cs
     * 
     * @return void
     */
    public static function setSupportedColorSystems(ColorSystemsEnsambleBehaviour $cs);

}


