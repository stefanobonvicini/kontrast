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

namespace ExeguibileDotIt\Kontrast\Helpers;

/** 
 * Class ConstantsIdsManager.
 *
 * 
 *
 * @author Stefano Bonvicini <stefano.bonvicini@gmail.com>
 *
 * @see http://stefanobonvicini.altervista.org
 *
 */

abstract class ConstantsIdsManager 
{

    /**
     * @var int $maxId defines the max id value aviable
     **/
    protected $maxId;

    /**
     * @var int $nextId defines the next aviable id  
     **/
    protected $nextId;

    /**
     * @var string $namespace the namespace to prepend to constants
     **/
    protected $namespace;


    /** 
     * Class Contructor 
     *
     * @param int $maxId the max allowed id value
     *
     * @param string $namespace namespace of the defined constants
     *
     * return self
     **/
    public function __construct($maxId, $namespace = null)
    {

        if(is_int($maxId) ? $maxId < 1 : true){

            throw new \InvalidArgumentException(__CLASS__ . ": maxid param is out of a valid range");

        }


        if(isset($namespace)) {
           
           if ( is_string($namespace) ? strlen($namespace) < 1 : true) {
               
               throw new \InvalidArgumentException(__CLASS__ . ": namespace param has to be a valid string");

            }

        }

        $this->maxId = $maxId;

        $this->nextId = 0;

        $this->namespace = $namespace;

    }


    /** 
     * Method defineConstant
     *
     * @param string $label
     *
     * @throws \OutOfRangeException if the max
     * allowed number of labels is exceeded
     *
     * @return int the label id
     **/
    public function defineConstant($label)
    {

        if($this->labelExists($label)){

            throw new \RuntimeException(__CLASS__ . ": given id label already exists.");

        }
        
        if($this->nextId > $this->maxId){

            throw new \OutOfRangeException(__CLASS__ . ': Labbelled Ids Table is full');

        }

        if($this->namespace){

            $label = "{$this->namespace}\\$label";

        }

        $id = $this->nextId;

        define($label, $this->nextId);

        $this->nextId++;

        return $id;

    }


    /** 
     * Method labelExists
     *
     * @param string label 
     *
     * @return bool true if the label exists
     **/
    public function labelExists($label)
    {

        if($this->isValidLabel($label)){

            if($this->namespace){

                $label = "{$this->namespace}\\$label";

            }

            return defined($label);

        }

        throw new \InvalidArgumentException(__CLASS__ . ": given id label has a wrong format");

    }


    /** 
     * Method getMaxAllowedId returns the $maxId var
     *
     * @return int $maxId
     **/
    public function getMaxAllowedId()
    {

        return $this->maxId;

    }


    /** 
     * Method isValidLabel 
     *
     * @param string $label
     *
     * @return bool true if the $label string 
     * has a valid format
     **/
    abstract public function isValidLabel($label);

}

