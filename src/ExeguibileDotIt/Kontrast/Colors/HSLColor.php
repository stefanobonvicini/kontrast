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
 * Class HSLColor.
 *
 * 
 *
 * @author Stefano Bonvicini <stefano.bonvicini@gmail.com>
 *
 * @see http://stefanobonvicini.altervista.org
 *
 */

class HSLColor implements ColorObjectBehaviour
{

    /** 
     * @var float $hue 
     * Hue value in degrees
     */
    protected $hue;
    
    /** 
     * @var float $sat
     */
    protected $sat;
    
    /** 
     * @var float $lum
     */
    protected $lum;


    /**
     * Class Constructor
     *
     * @param float $h
     *
     * @param float $l
     *
     * @param float $s
     * 
     * @throws \InvalidArgumentException
     *
     * @return self
     */
    public function __construct($h = null, $l = null, $s = null)
    {


    
        
    
    }


    /**
     * Method  hue
     * Gets or sets color Hue
     *
     * @param float $v
     * 
     * @throws \InvalidArgumentException
     *
     * @return mixed self if used as a setter the value 
     * if used as getter
     */
    public function hue($v = null)
    {
        if (isset($v)) {
            
            if (self::isValidHue($v)) {

                $this->hue = $v;

                return $this;
            }
            
            throw new \InvalidArgumentException(__CLASS__ . ": given hue value is not valid");

        }

        return $this->hue;
    
    }
    
          
    /**
     * Method saturation 
     * Gets or sets color Saturation
     *
     * @param float $v
     * 
     * @throws \InvalidArgumentException
     *
     * @return mixed self if used as a setter the value 
     * if used as getter
     */
    public function saturation($v = null)
    {
        if (isset($v)) {
            
            if (self::isValidLS($v)) {

                $this->sat = $v;

                return $this;
            }
            
            throw new \InvalidArgumentException(__CLASS__ . ": given saturation value is not valid");

        }

        return $this->sat;
    
    }


    /**
     * Method luminosity
     * Gets or sets color Luminosity
     *
     * @param float $v
     * 
     * @throws \InvalidArgumentException
     *
     * @return mixed self if used as a setter the value 
     * if used as getter
     */
    public function luminosity($v = null)
    {
        if (isset($v)) {
            
            if (self::isValidLS($v)) {

                $this->lum = $v;

                return $this;
            }
            
            throw new \InvalidArgumentException(__CLASS__ . ": given luminosity value is not valid");

        }

        return $this->lum;
    
    }


    /**
     * Method isValidHue
     *
     * @param float $h
     * 
     * @return bool
     */
    public static function isValidHue($h)
    {

        return is_int($n) ? ($n >= 0 && $n <= 255) : false;
    
    }


    /**
     * Method isValidLS
     *
     * @param float $v
     * 
     * @return bool
     */
    public static function isValidLS($v)
    {

        return is_int($n) ? ($n >= 0 && $n <= 255) : false;
    
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
     * Method setUndefined.
     *
     * @return self
     */
    public function setUndefined()
    {
        $this->hue = null;

        $this->sat = null;

        $this->lum = null;

        return $this;

    }
    
    
    public function isUndefined()
    {

       return ! (isset($this->hue) && isset($this->sat) && isset($this->lum)); 

    }

}


