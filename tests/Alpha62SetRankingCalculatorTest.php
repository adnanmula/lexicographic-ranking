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
use AdnanMula\LexRanking\Tests\DataProvider\TestDataProvider;
use AdnanMula\LexRanking\Token\Alpha62TokenSet;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class Alpha62SetRankingCalculatorTest extends TestCase
{
    #[DataProvider('validAlpha62Gap8StartProvider')]
    public function testValidAlpha62Gap8Start(?string $prev, ?string $next, string $result): void
    {
        $calculator = new RankingCalculator(
            new Alpha62TokenSet(),
            new FixedStartPosition(8),
        );

        $this->assertEquals($result, $calculator->between($prev, $next));
    }

    public static function validAlpha62Gap8StartProvider(): TestDataProvider
    {
        return Alpha62Gap8StartProvider::valid();
    }

    #[DataProvider('invalidAlpha62Gap8StartProvider')]
    public function testInvalidAlpha62Gap8Start(?string $prev, ?string $next): void
    {
        $this->expectException(InvalidInputException::class);

        $calculator = new RankingCalculator(
            new Alpha62TokenSet(),
            new FixedStartPosition(8),
        );

        $calculator->between($prev, $next);
    }

    public static function invalidAlpha62Gap8StartProvider(): TestDataProvider
    {
        return Alpha62Gap8StartProvider::invalid();
    }

    #[DataProvider('validAlpha62Gap8EndProvider')]
    public function testValidAlpha62Gap8End(?string $prev, ?string $next, string $result): void
    {
        $calculator = new RankingCalculator(
            new Alpha62TokenSet(),
            new FixedEndPosition(8),
        );

        $this->assertEquals($result, $calculator->between($prev, $next));
    }

    public static function validAlpha62Gap8EndProvider(): TestDataProvider
    {
        return Alpha62Gap8EndProvider::valid();
    }

    #[DataProvider('invalidAlpha62Gap8EndProvider')]
    public function testInvalidAlpha62Gap8End(?string $prev, ?string $next): void
    {
        $this->expectException(InvalidInputException::class);

        $calculator = new RankingCalculator(
            new Alpha62TokenSet(),
            new FixedEndPosition(8),
        );

        $calculator->between($prev, $next);
    }

    public static function invalidAlpha62Gap8EndProvider(): TestDataProvider
    {
        return Alpha62Gap8EndProvider::invalid();
    }

    #[DataProvider('validAlpha62GapMidProvider')]
    public function testValidAlpha62GapMid(?string $prev, ?string $next, string $result): void
    {
        $calculator = new RankingCalculator(
            new Alpha62TokenSet(),
            new DynamicMidPosition(),
        );

        $this->assertEquals($result, $calculator->between($prev, $next));
    }

    public static function validAlpha62GapMidProvider(): TestDataProvider
    {
        return Alpha62GapMidProvider::valid();
    }

    #[DataProvider('invalidAlpha62GapMidProvider')]
    public function testInvalidAlpha62GapMid(?string $prev, ?string $next): void
    {
        $this->expectException(InvalidInputException::class);

        $calculator = new RankingCalculator(
            new Alpha62TokenSet(),
            new DynamicMidPosition(),
        );

        $calculator->between($prev, $next);
    }

    public static function invalidAlpha62GapMidProvider(): TestDataProvider
    {
        return Alpha62GapMidProvider::invalid();
    }
}
