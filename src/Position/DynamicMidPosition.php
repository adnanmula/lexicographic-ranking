<?php declare(strict_types=1);

namespace AdnanMula\LexRanking\Position;

use AdnanMula\LexRanking\Token\TokenSet;

final class DynamicMidPosition implements Position
{
    public function next(TokenSet $set, string $prev, string $next, int $offset): ?string
    {
        $prevIndex = $set->getIndex($prev);
        $nextIndex = $set->getIndex($next);

        if ($prev === $next || $prevIndex === $nextIndex - 1) {
            return null;
        }

        $midIndex = $prevIndex + (int) \floor(($nextIndex - $prevIndex) / 2);

        return $set->getToken($midIndex);
    }

    public function availableSpace(TokenSet $set, string $prev, string $next): int
    {
        return 0;
    }
}
