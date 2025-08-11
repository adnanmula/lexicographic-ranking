<?php declare(strict_types=1);

namespace AdnanMula\LexRanking\Tests;

use AdnanMula\LexRanking\Exception\InvalidInputException;
use AdnanMula\LexRanking\Exception\InvalidPositionException;
use AdnanMula\LexRanking\Exception\InvalidTokenSetException;
use AdnanMula\LexRanking\Position\DynamicMidPosition;
use AdnanMula\LexRanking\Position\FixedEndPosition;
use AdnanMula\LexRanking\Position\FixedStartPosition;
use AdnanMula\LexRanking\RankingCalculator;
use AdnanMula\LexRanking\Tests\Mock\EmptyTokenSet;
use AdnanMula\LexRanking\Token\Alpha36TokenSet;
use AdnanMula\LexRanking\Token\Alpha62TokenSet;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\DoesNotPerformAssertions;
use PHPUnit\Framework\TestCase;

final class RankingCalculatorTest extends TestCase
{
    #[DoesNotPerformAssertions]
    #[DataProvider('validFixedGapProvider')]
    public function testStartValidFixedGap(int $gap): void
    {
        new RankingCalculator(
            new Alpha62TokenSet(),
            new FixedStartPosition($gap),
        );
    }

    #[DoesNotPerformAssertions]
    #[DataProvider('validFixedGapProvider')]
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

    #[DataProvider('invalidFixedGapProvider')]
    public function testStartInvalidFixedGapStart(int $gap): void
    {
        $this->expectException(InvalidPositionException::class);
        $this->expectExceptionMessage('Invalid gap');

        $calculator = new RankingCalculator(
            new Alpha36TokenSet(),
            new FixedStartPosition($gap),
        );

        $calculator->between(null, null);
    }

    #[DataProvider('invalidFixedGapProvider')]
    public function testStartInvalidFixedGapEnd(int $gap): void
    {
        $this->expectException(InvalidPositionException::class);
        $this->expectExceptionMessage('Invalid gap');

        $calculator = new RankingCalculator(
            new Alpha36TokenSet(),
            new FixedEndPosition($gap),
        );

        $calculator->between(null, null);
    }

    public static function invalidFixedGapProvider(): array
    {
        return [[0], [-1], [-99], [37], [62]];
    }

    public function testInvalidTokenSet(): void
    {
        $this->expectException(InvalidTokenSetException::class);
        $this->expectExceptionMessage('Invalid token set');

        $calculator = new RankingCalculator(
            new EmptyTokenSet(),
            new DynamicMidPosition(),
        );

        $calculator->between(null, null);
    }

    public function testInvalidTokenSetHandling(): void
    {
        $this->expectException(InvalidInputException::class);
        $this->expectExceptionMessage('Invalid input');

        $set = new Alpha62TokenSet();
        $set->getToken(-1);
    }

    public function testGetTokenOnTokenSet(): void
    {
        $set = new Alpha62TokenSet();
        self::assertEquals('0', $set->getToken(0));
        self::assertEquals('1', $set->getToken(1));
        self::assertEquals('A', $set->getToken(10));
        self::assertEquals('z', $set->getToken(61));
        self::assertEquals('0', $set->getToken(62));
        self::assertEquals('1', $set->getToken(63));
        self::assertEquals('A', $set->getToken(72));
    }

    public function testGetIndexOfNonExistingTokenInTokenSet(): void
    {
        $this->expectException(InvalidInputException::class);
        $this->expectExceptionMessage('Invalid input');

        $set = new Alpha62TokenSet();
        $set->getIndex('$');
    }
}
