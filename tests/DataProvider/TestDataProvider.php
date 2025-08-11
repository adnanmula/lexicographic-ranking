<?php declare(strict_types=1);

namespace AdnanMula\LexRanking\Tests\DataProvider;

use Iterator;

/** @implements Iterator<int, array> */
abstract class TestDataProvider implements Iterator
{
    private int $index;

    protected function __construct(
        private readonly array $items,
    ) {
        $this->assert($items);

        $this->index = 0;
    }

    public function current(): array
    {
        return $this->items[$this->index];
    }

    public function next(): void
    {
        ++$this->index;
    }

    public function key(): int
    {
        return $this->index;
    }

    public function valid(): bool
    {
        return isset($this->items[$this->key()]);
    }

    public function rewind(): void
    {
        $this->index = 0;
    }

    private function assert(array $items): void
    {
        foreach ($items as $item) {
            if (false === \is_array($item)) {
                throw new \InvalidArgumentException('Invalid DataProvider data.');
            }
        }
    }
}
