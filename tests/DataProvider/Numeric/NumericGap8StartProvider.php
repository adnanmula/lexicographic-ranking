<?php declare(strict_types=1);

namespace AdnanMula\LexRanking\Tests\DataProvider\Numeric;

use AdnanMula\LexRanking\Tests\DataProvider\TestDataProvider;

final readonly class NumericGap8StartProvider
{
    public static function valid(): TestDataProvider
    {
        return new class extends TestDataProvider {
            public function __construct()
            {
                parent::__construct(
                    [
                        ['0', '6', '03'],
                        ['0', '2', '07'],
                        ['0', '1', '08'],
                        ['0', '99999999', '8'],
                        ['1', '99999999', '11'],
                        ['0', '22222222222222222222', '00000001'],
                        ['0', '2222222222222', '00000001'],
                        ['0', '2222222', '00000001'],
                        ['0', '222222', '0000002'],
                        ['0', '22222', '000003'],
                        ['0', '2222', '00004'],
                        ['0', '222', '0005'],
                        ['2', '3', '28'],
                        ['0000000', '1', '08'],
                        ['0', '8', '01'],
                        ['08', '9', '8'],
                        ['08', '7', '082'],
                        ['4', '99', '44'],
                        ['8', '9', '88'],
                        ['0', null, '8'],
                        [null, '9', '8'],
                        [null, '99', '8'],
                        ['9', null, '98'],
                        ['99', null, '998'],
                        ['988', null, '9888'],
                        ['7', null, '77'],
                    ],
                );
            }
        };
    }

    public static function invalid(): TestDataProvider
    {
        return new class extends TestDataProvider {
            public function __construct()
            {
                parent::__construct(
                    [
                        ['5', '22222222'],
                        ['A0', '9'],
                        ['9', '9'],
                        ['98', '8'],
                        ['1', '-1'],
                        ['9', '8'],
                        ['1', '0'],
                        ['a', null],
                        ['A', null],
                        ['\'',null],
                        ['´', null],
                        ['η', null],
                        ['φ', null],
                        ['ك', null],
                        ['ب', null],
                        ['Б', null],
                        ['Х', null],
                        ['Ѭ', null],
                        [null, 'a'],
                        [null, 'A'],
                        [null, '\''],
                        [null, '´'],
                        [null, 'η'],
                        [null, 'φ'],
                        [null, 'ك'],
                        [null, 'ب'],
                        [null, 'Б'],
                        [null, 'Х'],
                        [null, 'Ѭ'],
                    ],
                );
            }
        };
    }
}
