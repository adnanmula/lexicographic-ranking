<?php declare(strict_types=1);

namespace AdnanMula\LexRanking\Tests\DataProvider\Alpha36;

use AdnanMula\LexRanking\Tests\DataProvider\TestDataProvider;

final readonly class Alpha36GapMidProvider
{
    public static function valid(): TestDataProvider
    {
        return new class extends TestDataProvider {
            public function __construct()
            {
                parent::__construct(
                    [
                        ['X', 'Y', 'XH'],
                        ['AAA', 'AAB', 'AAAH'],
                        [null, '1', '0H'],
                        ['A', 'B', 'AH'],
                        ['0', '1', '0H'],
                        ['0', 'Z', 'H'],
                        [null, 'Z1', 'H'],
                        [null, '7', '3'],
                        ['07', 'H', '8'],
                        ['Z6', 'ZZ', 'ZK'],
                        ['FB', 'FW', 'FL'],
                        ['F6', 'Z', 'P'],
                        ['G', 'Z', 'P'],
                        ['O', 'Z', 'T'],
                        ['W', 'W8', 'W4'],
                        ['Z6', null, 'ZK'],
                        ['F6', null, 'P'],
                        ['W8', 'Z', 'X'],
                        ['W', 'Z', 'X'],
                        ['7', 'G', 'B'],
                        [null, 'G', '8'],
                        ['00001', 'Z', 'H'],
                        ['ASDF5T', 'ASDF5Z', 'ASDF5W'],
                        ['ASDF', 'ASDF5Z', 'ASDF2'],
                        ['7', null, 'L'],
                        ['AAA', 'ZZZ', 'M'],
                        [null, 'Z', 'H'],
                        [null, 'ZZZ', 'H'],
                        ['ZZZ', null, 'ZZZH'],
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
