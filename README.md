# Lexicographic Ranking

Lexicographic order calculator, useful for persisting ordered lists.

## Installation

Install via [composer](https://getcomposer.org/)

```shell
composer require adnanmula/lexicographic-ranking
```

## Usage

```php
$calculator = new RankingCalculator(
    new Alpha36TokenSet(),
    new DynamicMidPosition()
);

echo $calculator->between('A', 'B');   // AU
echo $calculator->between('F6', 'Z');  // P
echo $calculator->between('FB', 'FW'); // FL
echo $calculator->between(null, '7');  // 3
echo $calculator->between(null, null); // U
```

## Config options
### Token sets

The char pool to create the rankings. The following are available:
```
NumericTokenSet (0-9)
Alpha36TokenSet (0-9 and A-Z)
Alpha62TokenSet (0-9 and A-z)
```
To create a custom one extend from TokenSet. 

### Position
The space to be left between ranks. The following modes are available:
```
FixedStartPosition  // Leaves a fixed amount of spaces after the first input
FixedEndPosition    // Leaves a fixed amount of spaces before the second input
DynamicMidPosition  // Leaves the same space before and after the result
```
To create a custom one implement Position. 
