<?php declare(strict_types=1);

namespace AdnanMula\LexRanking\Position;

use AdnanMula\LexRanking\Exception\InvalidPositionException;
use AdnanMula\LexRanking\Token\TokenSet;

final class FixedStartPosition implements Position
{
    private int $gap;

    public function __construct(int $gap)
    {
        $this->assert($gap);

        $this->gap = $gap;
    }

    public function next(TokenSet $set, string $prev, string $next, int $offset): ?string
    {
        $gap = $this->gap - $offset;

        if ($gap > $set->maxIndex()) {
            throw new InvalidPositionException();
        }

        if ($set->getIndex($prev) + $gap >= $set->getIndex($next)) {
            return null;
        }

        return $set->getToken($set->getIndex($prev) + $gap);
    }

    public function availableSpace(TokenSet $set, string $prev, string $next): int
    {
        if ($prev === $next) {
            return 0;
        }

        return $set->getIndex($next) - $set->getIndex($prev) - 1;
    }

    private function assert(int $gap): void
    {
        if ($gap <= 0) {
            throw new InvalidPositionException();
        }
    }
}
