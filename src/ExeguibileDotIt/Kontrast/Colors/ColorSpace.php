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
use \ExeguibileDotIt\Kontrast\Helpers\ConstantsIdsManager;


/** 
 * Class ColorSpace.
 *
 * 
 *
 * @author Stefano Bonvicini <stefano.bonvicini@gmail.com>
 *
 * @see http://stefanobonvicini.altervista.org
 *
 */

class ColorSpace extends ConstantsIdsManager
{
    
    const MIN_LABEL_LEN = 4;
    
    const MAX_ALLOWED_COLOR_SYSTEMS = 50;

    /** 
     * @var array $systems 
     * contains all defined ColorSystemBehaviour objects
     */
    protected $systems;

    /** 
     * @var int $sysptr
     * pointer to the last required ColorSystemBehaviour object
     */
    protected $sysptr;
    
    /** 
     * @var int $sysnum
     * the number of defined ColorSystems
     */
    protected $sysnum = 0;


    /** 
     * Class Contructor 
     *
     * @param string $namespace namespace of the defined constants
     *
     * return self
     **/
    public function __construct($namespace = null)
    {

        parent::__construct(self::MAX_ALLOWED_COLOR_SYSTEMS, $namespace);

    }


    /**
     * Method defineColorSystem.
     *
     * @param ColorSystemBehaviour $cs
     *
     * @param string $label
     * 
     * @return self
     */
    public function defineColorSystem(ColorSystemBehaviour $cs, $label)
    {

        $id = $this->defineConstant($label);

        $cs::setSystemID($id);

        $this->systems[$id] = $cs;

        $this->sysnum++;

        return $this;
    
    }
    
    
    /** 
     * Method isValidLabel 
     *
     * @param string $label
     *
     * @return bool true if the $label string 
     * has a valid format
     **/
    public function isValidLabel($label)
    {
        return is_string($label) ? strlen($label) > self::MIN_LABEL_LEN : false;     
    }

          
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
    public function getSystemObject($sysID = null)
    {
        if ($this->sysnum == 0) {

            throw new \RuntimeException(__CLASS__ . ": no color system defined.");

        }

        if (isset($sysID)) {

            if (is_int($sysID) ? ($sysID < 0 || $sysID >= $this->sysnum) : true) {

                throw new \InvalidArgumentException(__CLASS__ . ": given id is not a valid int.");

            }

            $this->sysptr = $sysID;
        
        }

        return clone $this->systems[$this->sysptr];
        
    }


    /**
     * Method getColorSystemsAmount.
     *
     * @return int
     */
    public function getColorSystemsAmount()
    {

       return $this->sysnum; 
    
    }
    
          

}


