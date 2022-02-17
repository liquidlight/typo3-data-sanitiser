# TYPO3 Data Sanitiser

An expansion of [randomizer](https://gitlab.com/mhuber84/randomizer).

## Installation

```
composer req liquidlight/data-sanitiser:dev-main
```

## Usage

Data Sanitiser follows the same format as Randomizer, but instead of putting everything in your `ext_localconf` it tidies it away in a class.

Create a new class which extends `LiquidLight\DataSanitiser\Service\AbstractSanitiser` and set the table, mapping unique and equal properties.

There is an example `FeUsersSanitiser` class provided for you to copy.

In the `ext_localconf`, instantiate the `SanitiserRegistry` and pass in your sanitisers. The `registerSanitiser` method takes a comma seperated list of sanitisers

For example:

```php
$sanitiserRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\LiquidLight\DataSanitiser\Service\SanitiserRegistry::class, 'en_GB');
$sanitiserRegistry->registerSanitiser(
	\LiquidLight\DataSanitiser\Service\FeUsersSanitiser::class
);
```
## Todo

- Add a "limit" property, allowing you to cull tables to X amount of rows
- Add a "database:export" style functionality to randomise on export
