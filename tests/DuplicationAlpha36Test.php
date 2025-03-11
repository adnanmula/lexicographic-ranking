<?php declare(strict_types=1);

namespace AdnanMula\LexRanking\Tests;

use AdnanMula\LexRanking\Position\FixedEndPosition;
use AdnanMula\LexRanking\Position\FixedStartPosition;
use AdnanMula\LexRanking\RankingCalculator;
use AdnanMula\LexRanking\Token\Alpha36TokenSet;
use PHPUnit\Framework\TestCase;

final class DuplicationAlpha36Test extends TestCase
{
    /** @test */
    public function no_duplication_alpha36_start(): void
    {
        for ($i = 1; $i <= 36; $i++) {
            $this->alpha36_start_test($i);
        }
    }

    /** @test */
    public function no_duplication_alpha36_end(): void
    {
        for ($i = 1; $i <= 36; $i++) {
            $this->alpha36_end_test($i);
        }
    }

    private function alpha36_start_test(int $gap): void
    {
        $tokenSet = new Alpha36TokenSet();

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

    private function alpha36_end_test(int $gap): void
    {
        $tokenSet = new Alpha36TokenSet();

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
