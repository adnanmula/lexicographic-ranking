<?php declare(strict_types=1);

namespace AdnanMula\LexRanking\Tests\DataProvider\Alpha36;

use AdnanMula\LexRanking\Tests\DataProvider\TestDataProvider;

final readonly class Alpha36Gap8StartProvider
{
    public static function valid(): TestDataProvider
    {
        return new class extends TestDataProvider {
            public function __construct()
            {
                parent::__construct(
                    [
                        [null, '1', '08'],
                        ['A', 'B', 'A8'],
                        ['A', 'C', 'A7'],
                        ['0', '1', '08'],
                        ['0', 'Z', '8'],
                        [null, 'Z1', '8'],
                        [null, '7', '02'],
                        ['07', 'H', '8'],
                        ['Z6', 'ZZ', 'ZE'],
                        ['FB', 'FW', 'FJ'],
                        ['F6', 'Z', 'N'],
                        ['G', 'Z', 'O'],
                        ['O', 'Z', 'W'],
                        ['W', 'W8', 'W01'],
                        ['W', 'W00', 'W008'],
                        ['Z6', null, 'ZE'],
                        ['F6', null, 'N'],
                        ['W8', 'Z', 'WE'],
                        ['W', 'Z', 'W6'],
                        ['7', 'G', 'F'],
                        [null, 'G', '8'],
                        ['00001', 'Z', '8'],
                        ['ASDF5T', 'ASDF5Z', 'ASDF5T3'],
                        ['ASDF', 'ASDF5Z', 'ASDF04'],
                        ['7', null, 'F'],
                        [null, 'Z', '8'],
                        [null, 'ZZZ', '8'],
                        ['ZZZ', null, 'ZZZ8'],
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
                        ['A', 'A'],
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
