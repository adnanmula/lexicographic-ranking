<?php declare(strict_types=1);

namespace AdnanMula\LexRanking\Token;

use AdnanMula\LexRanking\Exception\InvalidInputException;
use AdnanMula\LexRanking\Exception\InvalidTokenSetException;

abstract class TokenSet
{
    /** @var array<string> */
    protected array $set;

    protected function __construct(string ...$set)
    {
        if (0 === \count($set)) {
            throw new InvalidTokenSetException();
        }

        $this->set = $set;
    }

    public function minToken(): string
    {
        return $this->set[0];
    }

    public function midToken(): string
    {
        return $this->set[\floor(\count($this->set) / 2) - 1];
    }

    public function maxToken(): string
    {
        /** @var string $lastToken */
        $lastToken = \end($this->set);

        return $lastToken;
    }

    public function maxIndex(): int
    {
        return \count($this->set);
    }

    public function getToken(int $index): string
    {
        if (0 > $index) {
            throw new InvalidInputException();
        }

        if (\count($this->set) - 1 < $index) {
            $index %= \count($this->set);
        }

        return $this->set[$index];
    }

    public function getIndex(string $token): int
    {
        $index = \array_search($token, $this->set, true);

        if (false === $index || \is_string($index)) {
            throw new InvalidInputException();
        }

        return $index;
    }

    public function isValid(string $input): bool
    {
        return 0 === \count(\array_diff(\str_split($input), $this->set));
    }
}
