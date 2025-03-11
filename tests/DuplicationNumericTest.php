<?php declare(strict_types=1);

namespace AdnanMula\LexRanking\Tests;

use AdnanMula\LexRanking\Position\FixedEndPosition;
use AdnanMula\LexRanking\Position\FixedStartPosition;
use AdnanMula\LexRanking\RankingCalculator;
use AdnanMula\LexRanking\Token\NumericTokenSet;
use PHPUnit\Framework\TestCase;

final class DuplicationNumericTest extends TestCase
{
    /** @test */
    public function no_duplication_numeric_start(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $this->numeric_start_test($i);
        }
    }

    /** @test */
    public function no_duplication_numeric_end(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $this->numeric_end_test($i);
        }
    }

    private function numeric_start_test(int $gap): void
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

    private function numeric_end_test(int $gap): void
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
