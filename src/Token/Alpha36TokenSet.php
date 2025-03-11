<?php declare(strict_types=1);

namespace AdnanMula\LexRanking\Token;

final class Alpha36TokenSet extends TokenSet
{
    public function __construct()
    {
        parent::__construct(
            \array_merge(
                \array_map('strval', \range('0', '9')),
                \range('A', 'Z'),
            ),
        );
    }
}
