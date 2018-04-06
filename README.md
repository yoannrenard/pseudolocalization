# Pseudolocalization

[![Build Status](https://travis-ci.org/yoannrenard/pseudolocalization.svg?branch=master)](https://travis-ci.org/yoannrenard/pseudolocalization)  

Pseudo language generator

## Requirements

* PHP 5.6 or higher;

## How to Install

```bash
$ composer require yoannrenard/pseudolocalization
```

## Test it

```bash
$ vendor/bin/phpunit
```

## Usage

Using the default pseudolocalization translation : 

```php
use YoannRenard\Pseudolocalization\TranslatorFactory;

$translator = TranslatorFactory::create();
echo $translator->trans('Lorem ipsum');
  // [£ôřè₥ ïƥƨú₥ Lorem ip]
```

Using a config DTO class :  

```php
use YoannRenard\Pseudolocalization\Config;
use YoannRenard\Pseudolocalization\TranslatorFactory;

$translator = TranslatorFactory::create(new Config(true, 'upper', true, true));
echo $translator->trans('Lorem ipsum');
  // [£ÓRÉM ÌÞ§ÛM Lorem]
```

Using the whole bunch of transformers :

```php
use YoannRenard\Pseudolocalization\Translator;
use YoannRenard\Pseudolocalization\Transformer\TransformerChain;
use YoannRenard\Pseudolocalization\Transformer\TransformerFactory;

$translator = new Translator(new TransformerChain([
    TransformerFactory::create('alternate_case'),
    TransformerFactory::create('diacritics'),
]));
echo $translator->trans('Lorem ipsum');
  // £ôRèM Ìƥ§úM
```
