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
 * Class RGBColor.
 *
 * 
 *
 * @author Stefano Bonvicini <stefano.bonvicini@gmail.com>
 *
 * @see http://stefanobonvicini.altervista.org
 *
 */

class RGBColor implements ColorObjectBehaviour
{

    /** 
     * @var int $r 
     * R value
     */
    protected $r;
    
    /** 
     * @var int $g 
     * G value
     */
    protected $g;
    
    /** 
     * @var int $b 
     * B value
     */
    protected $b;


    /**
     * Class Constructor
     *
     * @param int $r
     *
     * @param int $g
     *
     * @param int $b
     * 
     * @throws \InvalidArgumentException
     *
     * @return self
     */
    public function __construct($r = null, $g = null, $b = null)
    {
        $n = func_num_args();

        if ($n == 3) {
            
            if (! self::isValidRGBInt($r)) {

                throw \InvalidArgumentException(__CLASS__ . ": R value is not valid.");

            }

            if (! self::isValidRGBInt($g)) {

                throw \InvalidArgumentException(__CLASS__ . ": G value is not valid.");

            }
    
            if (! self::isValidRGBInt($b)) {

                throw \InvalidArgumentException(__CLASS__ . ": B value is not valid.");

            }

            $this->r = $r;

            $this->g = $g;

            $this->b = $b;

        }

        if ($n > 0) {

            throw \InvalidArgumentException(__CLASS__ . ": Can't create object all three bands have to be defined.");

        }
    
    }


    /**
     * Method r 
     * Gets or sets color R value
     *
     * @param int $v
     * 
     * @throws \InvalidArgumentException
     *
     * @return mixed self if used as a setter the value 
     * if used as getter
     */
    public function r($v = null)
    {
        if (isset($v)) {
            
            if (self::isValidRGBInt($v)) {

                $this->r = $v;

                return $this;
            }
            
            throw new \InvalidArgumentException(__CLASS__ . ": given R value is not valid");

        }

        return $this->r;
    
    }
    
          
    /**
     * Method g 
     * Gets or sets color G value
     *
     * @param int $v
     * 
     * @throws \InvalidArgumentException
     *
     * @return mixed self if used as a setter the value 
     * if used as getter
     */
    public function g($v = null)
    {
        if (isset($v)) {
            
            if (self::isValidRGBInt($v)) {

                $this->g = $v;

                return $this;
            }
            
            throw new \InvalidArgumentException(__CLASS__ . ": given G value is not valid");

        }

        return $this->g;
    
    }


    /**
     * Method b 
     * Gets or sets color B value
     *
     * @param int $v
     * 
     * @throws \InvalidArgumentException
     *
     * @return mixed self if used as a setter the value 
     * if used as getter
     */
    public function b($v = null)
    {
        if (isset($v)) {
            
            if (self::isValidRGBInt($v)) {

                $this->b = $v;

                return $this;
            }
            
            throw new \InvalidArgumentException(__CLASS__ . ": given B value is not valid");

        }

        return $this->b;
    
    }


    /**
     * Method isValidRGBInt.
     *
     * @param int $n
     * 
     * @return bool
     */
    public static function isValidRGBInt($n)
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
        $this->r = null;

        $this->g = null;

        $this->b = null;

        return $this;

    }


    public function isUndefined()
    {

       return ! (isset($this->r) && isset($this->g) && isset($this->b)); 
    
    }

}


