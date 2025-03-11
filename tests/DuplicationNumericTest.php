<?php declare(strict_types=1);

namespace AdnanMula\LexRanking\Tests;

use AdnanMula\LexRanking\Position\FixedEndPosition;
use AdnanMula\LexRanking\Position\FixedStartPosition;
use AdnanMula\LexRanking\RankingCalculator;
use AdnanMula\LexRanking\Token\NumericTokenSet;
use PHPUnit\Framework\TestCase;

final class DuplicationNumericTest extends TestCase
{
    public function testNoDuplicationNumericStart(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $this->numericStart($i);
        }
    }

    public function testNoDuplicationNumericEnd(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $this->numericEnd($i);
        }
    }

    private function numericStart(int $gap): void
    {
        $tokenSet = new NumericTokenSet();

        $calculator = new RankingCalculator(
            $tokenSet,
            new FixedStartPosition($gap),
        );

        $initial = $tokenSet->midToken();

        for ($i = 1; $i <= 100; $i++) {
            $next = $calculator->between($initial, null);

            $this->assertFalse(\strcmp($initial, $next) >= 0);

            $initial = $next;
        }
    }

    private function numericEnd(int $gap): void
    {
        $tokenSet = new NumericTokenSet();

        $calculator = new RankingCalculator(
            $tokenSet,
            new FixedEndPosition($gap),
        );

        $initial = $tokenSet->midToken();

        for ($i = 1; $i <= 100; $i++) {
            $next = $calculator->between($initial, null);

            $this->assertFalse(\strcmp($initial, $next) >= 0);

            $initial = $next;
        }
    }
}
