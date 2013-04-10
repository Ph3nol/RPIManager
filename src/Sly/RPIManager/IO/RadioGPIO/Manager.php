<?php

namespace Sly\RPIManager\IO\RadioGPIO;

use Sly\RPIManager\Client\ClientInterface;
use Sly\RPIManager\IO\RadioGPIO\Collection\PointsCollection;

/**
 * Manager.
 * Uses RCSSwitch-Pi library.
 * https://github.com/r10r/rcswitch-pi
 *
 * @author Cédric Dugat <cedric@dugat.me>
 */
class Manager
{
    /**
     * @var \Sly\RPIManager\Client\ClientInterface
     */
    private $client;

    /**
     * @var \Sly\RPIManager\IO\RadioGPIO\Collection\PointsCollection
     */
    private $points;

    /**
     * @var string
     */
    private $baseCommand = 'sudo ~/rcswitch-pi/send';

    /**
     * Constructor.
     *
     * @param \Sly\RPIManager\Client\ClientInterface                   $client      Client
     * @param \Sly\RPIManager\IO\RadioGPIO\Collection\PointsCollection $points      Points
     * @param null|string                                           $baseCommand Base command
     */
    public function __construct(ClientInterface $client, PointsCollection $points, $baseCommand = null)
    {
        $this->client      = $client;
        $this->points      = $points;

        if ($baseCommand) {
            $this->baseCommand = $baseCommand;
        }
    }

    /**
     * Switch on.
     * 
     * @param integer $id ID
     * 
     * @return string
     */
    public function switchOn($id)
    {
        $point = $this->getPoints()->get($id);

        $command = $point->getNumber()
            ? sprintf('%s %s %d 1', $this->baseCommand, $point->getCode(), $point->getNumber())
            : $command = sprintf('%s 1', $point->getCode());
        ;

        return $this->client->execute($command);
    }

    /**
     * Switch off.
     * 
     * @param integer $id ID
     * 
     * @return string
     */
    public function switchOff($id)
    {
        $point = $this->getPoints()->get($id);

        $command = $point->getNumber()
            ? sprintf('%s %s %d 0', $this->baseCommand, $point->getCode(), $point->getNumber())
            : $command = sprintf('%s 0', $point->getCode());
        ;

        return $this->client->execute($command);
    }

    /**
     * Get points (and their statuses).
     * 
     * @return \Sly\RPIManager\IO\RadioGPIO\Collection\PointsCollection
     */
    public function getPoints()
    {
        return $this->points;
    }
}
