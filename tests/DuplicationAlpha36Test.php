<?php declare(strict_types=1);

namespace AdnanMula\LexRanking\Tests;

use AdnanMula\LexRanking\Position\FixedEndPosition;
use AdnanMula\LexRanking\Position\FixedStartPosition;
use AdnanMula\LexRanking\RankingCalculator;
use AdnanMula\LexRanking\Token\Alpha36TokenSet;
use PHPUnit\Framework\TestCase;

final class DuplicationAlpha36Test extends TestCase
{
    public function testNoDuplicationAlpha36Start(): void
    {
        for ($i = 1; $i <= 36; $i++) {
            self::alpha36StartTest($i);
        }
    }

    public function testNoDuplicationAlpha36End(): void
    {
        for ($i = 1; $i <= 36; $i++) {
            self::alpha36EndTest($i);
        }
    }

    private function alpha36StartTest(int $gap): void
    {
        $tokenSet = new Alpha36TokenSet();

        $calculator = new RankingCalculator(
            $tokenSet,
            new FixedStartPosition($gap),
        );

        $initial = $tokenSet->midToken();

        for ($i = 1; $i <= 100; $i++) {
            $next = $calculator->between($initial, null);

            self::assertFalse(\strcmp($initial, $next) >= 0);

            $initial = $next;
        }
    }

    private function alpha36EndTest(int $gap): void
    {
        $tokenSet = new Alpha36TokenSet();

        $calculator = new RankingCalculator(
            $tokenSet,
            new FixedEndPosition($gap),
        );

        $initial = $tokenSet->midToken();

        for ($i = 1; $i <= 100; $i++) {
            $next = $calculator->between($initial, null);

            self::assertFalse(\strcmp($initial, $next) >= 0);

            $initial = $next;
        }
    }
}
