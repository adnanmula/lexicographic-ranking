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
use AdnanMula\LexRanking\Tests\DataProvider\TestDataProvider;
use AdnanMula\LexRanking\Token\Alpha36TokenSet;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

final class Alpha36SetRankingCalculatorTest extends TestCase
{
    #[DataProvider('validAlpha36Gap8StartProvider')]
    public function testValidAlpha36Gap8Start(?string $prev, ?string $next, string $result): void
    {
        $calculator = new RankingCalculator(
            new Alpha36TokenSet(),
            new FixedStartPosition(8),
        );

        $this->assertEquals($result, $calculator->between($prev, $next));
    }

    public static function validAlpha36Gap8StartProvider(): TestDataProvider
    {
        return Alpha36Gap8StartProvider::valid();
    }

    #[DataProvider('invalidAlpha36Gap8StartProvider')]
    public function testInvalidAlpha36Gap8Start(?string $prev, ?string $next): void
    {
        $this->expectException(InvalidInputException::class);

        $calculator = new RankingCalculator(
            new Alpha36TokenSet(),
            new FixedStartPosition(8),
        );

        $calculator->between($prev, $next);
    }

    public static function invalidAlpha36Gap8StartProvider(): TestDataProvider
    {
        return Alpha36Gap8StartProvider::invalid();
    }

    #[DataProvider('validAlpha36Gap8EndProvider')]
    public function testValidAlpha36Gap8End(?string $prev, ?string $next, string $result): void
    {
        $calculator = new RankingCalculator(
            new Alpha36TokenSet(),
            new FixedEndPosition(8),
        );

        $this->assertEquals($result, $calculator->between($prev, $next));
    }

    public static function validAlpha36Gap8EndProvider(): TestDataProvider
    {
        return Alpha36Gap8EndProvider::valid();
    }

    #[DataProvider('invalidAlpha36Gap8EndProvider')]
    public function testInvalidAlpha36Gap8End(?string $prev, ?string $next): void
    {
        $this->expectException(InvalidInputException::class);

        $calculator = new RankingCalculator(
            new Alpha36TokenSet(),
            new FixedEndPosition(8),
        );

        $calculator->between($prev, $next);
    }

    public static function invalidAlpha36Gap8EndProvider(): TestDataProvider
    {
        return Alpha36Gap8EndProvider::invalid();
    }

    #[DataProvider('validAlpha36GapMidProvider')]
    public function testValidAlpha36GapMid(?string $prev, ?string $next, string $result): void
    {
        $calculator = new RankingCalculator(
            new Alpha36TokenSet(),
            new DynamicMidPosition(),
        );

        $this->assertEquals($result, $calculator->between($prev, $next));
    }

    public static function validAlpha36GapMidProvider(): TestDataProvider
    {
        return Alpha36GapMidProvider::valid();
    }

    #[DataProvider('invalidAlpha36GapMidProvider')]
    public function testInvalidAlpha36GapMid(?string $prev, ?string $next): void
    {
        $this->expectException(InvalidInputException::class);

        $calculator = new RankingCalculator(
            new Alpha36TokenSet(),
            new DynamicMidPosition(),
        );

        $calculator->between($prev, $next);
    }

    public static function invalidAlpha36GapMidProvider(): TestDataProvider
    {
        return Alpha36GapMidProvider::invalid();
    }
}
