<?php declare(strict_types=1);

namespace AdnanMula\LexRanking\Tests;

use AdnanMula\LexRanking\Exception\InvalidInputException;
use AdnanMula\LexRanking\Position\DynamicMidPosition;
use AdnanMula\LexRanking\Position\FixedEndPosition;
use AdnanMula\LexRanking\Position\FixedStartPosition;
use AdnanMula\LexRanking\RankingCalculator;
use AdnanMula\LexRanking\Tests\DataProvider\DataProvider;
use AdnanMula\LexRanking\Tests\DataProvider\Numeric\NumericGap8EndProvider;
use AdnanMula\LexRanking\Tests\DataProvider\Numeric\NumericGap8StartProvider;
use AdnanMula\LexRanking\Tests\DataProvider\Numeric\NumericGapMidProvider;
use AdnanMula\LexRanking\Token\NumericTokenSet;
use PHPUnit\Framework\TestCase;

final class NumericSetRankingCalculatorTest extends TestCase
{
    /** @dataProvider validNumericGap8StartProvider */
    public function testValidNumericGap8Start(?string $prev, ?string $next, string $result): void
    {
        $calculator = new RankingCalculator(
            new NumericTokenSet(),
            new FixedStartPosition(8),
        );

        $this->assertEquals($result, $calculator->between($prev, $next));
    }

    public static function validNumericGap8StartProvider(): DataProvider
    {
        return NumericGap8StartProvider::valid();
    }

    /** @dataProvider invalidNumericGap8StartProvider */
    public function testInvalidNumericGap8Start(?string $prev, ?string $next): void
    {
        $this->expectException(InvalidInputException::class);

        $calculator = new RankingCalculator(
            new NumericTokenSet(),
            new FixedStartPosition(8),
        );

        $calculator->between($prev, $next);
    }

    public static function invalidNumericGap8StartProvider(): DataProvider
    {
        return NumericGap8StartProvider::invalid();
    }

    /** @dataProvider validNumericGap8EndProvider */
    public function testValidNumericGap8End(?string $prev, ?string $next, string $result): void
    {
        $calculator = new RankingCalculator(
            new NumericTokenSet(),
            new FixedEndPosition(8),
        );

        $this->assertEquals($result, $calculator->between($prev, $next));
    }

    public static function validNumericGap8EndProvider(): DataProvider
    {
        return NumericGap8EndProvider::valid();
    }

    /** @dataProvider invalidNumericGap8EndProvider */
    public function testInvalidNumericGap8End(?string $prev, ?string $next): void
    {
        $this->expectException(InvalidInputException::class);

        $calculator = new RankingCalculator(
            new NumericTokenSet(),
            new FixedEndPosition(8),
        );

        $calculator->between($prev, $next);
    }

    public static function invalidNumericGap8EndProvider(): DataProvider
    {
        return NumericGap8EndProvider::invalid();
    }

    /** @dataProvider validNumericGapMidProvider */
    public function testValidNumericGapMid(?string $prev, ?string $next, string $result): void
    {
        $calculator = new RankingCalculator(
            new NumericTokenSet(),
            new DynamicMidPosition(),
        );

        $this->assertEquals($result, $calculator->between($prev, $next));
    }

    public static function validNumericGapMidProvider(): DataProvider
    {
        return NumericGapMidProvider::valid();
    }

    /** @dataProvider invalidNumericGapMidProvider */
    public function testInvalidNumericGapMid(?string $prev, ?string $next): void
    {
        $this->expectException(InvalidInputException::class);

        $calculator = new RankingCalculator(
            new NumericTokenSet(),
            new DynamicMidPosition(),
        );

        $calculator->between($prev, $next);
    }

    public static function invalidNumericGapMidProvider(): DataProvider
    {
        return NumericGapMidProvider::invalid();
    }
}
