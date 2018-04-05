# Pseudolocalization

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
  // [£ôRèM Ìƥ§úM Lorem]
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
use YoannRenard\Pseudolocalization\Config;
use YoannRenard\Pseudolocalization\Translator;
use YoannRenard\Pseudolocalization\Transformer\TransformerChain;
use YoannRenard\Pseudolocalization\Transformer\TransformerFactory;
use YoannRenard\Pseudolocalization\TranslatorFactory;

$translator = new Translator(new TransformerChain([
    TransformerFactory::create('alternate_case'),
    TransformerFactory::create('diacritics'),
    TransformerFactory::create('expand'),
    TransformerFactory::create('enclose_in_bracket'),
]));
echo $translator->trans('Lorem ipsum');
  // [£ôRèM Ìƥ§úM Lorem]
```

