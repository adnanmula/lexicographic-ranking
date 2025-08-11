<?php declare(strict_types=1);

namespace AdnanMula\LexRanking\Token;

final class NumericTokenSet extends TokenSet
{
    public function __construct()
    {
        parent::__construct(...\range('0', '9'));
    }
}
