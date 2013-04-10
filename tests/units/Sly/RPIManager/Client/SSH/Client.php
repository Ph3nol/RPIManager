<?php

namespace tests\units\Sly\RPIManager\Client\SSH;

require_once __DIR__ . '/../../../../../../vendor/autoload.php';

use mageekguy\atoum;
use Sly\RPIManager\Client\SSH\Client as BaseClient;

/**
 * Client
 *
 * @uses atoum\test
 * @author Cédric Dugat <cedric@dugat.me>
 */
class Client extends atoum\test
{
    public function testInstantiationWithExtraParameters()
    {
        $this->exception(function() {
                $clientWEP = new BaseClient(array('with' => 'extra', 'parameters'));
            })
            ->isInstanceOf('\Symfony\Component\OptionsResolver\Exception\InvalidOptionsException')
        ;
    }
}
