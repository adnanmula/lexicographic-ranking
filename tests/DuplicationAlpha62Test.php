<?php declare(strict_types=1);

namespace AdnanMula\LexRanking\Tests;

use AdnanMula\LexRanking\Position\FixedEndPosition;
use AdnanMula\LexRanking\Position\FixedStartPosition;
use AdnanMula\LexRanking\RankingCalculator;
use AdnanMula\LexRanking\Token\Alpha62TokenSet;
use PHPUnit\Framework\TestCase;

final class DuplicationAlpha62Test extends TestCase
{
    /** @test */
    public function no_duplication_alpha62_start(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $this->alpha62_start_test($i);
        }
    }

    /** @test */
    public function no_duplication_alpha62_end(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            $this->alpha62_end_test($i);
        }
    }

    private function alpha62_start_test(int $gap): void
    {
        $tokenSet = new Alpha62TokenSet();

        $calculator = new RankingCalculator(
            $tokenSet,
            new FixedStartPosition($gap),
        );

        $initial = $tokenSet->midToken();

        for ($i = 1; $i <= 500; $i++) {
            $next = $calculator->between($initial, null);

            $this->assertFalse(\strcmp($initial, $next) >= 0);

            $initial = $next;
        }
    }

    private function alpha62_end_test(int $gap): void
    {
        $tokenSet = new Alpha62TokenSet();

        $calculator = new RankingCalculator(
            $tokenSet,
            new FixedEndPosition($gap),
        );

        $initial = $tokenSet->midToken();

        for ($i = 1; $i <= 500; $i++) {
            $next = $calculator->between($initial, null);

            $this->assertFalse(\strcmp($initial, $next) >= 0);

            $initial = $next;
        }
    }
}
