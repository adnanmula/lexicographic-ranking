<?php declare(strict_types=1);

namespace AdnanMula\LexRanking\Tests;

use AdnanMula\LexRanking\Exception\InvalidPositionException;
use AdnanMula\LexRanking\Position\FixedEndPosition;
use AdnanMula\LexRanking\Position\FixedStartPosition;
use AdnanMula\LexRanking\RankingCalculator;
use AdnanMula\LexRanking\Token\Alpha36TokenSet;
use AdnanMula\LexRanking\Token\Alpha62TokenSet;
use PHPUnit\Framework\TestCase;

final class RankingCalculatorTest extends TestCase
{
    /**
     * @dataProvider validFixedGapProvider
     * @doesNotPerformAssertions
     */
    public function testStartValidFixedGap(int $gap): void
    {
        new RankingCalculator(
            new Alpha62TokenSet(),
            new FixedStartPosition($gap),
        );
    }

    /**
     * @dataProvider validFixedGapProvider
     * @doesNotPerformAssertions
     */
    public function testEndValidFixedGap(int $gap): void
    {
        new RankingCalculator(
            new Alpha62TokenSet(),
            new FixedEndPosition($gap),
        );
    }

    public static function validFixedGapProvider(): array
    {
        return [[1], [20], [36], [62]];
    }

    /** @dataProvider invalidFixedGapProvider */
    public function testStartInvalidFixedGap(int $gap): void
    {
        $this->expectException(InvalidPositionException::class);

        $calculator = new RankingCalculator(
            new Alpha36TokenSet(),
            new FixedStartPosition($gap),
        );

        $calculator->between(null, null);
    }

    public static function invalidFixedGapProvider(): array
    {
        return [[0], [-1], [-99], [37], [62]];
    }
}
