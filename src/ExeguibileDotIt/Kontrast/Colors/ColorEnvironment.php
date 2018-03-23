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
 * Class ColorEnvironment.
 *
 * 
 *
 * @author Stefano Bonvicini <stefano.bonvicini@gmail.com>
 *
 * @see http://stefanobonvicini.altervista.org
 *
 */

class ColorEnvironment implements ColorSystemsEnsambleBehaviour
{

    /** 
     * @var ColorSystemsEnsambleBehaviour $colorSpace
     *
     */
    protected $colorSpace;

    /** 
     * @var string $colorClass 
     *
     */
    protected $colorClass;
    
    

    /**
     * Class Constructor
     *
     * @param ColorSystemsEnsambleBehaviour $cse
     *
     * @param string $colorClass class name of an implementation of AbstractColorBehaviour 
     * 
     * @throws \RuntimeException
     *
     * @return self
     */
    public function __construct(ColorSystemsEnsambleBehaviour $cse, $colorClass)
    {
        if (! is_subclass_of($colorClass , __NAMESPACE__ . "\\AbstractColorBehaviour")) {

            throw new \InvalidArgumentException(__CLASS__ . ": given color class has to implement AbstractColorBehaviour interface");

        }

        $this->colorSpace = $cse;

        $this->colorClass = $colorClass;

        $colorClass::setSupportedColorSystems($this);

    }

    
    public function defineColorSystem(ColorSystemBehaviour $cs, $identifier)
    {

        $this->colorSpace->defineColorSystem($cs, $identifier);

        return $this;

    }
    
    
    public function getSystemObject($sysID = null)
    {

        return $this->colorSpace->getSystemObject($sysID);

    }
    
    
    public function count()
    {

       return count($this->colorSpace()); 
    
    }
}


