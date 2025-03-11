<?php declare(strict_types=1);

namespace AdnanMula\LexRanking\Tests\DataProvider\Alpha36;

use AdnanMula\LexRanking\Tests\DataProvider\DataProvider;

final class Alpha36Gap8EndProvider
{
    public static function valid(): DataProvider
    {
        return new class extends DataProvider {
            public function __construct()
            {
                parent::__construct(
                    [
                        [null, '1', '0S'],
                        ['A', 'B', 'AS'],
                        ['0', '1', '0S'],
                        ['0', 'Z', 'R'],
                        [null, 'Z1', 'R'],
                        [null, 'Y1G', 'Q'],
                        [null, 'W13', 'O'],
                        [null, '7', '0Y'],
                        ['07', 'H', '9'],
                        ['Z6', 'ZZ', 'ZR'],
                        ['FB', 'FW', 'FO'],
                        ['F6', 'Z', 'R'],
                        ['G', 'Z', 'R'],
                        ['O', 'Z', 'R'],
                        ['W', 'W8', 'W0Z'],
                        ['Z6', null, 'ZR'],
                        ['F6', null, 'R'],
                        ['W8', 'Z', 'WU'],
                        ['W', 'Z', 'WU'],
                        ['7', 'G', '8'],
                        [null, 'G', '8'],
                        ['00001', 'Z', 'R'],
                        ['ASDF5T', 'ASDF5Z', 'ASDF5TX'],
                        ['ASDF', 'ASDF5Z', 'ASDF0W'],
                        ['7', null, 'R'],
                        ['0', 'Z', 'R'],
                        [null, 'Z', 'R'],
                        [null, 'ZZZ', 'R'],
                        ['ZZZ', null, 'ZZZR'],
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
                        [null, '0'],
                        ['A0', '9'],
                        ['9', '9'],
                        ['98', '8'],
                        ['1', '-1'],
                        ['9', '8'],
                        ['1', '0'],
                        ['BBB', 'A'],
                        ['ZZZ', '0'],
                        ['ABCDA', 'ABCD'],
                        ['a', null],
                        ['\'',null],
                        ['´', null],
                        ['η', null],
                        ['φ', null],
                        ['ك', null],
                        ['ب', null],
                        ['Б', null],
                        ['Б1', 'Б'],
                        ['Х', null],
                        ['Ѭ', null],
                        ['Ѭ', 'Ѭ'],
                        [null, 'a'],
                        [null, '\''],
                        [null, '´'],
                        [null, 'η'],
                        [null, 'φ'],
                        [null, 'ك'],
                        [null, 'ب'],
                        [null, 'Б'],
                        [null, 'Х'],
                        [null, 'Ѭ'],
                        ['Z6', 'Z'],
                        ['F6', 'F'],
                    ],
                );
            }
        };
    }
}
