<?php

require_once dirname(__FILE__).'/../../vendor/autoload.php';

use Sly\RPIManager\Client\SSH\Client;
use Sly\RPIManager\IO\RadioGPIO\Manager;
use Sly\RPIManager\IO\RadioGPIO\Model\Point;
use Sly\RPIManager\IO\RadioGPIO\Collection\PointsCollection;

/**
 * Let's try with an SSH connection.
 *
 * Some SSH parameters can be defined:
 * - host
 * - port
 * - username
 *
 * Authentication has to be make from allowed SSH keys.
 */
$client = new Client(array(
    'host' => '192.168.1.100',
    'port' => '2222'
));

$points = new PointsCollection();

$point = new Point('light1');
$point->setName('Light 1');
$point->setCode('00100');
$point->setNumber(2);

$points->add($point);

$manager = new Manager($client, $points);

var_dump($manager->getPoints());
var_dump($manager->getPoints()->get('light1'));

$manager->switchOff('light1'); // or $manager->switchOn('light1');
