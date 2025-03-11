<?php declare(strict_types=1);

namespace AdnanMula\LexRanking\Tests;

use AdnanMula\LexRanking\Exception\InvalidInputException;
use AdnanMula\LexRanking\Position\DynamicMidPosition;
use AdnanMula\LexRanking\Position\FixedEndPosition;
use AdnanMula\LexRanking\Position\FixedStartPosition;
use AdnanMula\LexRanking\RankingCalculator;
use AdnanMula\LexRanking\Tests\DataProvider\Alpha36\Alpha36Gap8EndProvider;
use AdnanMula\LexRanking\Tests\DataProvider\Alpha36\Alpha36Gap8StartProvider;
use AdnanMula\LexRanking\Tests\DataProvider\Alpha36\Alpha36GapMidProvider;
use AdnanMula\LexRanking\Tests\DataProvider\DataProvider;
use AdnanMula\LexRanking\Token\Alpha36TokenSet;
use PHPUnit\Framework\TestCase;

final class Alpha36SetRankingCalculatorTest extends TestCase
{
    /**
     * @test
     * @dataProvider valid_alpha36_gap8_start_provider
     */
    public function valid_alpha36_gap8_start_test(?string $prev, ?string $next, string $result): void
    {
        $calculator = new RankingCalculator(
            new Alpha36TokenSet(),
            new FixedStartPosition(8),
        );

        $this->assertEquals($result, $calculator->between($prev, $next));
    }

    public function valid_alpha36_gap8_start_provider(): DataProvider
    {
        return Alpha36Gap8StartProvider::valid();
    }

    /**
     * @test
     * @dataProvider invalid_alpha36_gap8_start_provider
     */
    public function invalid_alpha36_gap8_start_test(?string $prev, ?string $next): void
    {
        $this->expectException(InvalidInputException::class);

        $calculator = new RankingCalculator(
            new Alpha36TokenSet(),
            new FixedStartPosition(8),
        );

        $calculator->between($prev, $next);
    }

    public function invalid_alpha36_gap8_start_provider(): DataProvider
    {
        return Alpha36Gap8StartProvider::invalid();
    }

    /**
     * @test
     * @dataProvider valid_alpha36_gap8_end_provider
     */
    public function valid_alpha36_gap8_end_test(?string $prev, ?string $next, string $result): void
    {
        $calculator = new RankingCalculator(
            new Alpha36TokenSet(),
            new FixedEndPosition(8),
        );

        $this->assertEquals($result, $calculator->between($prev, $next));
    }

    public function valid_alpha36_gap8_end_provider(): DataProvider
    {
        return Alpha36Gap8EndProvider::valid();
    }

    /**
     * @test
     * @dataProvider invalid_alpha36_gap8_end_provider
     */
    public function invalid_alpha36_gap8_end_test(?string $prev, ?string $next): void
    {
        $this->expectException(InvalidInputException::class);

        $calculator = new RankingCalculator(
            new Alpha36TokenSet(),
            new FixedEndPosition(8),
        );

        $calculator->between($prev, $next);
    }

    public function invalid_alpha36_gap8_end_provider(): DataProvider
    {
        return Alpha36Gap8EndProvider::invalid();
    }

    /**
     * @test
     * @dataProvider valid_alpha36_gap_mid_provider
     */
    public function valid_alpha36_gap_mid_test(?string $prev, ?string $next, string $result): void
    {
        $calculator = new RankingCalculator(
            new Alpha36TokenSet(),
            new DynamicMidPosition(),
        );

        $this->assertEquals($result, $calculator->between($prev, $next));
    }

    public function valid_alpha36_gap_mid_provider(): DataProvider
    {
        return Alpha36GapMidProvider::valid();
    }

    /**
     * @test
     * @dataProvider invalid_alpha36_gap_mid_provider
     */
    public function invalid_alpha36_gap_mid_test(?string $prev, ?string $next): void
    {
        $this->expectException(InvalidInputException::class);

        $calculator = new RankingCalculator(
            new Alpha36TokenSet(),
            new DynamicMidPosition(),
        );

        $calculator->between($prev, $next);
    }

    public function invalid_alpha36_gap_mid_provider(): DataProvider
    {
        return Alpha36GapMidProvider::invalid();
    }
}
