<?php declare(strict_types=1);

namespace AdnanMula\LexRanking\Tests;

use AdnanMula\LexRanking\Exception\InvalidInputException;
use AdnanMula\LexRanking\Position\DynamicMidPosition;
use AdnanMula\LexRanking\Position\FixedEndPosition;
use AdnanMula\LexRanking\Position\FixedStartPosition;
use AdnanMula\LexRanking\RankingCalculator;
use AdnanMula\LexRanking\Tests\DataProvider\Alpha62\Alpha62Gap8EndProvider;
use AdnanMula\LexRanking\Tests\DataProvider\Alpha62\Alpha62Gap8StartProvider;
use AdnanMula\LexRanking\Tests\DataProvider\Alpha62\Alpha62GapMidProvider;
use AdnanMula\LexRanking\Tests\DataProvider\DataProvider;
use AdnanMula\LexRanking\Token\Alpha62TokenSet;
use PHPUnit\Framework\TestCase;

final class Alpha62SetRankingCalculatorTest extends TestCase
{
    /**
     * @test
     * @dataProvider valid_alpha62_gap8_start_provider
     */
    public function valid_alpha62_gap8_start_test(?string $prev, ?string $next, string $result): void
    {
        $calculator = new RankingCalculator(
            new Alpha62TokenSet(),
            new FixedStartPosition(8),
        );

        $this->assertEquals($result, $calculator->between($prev, $next));
    }

    public function valid_alpha62_gap8_start_provider(): DataProvider
    {
        return Alpha62Gap8StartProvider::valid();
    }

    /**
     * @test
     * @dataProvider invalid_alpha62_gap8_start_provider
     */
    public function invalid_alpha62_gap8_start_test(?string $prev, ?string $next): void
    {
        $this->expectException(InvalidInputException::class);

        $calculator = new RankingCalculator(
            new Alpha62TokenSet(),
            new FixedStartPosition(8),
        );

        $calculator->between($prev, $next);
    }

    public function invalid_alpha62_gap8_start_provider(): DataProvider
    {
        return Alpha62Gap8StartProvider::invalid();
    }

    /**
     * @test
     * @dataProvider valid_alpha62_gap8_end_provider
     */
    public function valid_alpha62_gap8_end_test(?string $prev, ?string $next, string $result): void
    {
        $calculator = new RankingCalculator(
            new Alpha62TokenSet(),
            new FixedEndPosition(8),
        );

        $this->assertEquals($result, $calculator->between($prev, $next));
    }

    public function valid_alpha62_gap8_end_provider(): DataProvider
    {
        return Alpha62Gap8EndProvider::valid();
    }

    /**
     * @test
     * @dataProvider invalid_alpha62_gap8_end_provider
     */
    public function invalid_alpha62_gap8_end_test(?string $prev, ?string $next): void
    {
        $this->expectException(InvalidInputException::class);

        $calculator = new RankingCalculator(
            new Alpha62TokenSet(),
            new FixedEndPosition(8),
        );

        $calculator->between($prev, $next);
    }

    public function invalid_alpha62_gap8_end_provider(): DataProvider
    {
        return Alpha62Gap8EndProvider::invalid();
    }

    /**
     * @test
     * @dataProvider valid_alpha62_gap_mid_provider
     */
    public function valid_alpha62_gap_mid_test(?string $prev, ?string $next, string $result): void
    {
        $calculator = new RankingCalculator(
            new Alpha62TokenSet(),
            new DynamicMidPosition(),
        );

        $this->assertEquals($result, $calculator->between($prev, $next));
    }

    public function valid_alpha62_gap_mid_provider(): DataProvider
    {
        return Alpha62GapMidProvider::valid();
    }

    /**
     * @test
     * @dataProvider invalid_alpha62_gap_mid_provider
     */
    public function invalid_alpha62_gap_mid_test(?string $prev, ?string $next): void
    {
        $this->expectException(InvalidInputException::class);

        $calculator = new RankingCalculator(
            new Alpha62TokenSet(),
            new DynamicMidPosition(),
        );

        $calculator->between($prev, $next);
    }

    public function invalid_alpha62_gap_mid_provider(): DataProvider
    {
        return Alpha62GapMidProvider::invalid();
    }
}
