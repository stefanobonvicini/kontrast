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
 * Class HSLColorSystem.
 *
 * 
 *
 * @author Stefano Bonvicini <stefano.bonvicini@gmail.com>
 *
 * @see http://stefanobonvicini.altervista.org
 *
 */

class HSLColorSystem  extends HSLColor implements ColorSystemBehaviour
{

    use ColorSystemModel;


    /**
     * Method toRGB.
     *
     * @return RGBColor object
     */
    public function toRGB()
    {

        return $this;
    }
    

    /**
     * Method fromRGB. Sets up object
     * params by RGBColor object in this case is like cloning an object
     *
     * @param RGBColor $color
     *
     * @return self
     */
    public function fromRGB(RGBColor $color)
    {
        $this->r = $color->r();

        $this->g = $color->g();

        $this->b = $color->b();
        
        return $this;
    }
    
    

}


