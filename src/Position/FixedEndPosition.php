<?php declare(strict_types=1);

namespace AdnanMula\LexRanking\Position;

use AdnanMula\LexRanking\Exception\InvalidPositionException;
use AdnanMula\LexRanking\Token\TokenSet;

final readonly class FixedEndPosition implements Position
{
    public function __construct(private int $gap)
    {
        $this->assert($gap);
    }

    public function next(TokenSet $set, string $prev, string $next, int $offset): ?string
    {
        $gap = $this->gap - $offset;

        if ($gap > $set->maxIndex()) {
            throw new InvalidPositionException();
        }

        $prevIndex = $set->getIndex($prev);
        $nextIndex = $set->getIndex($next);

        if ($nextIndex - $gap <= $prevIndex) {
            return null;
        }

        return $set->getToken($nextIndex - $gap);
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
