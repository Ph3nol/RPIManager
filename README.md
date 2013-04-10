# RPIManager

Some Raspberry Pi tests with this personal experimental PHP library. Still in progress.

[![Build Status](https://secure.travis-ci.org/Ph3nol/RPIManager.png)](http://travis-ci.org/Ph3nol/RPIManager)

## Covering

* GPIO pins management
* GPIO radio 433MHz emits

## Requirements

* PHP 5.3+
* A [Raspberry Pi](http://www.raspberrypi.org/)
* A SSH connection to the RPi if this library is not self-hosting

For GPIO managers:

* [WiringPi GPIO library](https://projects.drogon.net/raspberry-pi/wiringpi/) has to be installed
* For GPIO radio usage with 433MHz emitter, [RCSSwitch-Pi library](https://github.com/r10r/rcswitch-pi) has to be installed too

## Usage examples

* [Simple GPIO usage](https://github.com/Ph3nol/RPIManager/blob/master/examples/gpio/basic.php)
* [GPIO radio usage with 433MHz emitter](https://github.com/Ph3nol/RPIManager/blob/master/examples/gpio/radio.php)

## Todo

* Add new features
* Add other connection clients
* Write more documentation and examples
* Write tests (hum... ASAP!)
