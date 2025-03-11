<?php declare(strict_types=1);

namespace AdnanMula\LexRanking\Tests\DataProvider\Numeric;

use AdnanMula\LexRanking\Tests\DataProvider\DataProvider;

final class NumericGapMidProvider
{
    public static function valid(): DataProvider
    {
        return new class extends DataProvider {
            public function __construct()
            {
                parent::__construct(
                    [
                        ['0', '9', '4'],
                        ['0', '1', '04'],
                        ['0', '9', '4'],
                        ['0', '9', '4'],
                        ['0', '6', '3'],
                        ['0', '99999999', '4'],
                        ['1', '99999999', '5'],
                        ['0', '22222222', '1'],
                        ['0', '1', '04'],
                        ['0000000', '1', '04'],
                        ['0', '8', '4'],
                        ['08', '9', '4'],
                        ['4', '99', '6'],
                        ['8', '9', '84'],
                        ['988', null, '9884'],
                        ['7', null, '8'],
                        ['0', null, '4'],
                        [null, null, '4'],
                        [null, '9', '4'],
                        [null, '99', '4'],
                        ['9', null, '94'],
                        ['99', null, '994'],
                    ],
                );
            }
        };
    }

    public static function invalid(): DataProvider
    {
        return new class extends DataProvider {
            public function __construct()
            {
                parent::__construct(
                    [
                        ['2', '2'],
                        ['5', '5'],
                        ['5', '22222222'],
                        ['5', '20'],
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
