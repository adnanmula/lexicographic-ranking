<?php declare(strict_types=1);

namespace AdnanMula\LexRanking\Position;

use AdnanMula\LexRanking\Token\TokenSet;

interface Position
{
    public function next(TokenSet $tokenSet, string $prev, string $next, int $offset): ?string;

    public function availableSpace(TokenSet $tokenSet, string $prev, string $next): int;
}
