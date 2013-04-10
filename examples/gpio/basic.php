<?php

require_once dirname(__FILE__).'/../../vendor/autoload.php';

use Sly\RPIManager\Client\SSH\Client;
use Sly\RPIManager\IO\GPIO\Manager;
use Sly\RPIManager\IO\GPIO\Model\Pin;

/**
 * Let's try with an SSH connection.
 *
 * Some SSH parameters can be defined:
 * - ip (RPi IP or host)
 * - port
 * - username
 *
 * Authentication has to be make from allowed SSH keys.
 */
$client = new Client(array(
    'ip'   => '192.168.1.100',
    'port' => '2222'
));

$manager = new Manager($client);

$demoPin = $manager->getPins()->get(7);

var_dump($demoPin);

$demoPin->setDirection(Pin::DIRECTION_OUT);
$demoPin->setValue(Pin::VALUE_HIGH);
$manager->update($demoPin);

var_dump($demoPin);
var_dump($demoPin->getValue());
