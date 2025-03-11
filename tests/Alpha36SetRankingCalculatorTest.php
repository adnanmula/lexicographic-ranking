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
    /** @dataProvider validAlpha36Gap8StartProvider */
    public function testValidAlpha36Gap8Start(?string $prev, ?string $next, string $result): void
    {
        $calculator = new RankingCalculator(
            new Alpha36TokenSet(),
            new FixedStartPosition(8),
        );

        $this->assertEquals($result, $calculator->between($prev, $next));
    }

    public static function validAlpha36Gap8StartProvider(): DataProvider
    {
        return Alpha36Gap8StartProvider::valid();
    }

    /** @dataProvider invalidAlpha36Gap8StartProvider */
    public function testInvalidAlpha36Gap8Start(?string $prev, ?string $next): void
    {
        $this->expectException(InvalidInputException::class);

        $calculator = new RankingCalculator(
            new Alpha36TokenSet(),
            new FixedStartPosition(8),
        );

        $calculator->between($prev, $next);
    }

    public static function invalidAlpha36Gap8StartProvider(): DataProvider
    {
        return Alpha36Gap8StartProvider::invalid();
    }

    /** @dataProvider validAlpha36Gap8EndProvider */
    public function testValidAlpha36Gap8End(?string $prev, ?string $next, string $result): void
    {
        $calculator = new RankingCalculator(
            new Alpha36TokenSet(),
            new FixedEndPosition(8),
        );

        $this->assertEquals($result, $calculator->between($prev, $next));
    }

    public static function validAlpha36Gap8EndProvider(): DataProvider
    {
        return Alpha36Gap8EndProvider::valid();
    }

    /** @dataProvider invalidAlpha36Gap8EndProvider */
    public function testInvalidAlpha36Gap8End(?string $prev, ?string $next): void
    {
        $this->expectException(InvalidInputException::class);

        $calculator = new RankingCalculator(
            new Alpha36TokenSet(),
            new FixedEndPosition(8),
        );

        $calculator->between($prev, $next);
    }

    public static function invalidAlpha36Gap8EndProvider(): DataProvider
    {
        return Alpha36Gap8EndProvider::invalid();
    }

    /** @dataProvider validAlpha36GapMidProvider */
    public function testValidAlpha36GapMid(?string $prev, ?string $next, string $result): void
    {
        $calculator = new RankingCalculator(
            new Alpha36TokenSet(),
            new DynamicMidPosition(),
        );

        $this->assertEquals($result, $calculator->between($prev, $next));
    }

    public static function validAlpha36GapMidProvider(): DataProvider
    {
        return Alpha36GapMidProvider::valid();
    }

    /** @dataProvider invalidAlpha36GapMidProvider */
    public function testInvalidAlpha36GapMid(?string $prev, ?string $next): void
    {
        $this->expectException(InvalidInputException::class);

        $calculator = new RankingCalculator(
            new Alpha36TokenSet(),
            new DynamicMidPosition(),
        );

        $calculator->between($prev, $next);
    }

    public static function invalidAlpha36GapMidProvider(): DataProvider
    {
        return Alpha36GapMidProvider::invalid();
    }
}
