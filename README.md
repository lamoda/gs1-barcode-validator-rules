Lamoda GS1 Barcode validator rules
==================================

[![Build Status](https://travis-ci.org/lamoda/gs1-barcode-validator-rules.svg?branch=master)](https://travis-ci.org/lamoda/gs1-barcode-validator-rules)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/lamoda/gs1-barcode-validator-rules/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/lamoda/gs1-barcode-validator-rules/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/lamoda/gs1-barcode-validator-rules/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/lamoda/gs1-barcode-validator-rules/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/lamoda/gs1-barcode-validator-rules/badges/build.png?b=master)](https://scrutinizer-ci.com/g/lamoda/gs1-barcode-validator-rules/build-status/master)

## Installation

### Composer

```sh
composer require lamoda/gs1-barcode-validator-rules
```

## Description

This library is a collection of rules for [GS1 barcode parser](https://github.com/lamoda/gs1-barcode-parser) library.

## Rules
1. RussianMarkingCode

## Usage

```php
$parser = new \Lamoda\GS1Parser\Parser\Parser(
    Lamoda\GS1BarcodeValidatorRules\RussianMarkingCode::parserConfig();
);

$validatorConfig = new \Lamoda\GS1Parser\Validator\ValidatorConfig();
$validator = new \Lamoda\GS1Parser\Validator\Validator(
    $parser, 
    Lamoda\GS1BarcodeValidatorRules\RussianMarkingCode::validatorConfig()
);

$value = ']d201034531200000111719112510ABCD1234';

$resolution = $validator->validate($value);

if ($resolution->isValid()) {
    // ...
} else {
    var_dump($resolution->getErrors());
}
```
