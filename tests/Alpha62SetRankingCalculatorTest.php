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
    /** @dataProvider validAlpha62Gap8StartProvider */
    public function testValidAlpha62Gap8Start(?string $prev, ?string $next, string $result): void
    {
        $calculator = new RankingCalculator(
            new Alpha62TokenSet(),
            new FixedStartPosition(8),
        );

        $this->assertEquals($result, $calculator->between($prev, $next));
    }

    public static function validAlpha62Gap8StartProvider(): DataProvider
    {
        return Alpha62Gap8StartProvider::valid();
    }

    /** @dataProvider invalidAlpha62Gap8StartProvider */
    public function testInvalidAlpha62Gap8Start(?string $prev, ?string $next): void
    {
        $this->expectException(InvalidInputException::class);

        $calculator = new RankingCalculator(
            new Alpha62TokenSet(),
            new FixedStartPosition(8),
        );

        $calculator->between($prev, $next);
    }

    public static function invalidAlpha62Gap8StartProvider(): DataProvider
    {
        return Alpha62Gap8StartProvider::invalid();
    }

    /** @dataProvider validAlpha62Gap8EndProvider */
    public function testValidAlpha62Gap8End(?string $prev, ?string $next, string $result): void
    {
        $calculator = new RankingCalculator(
            new Alpha62TokenSet(),
            new FixedEndPosition(8),
        );

        $this->assertEquals($result, $calculator->between($prev, $next));
    }

    public static function validAlpha62Gap8EndProvider(): DataProvider
    {
        return Alpha62Gap8EndProvider::valid();
    }

    /** @dataProvider invalidAlpha62Gap8EndProvider */
    public function testInvalidAlpha62Gap8End(?string $prev, ?string $next): void
    {
        $this->expectException(InvalidInputException::class);

        $calculator = new RankingCalculator(
            new Alpha62TokenSet(),
            new FixedEndPosition(8),
        );

        $calculator->between($prev, $next);
    }

    public static function invalidAlpha62Gap8EndProvider(): DataProvider
    {
        return Alpha62Gap8EndProvider::invalid();
    }

    /** @dataProvider validAlpha62GapMidProvider */
    public function testValidAlpha62GapMid(?string $prev, ?string $next, string $result): void
    {
        $calculator = new RankingCalculator(
            new Alpha62TokenSet(),
            new DynamicMidPosition(),
        );

        $this->assertEquals($result, $calculator->between($prev, $next));
    }

    public static function validAlpha62GapMidProvider(): DataProvider
    {
        return Alpha62GapMidProvider::valid();
    }

    /** @dataProvider invalidAlpha62GapMidProvider */
    public function testInvalidAlpha62GapMid(?string $prev, ?string $next): void
    {
        $this->expectException(InvalidInputException::class);

        $calculator = new RankingCalculator(
            new Alpha62TokenSet(),
            new DynamicMidPosition(),
        );

        $calculator->between($prev, $next);
    }

    public static function invalidAlpha62GapMidProvider(): DataProvider
    {
        return Alpha62GapMidProvider::invalid();
    }
}
