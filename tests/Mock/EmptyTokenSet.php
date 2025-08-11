<?php declare(strict_types=1);

namespace AdnanMula\LexRanking\Tests\Mock;

use AdnanMula\LexRanking\Token\TokenSet;

final class EmptyTokenSet extends TokenSet
{
    public function __construct()
    {
        parent::__construct();
    }
}
