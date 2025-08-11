<?php declare(strict_types=1);

namespace AdnanMula\LexRanking\Position;

use AdnanMula\LexRanking\Token\TokenSet;

interface Position
{
    public function next(TokenSet $set, string $prev, string $next, int $offset): ?string;

    public function availableSpace(TokenSet $set, string $prev, string $next): int;
}
