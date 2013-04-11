<?php

require_once dirname(__FILE__).'/../../vendor/autoload.php';

use Sly\RPIManager\Client\SSH\Client;
use Sly\RPIManager\IO\GPIO\Manager;
use Sly\RPIManager\IO\GPIO\Model\Pin;

/**
 * Let's try with a SSH connection.
 *
 * Some SSH parameters can be defined:
 * - host
 * - port
 * - username
 *
 * Authentication has to be made from allowed SSH keys.
 */
$client = new Client(array(
    'host' => 'h-srv1.slynett.com',
    'port' => '2200'
));

$manager = new Manager($client);

$demoPin = $manager->getPins()->get(7);

var_dump($demoPin);

$demoPin->setDirection(Pin::DIRECTION_OUT);
$demoPin->setValue(Pin::VALUE_HIGH);
$manager->update($demoPin);

var_dump($demoPin);
var_dump($demoPin->getValue());
