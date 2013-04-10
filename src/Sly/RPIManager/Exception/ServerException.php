<?php

namespace Sly\RPIManager\Exception;

use Sly\RPIManager\Exception\Exception;

/**
 * ServerException.
 *
 * @uses   \RuntimeException
 * @uses   Sly\RPIManager\Exception\Exception
 * 
 * @author Cédric Dugat <cedric@dugat.me>
 */
class ServerException extends \RuntimeException implements Exception
{
}
