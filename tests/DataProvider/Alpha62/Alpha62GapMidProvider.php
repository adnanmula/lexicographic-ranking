<?php declare(strict_types=1);

namespace AdnanMula\LexRanking\Tests\DataProvider\Alpha62;

use AdnanMula\LexRanking\Tests\DataProvider\DataProvider;

final class Alpha62GapMidProvider
{
    public static function valid(): DataProvider
    {
        return new class extends DataProvider {
            public function __construct()
            {
                parent::__construct(
                    [
                        ['0', '1', '0U'],
                        ['1', '2', '1U'],
                        ['g', 'ge', 'gK'],
                        ['ge', 'gf', 'geU'],
                        ['geU', 'gez', 'gej'],
                        ['6yu2jr', '7yut6iji', '6yuS'],
                        ['6yu3jr', '7yut6ijit', '6yuT'],
                        ['6yu4jr', '7yut6ijreti', '6yuT'],
                        ['6yu5jr', '7yut6i4t3i', '6yuU'],
                        ['2', 't', 'S'],
                        ['3', 't', 'T'],
                        ['4', 't', 'T'],
                        ['5', 't', 'U'],
                        ['A', 'B', 'AU'],
                        ['0', '1', '0U'],
                        ['a', 'b', 'aU'],
                        ['Z', 'z', 'm'],
                        ['7', 'G', 'B'],
                        [null, 'G', '8'],
                        ['00001', 'z', 'U'],
                        ['AsDF5T', 'AsDF5Z', 'AsDF5W'],
                        ['ASDF5T', 'AsDF5Z', 'Af'],
                        ['A', 'Az', 'AU'],
                        ['A', 'A7', 'A3'],
                        ['x', null, 'y'],
                        ['AaD3rtT', 'At', 'Aj'],
                        ['ZNTbx8XnWx', 'imHgQJWlyw', 'd'],
                        ['ZNTbx8XnWx', 'ZNTbx8XnWz', 'ZNTbx8XnWy'],
                        [
                            'aaaaaaaaaaaaaaaaaaaaaaaaaaab',
                            'aaaaaaaaaaaaaaaaaaaaaaaaaaac',
                            'aaaaaaaaaaaaaaaaaaaaaaaaaaabU',
                        ],
                        ['aaaaaaaaaaaaaa', 'zzzzzzzzzz', 'm'],
                        [null, 'z', 'U'],
                        [null, 'zz', 'U'],
                        [null, 'zzz', 'U'],
                        ['z', null, 'zU'],
                        ['zz', null, 'zzU'],
                        ['zzzz', null, 'zzzzU'],
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
                        ['A0', '9'],
                        ['9', '9'],
                        ['98', '8'],
                        ['1', '-1'],
                        ['9', '8'],
                        ['1', '0'],
                        ['BBB', 'A'],
                        ['bbb', 'A'],
                        ['ZZZ', '0'],
                        ['zZZ', '0'],
                        ['ABCDA', 'ABCD'],
                        ['aBCD', 'ABCD'],
                        ['\'',null],
                        ['´', null],
                        ['η', null],
                        ['φ', null],
                        ['ك', null],
                        ['ب', null],
                        ['Б', null],
                        ['Х', null],
                        ['Ѭ', null],
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
