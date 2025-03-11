<?php declare(strict_types=1);

namespace AdnanMula\LexRanking\Tests\DataProvider\Numeric;

use AdnanMula\LexRanking\Tests\DataProvider\DataProvider;

final class NumericGap8EndProvider
{
    public static function valid(): DataProvider
    {
        return new class extends DataProvider {
            public function __construct()
            {
                parent::__construct(
                    [
                        ['0', '9', '1'],
                        ['0', '1', '02'],
                        ['0', '6', '07'],
                        ['0', '99999999', '1'],
                        ['1', '99999999', '19'],
                        ['0', '22222222', '00002'],
                        ['0', '1', '02'],
                        ['0', '8', '09'],
                        ['0000000', '1', '02'],
                        ['08', '9', '1'],
                        ['4', '99', '46'],
                        ['8', '9', '82'],
                        ['988', null, '9883'],
                        ['7', null, '73'],
                        ['0', null, '1'],
                        [null, '9', '1'],
                        [null, '99', '1'],
                        ['9', null, '91'],
                        ['99', null, '991'],
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
