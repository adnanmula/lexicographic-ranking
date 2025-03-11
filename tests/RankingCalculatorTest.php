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
     * @test
     * @dataProvider valid_fixed_gap_provider
     * @doesNotPerformAssertions
     */
    public function valid_fixed_gap_start_test(int $gap): void
    {
        new RankingCalculator(
            new Alpha62TokenSet(),
            new FixedStartPosition($gap),
        );
    }

    /**
     * @test
     * @dataProvider valid_fixed_gap_provider
     * @doesNotPerformAssertions
     */
    public function valid_fixed_gap_end_test(int $gap): void
    {
        new RankingCalculator(
            new Alpha62TokenSet(),
            new FixedEndPosition($gap),
        );
    }

    public function valid_fixed_gap_provider(): array
    {
        return [[1], [20], [36], [62]];
    }

    /**
     * @test
     * @dataProvider invalid_fixed_gap_provider
     */
    public function invalid_fixed_gap_test(int $gap): void
    {
        $this->expectException(InvalidPositionException::class);

        $calculator = new RankingCalculator(
            new Alpha36TokenSet(),
            new FixedStartPosition($gap),
        );

        $calculator->between(null, null);
    }

    public function invalid_fixed_gap_provider(): array
    {
        return [[0], [-1], [-99], [37], [62]];
    }
}
