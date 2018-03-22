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
 * Class HtmlColor.
 *
 * 
 *
 * @author Stefano Bonvicini <stefano.bonvicini@gmail.com>
 *
 * @see http://stefanobonvicini.altervista.org
 *
 */

class HtmlColor implements ColorObjectBehaviour
{

    const HTML_HEX_COLOR_REGEX = "/^[\#]*([0-9a-fA-F]{2})([0-9a-fA-F]{2})([0-9a-fA-F]{2})$/";

    /** 
     * @var string $hex 
     * hexadecimal color code without #
     */
    protected $hex;


    /**
     * Class Constructor
     *
     * @param string $hexcolor
     * 
     * @throws \InvalidArgumentException
     *
     * @return self
     */
    public function __construct($hexcolor = null)
    {

        if (isset($hexcolor)) {

            $this->hexadecimal($hexcolor);

        }
    
    }


    /**
     * Method hexadecimal.
     *
     * @param string $v
     * 
     * @throws \InvalidArgumentException
     *
     * @return mixed self in setter mode hexadecimal string in getter mode
     * without #
     */
    public function hexadecimal($v = null)
    {
    
        if (isset($v)) {

            if (self::isValidHexadecimalColor($v)) {

                $this->hex = ltrim($v,'#');

                return $this;
            }
            
            throw new \InvalidArgumentException(__CLASS__ . ": given hexadecimal value is not valid");

        }

        return $this->hex;
    
    }
    
          


    public static function isValidHexadecimalColor($color)
    {
        if (is_string($color)) {

            return (bool) preg_match(self::HTML_HEX_COLOR_REGEX, $color);

        }

        return false;
    
    }
    
          
    /**
     * Method __clone.
     * 
     * @return 
     */
    public function __clone()
    {
        $this->setUndefined();
    }


    /**
     * Method setUndefined
     *
     * @return self
     */
    public function setUndefined()
    {
        $this->hex = null;

        return $this;

    }

    
    public function isUndefined()
    {

       return !isset($this->hex); 
    
    }
    

    public function __toString()
    {
        return isset($this->hex) ? "#{$this->hex}" : '';
    
    }
    
}


