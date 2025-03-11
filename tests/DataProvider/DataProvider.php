<?php declare(strict_types=1);

namespace AdnanMula\LexRanking\Tests\DataProvider;

/** @implements \Iterator<int, array> */
abstract class DataProvider implements \Iterator
{
    private array $items;
    private int $index;

    protected function __construct(array $items)
    {
        $this->assert($items);

        $this->items = $items;
        $this->index = 0;
    }

    public function current(): array
    {
        return $this->items[$this->index];
    }

    public function next(): void
    {
        $this->index++;
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
