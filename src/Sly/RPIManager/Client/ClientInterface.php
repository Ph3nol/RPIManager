<?php

namespace Sly\RPIManager\Client;

/**
 * ClientInterface.
 *
 * @author Cédric Dugat <cedric@dugat.me>
 */
interface ClientInterface
{
    /**
     * Execute.
     *
     * @param string $command Command
     * 
     * @return string
     */
    public function execute($command);
}
