<?php

namespace Sly\RPIManager\Exception;

use Sly\RPIManager\Exception\Exception;

/**
 * RuntimeException.
 *
 * @uses   \RuntimeException
 * @uses   Sly\RPIManager\Exception\Exception
 * 
 * @author Cédric Dugat <cedric@dugat.me>
 */
class RuntimeException extends \RuntimeException implements Exception
{
}
