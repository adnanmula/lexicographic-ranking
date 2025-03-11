<?php declare(strict_types=1);

namespace AdnanMula\LexRanking\Position;

use AdnanMula\LexRanking\Token\TokenSet;

final class DynamicMidPosition implements Position
{
    public function next(TokenSet $set, string $prev, string $next, int $offset): ?string
    {
        if ($prev === $next || $set->getIndex($prev) === $set->getIndex($next) - 1) {
            return null;
        }

        $midIndex = $set->getIndex($prev) + (int) \floor(($set->getIndex($next) - $set->getIndex($prev)) / 2);

        return $set->getToken($midIndex);
    }

    public function availableSpace(TokenSet $set, string $prev, string $next): int
    {
        return 0;
    }
}
