<?php declare(strict_types=1);

namespace AdnanMula\LexRanking\Tests;

use AdnanMula\LexRanking\Exception\InvalidInputException;
use AdnanMula\LexRanking\Position\DynamicMidPosition;
use AdnanMula\LexRanking\Position\FixedEndPosition;
use AdnanMula\LexRanking\Position\FixedStartPosition;
use AdnanMula\LexRanking\RankingCalculator;
use AdnanMula\LexRanking\Tests\DataProvider\Numeric\NumericGap8EndProvider;
use AdnanMula\LexRanking\Tests\DataProvider\Numeric\NumericGap8StartProvider;
use AdnanMula\LexRanking\Tests\DataProvider\Numeric\NumericGapMidProvider;
use AdnanMula\LexRanking\Tests\DataProvider\TestDataProvider;
use AdnanMula\LexRanking\Token\NumericTokenSet;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class NumericSetRankingCalculatorTest extends TestCase
{
    #[DataProvider('validNumericGap8StartProvider')]
    public function testValidNumericGap8Start(?string $prev, ?string $next, string $result): void
    {
        $calculator = new RankingCalculator(
            new NumericTokenSet(),
            new FixedStartPosition(8),
        );

        $this->assertEquals($result, $calculator->between($prev, $next));
    }

    public static function validNumericGap8StartProvider(): TestDataProvider
    {
        return NumericGap8StartProvider::valid();
    }

    #[DataProvider('invalidNumericGap8StartProvider')]
    public function testInvalidNumericGap8Start(?string $prev, ?string $next): void
    {
        $this->expectException(InvalidInputException::class);

        $calculator = new RankingCalculator(
            new NumericTokenSet(),
            new FixedStartPosition(8),
        );

        $calculator->between($prev, $next);
    }

    public static function invalidNumericGap8StartProvider(): TestDataProvider
    {
        return NumericGap8StartProvider::invalid();
    }

    #[DataProvider('validNumericGap8EndProvider')]
    public function testValidNumericGap8End(?string $prev, ?string $next, string $result): void
    {
        $calculator = new RankingCalculator(
            new NumericTokenSet(),
            new FixedEndPosition(8),
        );

        $this->assertEquals($result, $calculator->between($prev, $next));
    }

    public static function validNumericGap8EndProvider(): TestDataProvider
    {
        return NumericGap8EndProvider::valid();
    }

    #[DataProvider('invalidNumericGap8EndProvider')]
    public function testInvalidNumericGap8End(?string $prev, ?string $next): void
    {
        $this->expectException(InvalidInputException::class);

        $calculator = new RankingCalculator(
            new NumericTokenSet(),
            new FixedEndPosition(8),
        );

        $calculator->between($prev, $next);
    }

    public static function invalidNumericGap8EndProvider(): TestDataProvider
    {
        return NumericGap8EndProvider::invalid();
    }

    #[DataProvider('validNumericGapMidProvider')]
    public function testValidNumericGapMid(?string $prev, ?string $next, string $result): void
    {
        $calculator = new RankingCalculator(
            new NumericTokenSet(),
            new DynamicMidPosition(),
        );

        $this->assertEquals($result, $calculator->between($prev, $next));
    }

    public static function validNumericGapMidProvider(): TestDataProvider
    {
        return NumericGapMidProvider::valid();
    }

    #[DataProvider('invalidNumericGapMidProvider')]
    public function testInvalidNumericGapMid(?string $prev, ?string $next): void
    {
        $this->expectException(InvalidInputException::class);

        $calculator = new RankingCalculator(
            new NumericTokenSet(),
            new DynamicMidPosition(),
        );

        $calculator->between($prev, $next);
    }

    public static function invalidNumericGapMidProvider(): TestDataProvider
    {
        return NumericGapMidProvider::invalid();
    }
}
