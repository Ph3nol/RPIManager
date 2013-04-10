<?php

namespace Sly\RPIManager\IO\RadioGPIO\Model;

/**
 * Point.
 * 
 * @author Cédric Dugat <cedric@dugat.me>
 */
class Point
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $code;

    /**
     * @var integer
     */
    private $number;

    /**
     * @var boolean
     */
    private $status;

    /**
     * Constructor.
     * 
     * @param string $id ID
     */
    public function __construct($id = null)
    {
        if ($id) {
            $this->id = $id;
        }
    }

    /**
     * Get ID value.
     *
     * @return string
     */
    public function getID()
    {
        return $this->id;
    }
    
    /**
     * Set ID value.
     *
     * @param string $id ID
     *
     * @return \Sly\RPIManager\IO\RadioGPIO\Model\Point
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
     * @return \Sly\RPIManager\IO\RadioGPIO\Model\Point
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get Code value.
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }
    
    /**
     * Set Code value.
     *
     * @param string $code Code
     *
     * @return \Sly\RPIManager\IO\RadioGPIO\Model\Point
     */
    public function setCode($code)
    {
        $this->code = $code;
    
        return $this;
    }

    /**
     * Get Number value.
     *
     * @return null|integer
     */
    public function getNumber()
    {
        return $this->number;
    }
    
    /**
     * Set Number value.
     *
     * @param null|integer $number Number
     *
     * @return \Sly\RPIManager\IO\RadioGPIO\Model\Point
     */
    public function setNumber($number)
    {
        $this->number = $number;
    
        return $this;
    }

    /**
     * Get Status value.
     *
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }
    
    /**
     * Set Status value.
     *
     * @param boolean $status Status
     *
     * @return \Sly\RPIManager\IO\RadioGPIO\Model\Point
     */
    public function setStatus($status)
    {
        $this->status = $status;
    
        return $this;
    }
}
