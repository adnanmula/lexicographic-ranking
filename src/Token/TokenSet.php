<?php declare(strict_types=1);

namespace AdnanMula\LexRanking\Token;

use AdnanMula\LexRanking\Exception\InvalidInputException;
use AdnanMula\LexRanking\Exception\InvalidTokenSetException;

abstract class TokenSet
{
    protected array $set;

    protected function __construct(array $set)
    {
        $this->assert($set);

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
        return \end($this->set);
    }

    public function maxIndex(): int
    {
        return \count($this->set);
    }

    public function getToken(int $index): string
    {
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

    private function assert(array $set): void
    {
        if (0 === \count($set)) {
            throw new InvalidTokenSetException();
        }

        foreach ($set as $token) {
            if (false === \is_string($token)) {
                throw new InvalidTokenSetException();
            }
        }
    }
}
