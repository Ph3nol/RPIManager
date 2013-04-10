<?php

namespace Sly\RPIManager\Client\SSH;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Sly\RPIManager\Client\ClientInterface;
use Symfony\Component\Process\Process;
use Sly\RPIManager\Exception\RuntimeException;

/**
 * Client.
 *
 * @uses \Sly\RPIManager\Client\ClientInterface
 * @author Cédric Dugat <cedric@dugat.me>
 */
class Client implements ClientInterface
{
    /**
     * @var array
     */
    protected $serverParameters;

    /**
     * Constructor.
     * 
     * @param string $command          Command
     * @param array  $serverParameters SSH server parameters
     */
    public function __construct(array $serverParameters = array())
    {
        $resolver = new OptionsResolver();
        $resolver->setDefaults(array(
            'ip'       => '127.0.0.1',
            'port'     => '22',
            'username' => 'pi',
        ));

        if (is_string($serverParameters)) {
            $this->serverParameters = $resolver->resolve(array('ip' => $serverParameters));
        }

        if (is_array($serverParameters)) {
            $this->serverParameters = $resolver->resolve($serverParameters);
        }
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Sly\RPIManager\Exception\RuntimeException
     */
    public function execute($command)
    {
        if ($this->serverParameters) {
            $command = sprintf(
                'ssh %s@%s -p %d \'%s\'',
                $this->serverParameters['username'],
                $this->serverParameters['ip'],
                $this->serverParameters['port'],
                $command
            );
        }

        $process = new Process($command);
        $process->setTimeout(3600);
        $process->run();

        if (!$process->isSuccessful()) {
            throw new RuntimeException($process->getErrorOutput());
        }

        return $process->getOutput();
    }
}
