# Lexicographic Ranking

[![PHP Version](https://img.shields.io/badge/PHP-%3E=8.4-777BB4.svg)](https://www.php.net/)
[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

A PHP library for generating lexicographically ordered strings, useful for maintaining ordered lists in databases without requiring reindexing operations.

## What is Lexicographic Ranking?

Lexicographic ranking is a technique used to generate strings that maintain a specific order. This is particularly useful when you need to:

- Insert items between existing ordered items without reindexing the entire collection
- Maintain a stable ordering in databases where items are frequently added between existing items
- Implement ordered lists where the order needs to be persisted

For example, if you have items with ranks "A" and "B", and need to insert a new item between them, this library will generate a rank like "AU" that lexicographically falls between "A" and "B".

## Requirements

- PHP 8.4 or higher

## Installation

Install via [Composer](https://getcomposer.org/):

```shell
composer require adnanmula/lexicographic-ranking
```

## Usage

```php
use AdnanMula\LexRanking\RankingCalculator;
use AdnanMula\LexRanking\Token\Alpha36TokenSet;
use AdnanMula\LexRanking\Position\DynamicMidPosition;

// Create a calculator with your preferred token set and position strategy
$calculator = new RankingCalculator(
    new Alpha36TokenSet(),    // Character set: 0-9 and A-Z
    new DynamicMidPosition(), // Position strategy: place in the middle
);

// Generate a rank between two existing ranks
$calculator->between('A', 'B');   // AU (a rank between A and B)
$calculator->between('F6', 'Z');  // P (a rank between F6 and Z)
$calculator->between('FB', 'FW'); // FL (a rank between FB and FW)

// Generate a rank at the beginning or end
$calculator->between(null, '7');  // 3 (a rank before 7)
$calculator->between('X', null);  // Y (a rank after X)

// Generate a rank when no bounds are specified
$calculator->between(null, null); // U (a rank in the middle of the available space)

$calculator2 = new RankingCalculator(
    new Alpha36TokenSet(),    // Character set: 0-9 and A-Z
    new FixedStartPosition(gap: 2), // Position strategy: place in the middle
);

$calculator->between(null, null); // 2 (a rank 2 position (defined by the gap) after the first available space on the token set)
```

When there's not enough space between two ranks, the library will add additional characters to create more space:

```php
$calculator = new RankingCalculator(
    new NumericTokenSet(),
    new DynamicMidPosition(),
);

$calculator->between('1', '2');  // 14

$calculator2 = new RankingCalculator(
    new Alpha62TokenSet(),
    new FixedStartPosition(gap: 1),
);

$rank1 = $calculator2->between('A', 'B');    // A1
$rank2 = $calculator2->between('A', $rank1); // A01
$rank3 = $calculator2->between('A', $rank2); // A001
$rank4 = $calculator2->between('A', $rank3); // A0001
$rank5 = $calculator2->between('A', $rank4); // A00001
```

## Configuration Options

### Token Sets

Token sets define the character pool used for generating ranks. The library provides three built-in token sets:

```php
// Digits only (0-9) - 10 characters
new NumericTokenSet()

// Alphanumeric (0-9 and A-Z) - 36 characters
new Alpha36TokenSet()

// Extended alphanumeric (0-9, A-Z, and a-z) - 62 characters
new Alpha62TokenSet()
```

The choice of token set affects the number of possible ranks that can be generated between two values. Larger token sets provide more possible combinations.

#### Creating Custom Token Sets

You can create custom token sets by extending the `TokenSet` abstract class:

```php
use AdnanMula\LexRanking\Token\TokenSet;

final class CustomTokenSet extends TokenSet
{
    public function __construct()
    {
        // Pass your custom character set to the parent constructor
        parent::__construct(...['0', '1', '2', '3', '4', '5']);
    }
}
```

### Position Strategies

Position strategies determine how to calculate the position of a new rank between two existing ranks. The library provides three built-in strategies:

```php
// Places the new rank in the middle between the two input ranks
new DynamicMidPosition()

// Leaves a fixed amount of space after the first input
new FixedStartPosition()

// Leaves a fixed amount of space before the second input
new FixedEndPosition()
```

#### Creating Custom Position Strategies

You can create custom position strategies by implementing the `Position` interface:

```php
use AdnanMula\LexRanking\Position\Position;
use AdnanMula\LexRanking\Token\TokenSet;

final class CustomPosition implements Position
{
    public function next(TokenSet $set, string $prev, string $next, int $offset): ?string
    {
        // Your custom logic to determine the next token
    }

    public function availableSpace(TokenSet $set, string $prev, string $next): int
    {
        // Your custom logic to calculate available space
    }
}
```

## Development

### Running Tests

The project uses PHPUnit for testing. To run the tests:

```shell
make tests
```

### Code Quality

The project uses several tools to ensure code quality:

- Phpcs for coding standards
- PHPStan for static analysis
- GrumPHP for code quality checks
- Infection for mutation testing

To run code quality checks:

```shell
make grump
```

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.
