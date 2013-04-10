<?php

namespace Sly\RPIManager\IO\GPIO\Collection;

use Sly\RPIManager\IO\GPIO\Model\Pin;
use Sly\RPIManager\Exception\InvalidException;

/**
 * PinsCollection.
 *
 * @uses \IteratorAggregate
 * @uses \Countable
 * 
 * @author Cédric Dugat <cedric@dugat.me>
 */
class PinsCollection implements \IteratorAggregate, \Countable
{
    /**
     * @var \ArrayIterator
     */
    private $coll;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->coll = new \ArrayIterator();
    }

    /**
     * Get iterator.
     * 
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return $this->coll;
    }

    /**
     * Add.
     * 
     * @param \Sly\RPIManager\IO\GPIO\Model\Pin $pin Pin
     */
    public function add(Pin $pin)
    {
        $this->coll[$pin->getID()] = $pin;
    }

    /**
     * Get.
     * 
     * @param integer $id ID
     * 
     * @return \Sly\RPIManager\IO\GPIO\Model\Pin
     *
     * @throws \Sly\RPIManager\Exception\InvalidException
     */
    public function get($id)
    {
        if (false === array_key_exists($id, $this->coll)) {
            throw new InvalidException(sprintf('Pin #%s does not exist', $id));
        }

        return $this->coll[$id];
    }

    /**
     * Count.
     * 
     * @return integer
     */
    public function count()
    {
        return count($this->getIterator());
    }

    /**
     * isEmpty.
     * 
     * @return boolean
     */
    public function isEmpty()
    {
        return (bool) $this->count();
    }

    /**
     * Clear collection.
     */
    public function clear()
    {
        $this->coll = new \ArrayIterator();
    }
}
