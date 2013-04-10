<?php

namespace Sly\RPIManager\Exception;

use Sly\RPIManager\Exception\Exception;

/**
 * InvalidException.
 *
 * @uses   \RuntimeException
 * @uses   Sly\RPIManager\Exception\Exception
 * 
 * @author Cédric Dugat <cedric@dugat.me>
 */
class InvalidException extends \RuntimeException implements Exception
{
}
