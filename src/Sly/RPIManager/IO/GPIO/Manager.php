<?php

namespace Sly\RPIManager\IO\GPIO;

use Sly\RPIManager\Client\ClientInterface;
use Sly\RPIManager\IO\GPIO\Collection\PinsCollection;
use Sly\RPIManager\IO\GPIO\Model\Pin;

/**
 * Manager.
 * Uses WiringPi library.
 * https://projects.drogon.net/raspberry-pi/wiringpi/
 *
 * @author Cédric Dugat <cedric@dugat.me>
 */
class Manager
{
    const GPIO_COMMAND_READALL   = 'gpio readall';
    const GPIO_COMMAND_DIRECTION = 'gpio mode %d %s';
    const GPIO_COMMAND_VALUE     = 'gpio write %d %d';

    /**
     * @var \Sly\RPIManager\Client\ClientInterface
     */
    private $client;

    /**
     * @var \Sly\RPIManager\IO\GPIO\Collection\PinsCollection
     */
    private $pins;

    /**
     * Constructor.
     *
     * @param \Sly\RPIManager\Client\ClientInterface $client Client
     */
    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
        $this->pins   = new PinsCollection();

        $this->init();
    }

    /**
     * Init.
     */
    private function init()
    {
        $results = $this->client->execute(self::GPIO_COMMAND_READALL);
        $results = explode("\n", $results);

        foreach ($results as $r) {
            if (preg_match('/^\|(.*)\|(.*)\|(.*)\|(.*)\|(.*)\|$/', $r, $matches))
            {
                $pin = new Pin();
                $pin->setID(trim($matches[1]));
                $pin->setName(trim($matches[3]));
                $pin->setDirection(trim($matches[1]));
                $pin->setValue(Pin::VALUE_HIGH == trim($matches[1]) ? true : false);

                $this->pins->add($pin);
            }
        }
    }

    /**
     * Get pins (and their statuses).
     * 
     * @return \Sly\RPIManager\IO\GPIO\Collection\PinsCollection
     */
    public function getPins()
    {
        return $this->pins;
    }

    /**
     * Update.
     *
     * @param \Sly\RPIManager\IO\GPIO\Model\Pin $pin Pin
     *
     * @return \Sly\RPIManager\IO\GPIO\Model\Pin
     */
    public function update(Pin $pin)
    {
        $pinValue = Pin::VALUE_HIGH == $pin->getValue() ? 1 : 0;

        $this->client->execute(sprintf(self::GPIO_COMMAND_DIRECTION, $pin->getID(), $pin->getDirection()));
        $this->client->execute(sprintf(self::GPIO_COMMAND_VALUE, $pin->getID(), $pinValue));

        return $pin;
    }
}
