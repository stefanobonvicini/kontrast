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
 * Class HtmlColorSystem.
 *
 * 
 *
 * @author Stefano Bonvicini <stefano.bonvicini@gmail.com>
 *
 * @see http://stefanobonvicini.altervista.org
 *
 */

class HtmlColorSystem  extends HtmlColor implements ColorSystemBehaviour
{

    use ColorSystemModel;


    /**
     * Method toRGB.
     *
     * @return RGBColor object
     */
    public function toRGB()
    {
        if (isset($this->hex)) {

            $r = hexdec(substr($this->hex, 0, 2));
            
            $g = hexdec(substr($this->hex, 2, 2));
            
            $b = hexdec(substr($this->hex, 4, 2));

            return new RGBColor($r, $g, $b);

        }

        return new RGBColor();
    }
    

    /**
     * Method fromRGB. Sets up object
     * params by RGBColor object in this case is like cloning an object. If
     * $color is not defined then no change is made
     *
     * @param RGBColor $color
     *
     * @return self
     */
    public function fromRGB(RGBColor $color)
    {

        if (!$color->isUndefined()) {

            $this->hex = dechex($color->r());

            $this->hex .= dechex($color->g());
            
            $this->hex .= dechex($color->b());

        }
        
        return $this;

    }

}


