<?php declare(strict_types=1);

namespace AdnanMula\LexRanking\Position;

use AdnanMula\LexRanking\Exception\InvalidPositionException;
use AdnanMula\LexRanking\Token\TokenSet;

final class FixedEndPosition implements Position
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

        if ($set->getIndex($next) - $gap <= $set->getIndex($prev)) {
            return null;
        }

        return $set->getToken($set->getIndex($next) - $gap);
    }

    public function availableSpace(TokenSet $set, string $prev, string $next): int
    {
        return $set->getIndex($next) - $set->getIndex($prev);
    }

    private function assert(int $gap): void
    {
        if (0 >= $gap) {
            throw new InvalidPositionException();
        }
    }
}
