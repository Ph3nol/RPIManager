<?php

namespace Sly\RPIManager\IO\RadioGPIO\Collection;

use Sly\RPIManager\IO\RadioGPIO\Model\Point;
use Sly\RPIManager\Exception\InvalidException;

/**
 * PointsCollection.
 *
 * @uses \IteratorAggregate
 * @uses \Countable
 * 
 * @author Cédric Dugat <cedric@dugat.me>
 */
class PointsCollection implements \IteratorAggregate, \Countable
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
     * @param \Sly\RPIManager\IO\RadioGPIO\Model\Point $point Point
     */
    public function add(Point $point)
    {
        $this->coll[$point->getID()] = $point;
    }

    /**
     * Get.
     * 
     * @param integer $id ID
     * 
     * @return \Sly\RPIManager\IO\RadioGPIO\Model\Point
     *
     * @throws \Sly\RPIManager\Exception\InvalidException
     */
    public function get($id)
    {
        if (false === array_key_exists($id, $this->coll)) {
            throw new InvalidException(sprintf('Point #%s does not exist', $id));
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
