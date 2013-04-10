<?php

namespace Sly\RPIManager\IO\GPIO\Model;

/**
 * Pin.
 * 
 * @author Cédric Dugat <cedric@dugat.me>
 */
class Pin
{
    const DIRECTION_IN  = 'in';
    const DIRECTION_OUT = 'out';

    const VALUE_LOW  = 'LOW';
    const VALUE_HIGH = 'HIGH';

    /**
     * wiringPi ID.
     * 
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $direction;

    /**
     * @var boolean
     */
    private $value;

    /**
     * __toString.
     *
     * @return string|integer
     */
    public function __construct()
    {
        return $this->getName() ? : $this->getId();
    }

    /**
     * Get ID value.
     *
     * @return integer
     */
    public function getID()
    {
        return $this->id;
    }
    
    /**
     * Set ID value.
     *
     * @param integer $id ID
     *
     * @return \Sly\RPIManager\IO\GPIO\Model\Pin
     */
    public function setID($id)
    {
        $this->id = $id;
    
        return $this;
    }

    /**
     * Get Name value.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Set Name value.
     *
     * @param string $name Name
     *
     * @return \Sly\RPIManager\IO\GPIO\Model\Pin
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get Direction value.
     *
     * @return string
     */
    public function getDirection()
    {
        return $this->direction;
    }
    
    /**
     * Set Direction value.
     *
     * @param string $direction Direction
     *
     * @return \Sly\RPIManager\IO\GPIO\Model\Pin
     */
    public function setDirection($direction)
    {
        $this->direction = $direction;
    
        return $this;
    }

    /**
     * Get Value value.
     *
     * @return boolean
     */
    public function getValue()
    {
        return $this->value;
    }
    
    /**
     * Set Value value.
     *
     * @param boolean $value Value
     *
     * @return \Sly\RPIManager\IO\GPIO\Model\Pin
     */
    public function setValue($value)
    {
        $this->value = $value;
    
        return $this;
    }
}
