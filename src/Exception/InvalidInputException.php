<?php declare(strict_types=1);

namespace AdnanMula\LexRanking\Exception;

final class InvalidInputException extends \InvalidArgumentException
{
    public function __construct()
    {
        parent::__construct('Invalid input.', 0, null);
    }
}
