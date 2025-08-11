<?php declare(strict_types=1);

namespace AdnanMula\LexRanking\Position;

use AdnanMula\LexRanking\Exception\InvalidPositionException;
use AdnanMula\LexRanking\Token\TokenSet;

final readonly class FixedStartPosition implements Position
{
    public function __construct(private int $gap)
    {
        $this->assert($gap);
    }

    public function next(TokenSet $set, string $prev, string $next, int $offset): ?string
    {
        $prevIndex = $set->getIndex($prev);
        $nextIndex = $set->getIndex($next);
        $gap = $this->gap - $offset;

        if ($gap > $set->maxIndex()) {
            throw new InvalidPositionException();
        }

        if ($prevIndex + $gap >= $nextIndex) {
            return null;
        }

        return $set->getToken($prevIndex + $gap);
    }

    public function availableSpace(TokenSet $set, string $prev, string $next): int
    {
        $prevIndex = $set->getIndex($prev);
        $nextIndex = $set->getIndex($next);

        if ($prevIndex >= $nextIndex) {
            return 0;
        }

        return $nextIndex - $prevIndex - 1;
    }

    private function assert(int $gap): void
    {
        if ($gap <= 0) {
            throw new InvalidPositionException();
        }
    }
}
