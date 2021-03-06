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
 * Class Color.
 *
 * 
 *
 * @author Stefano Bonvicini <stefano.bonvicini@gmail.com>
 *
 * @see http://stefanobonvicini.altervista.org
 *
 */

class Color implements AbstractColorBehaviour
{

    /** 
     * @var ColorSpace $cspace
     */
    private static $cspace;


    /** 
     * @var ColorSpaceBehaviour $color
     */
    protected $color;



    /**
     * Method setSupportedColorSystems
     *
     * @param ColorSystemsEnsambleBehaviour $cs
     * 
     * @return void
     */
    public static function setSupportedColorSystems(ColorSystemsEnsambleBehaviour $cs)
    {
        self::$cspace = $cs;
    }


    /**
     * Class Constructor
     *
     * @param int $sysID a defined ColorSystem ID
     * 
     * @throws \RuntimeException
     *
     * @return self
     */
    public function __construct($sysID = 0)
    {
        if (! isset(self::$cspace)) {

            throw new \RuntimeException(__CLASS__ . ": Can't instantiate Color becouse no ColorSystem is defined.");

        }

        $this->color = self::$cspace->getSystemObject($sysID);   
    
    }
    
          

    /**
     * Method _call.
     *
     * 
     * @throws \RuntimeException
     *
     * @return mixed
     */
    public function __call($method, $args)
    {
        if (method_exists($this->color, $method)) {

            return call_user_func_array([$this->color, $method], $args);

        }

        throw new \RuntimeException(__CLASS__ . ": called method $method is not defined"); 
    
    }



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
    public function convertTo($sysID)
    {
        if ($this->color->getSystemID() !== $sysID) {

            $object = self::$cspace->getSystemObject($sysID);

            $object->fromRGB($this->color->toRGB());

            $this->color = $object;

        }

        return $this;

    }

}

