<?php

namespace YoannRenard\Pseudolocalization;

use YoannRenard\Pseudolocalization\Transformer\AlternateCaseTransformer;
use YoannRenard\Pseudolocalization\Transformer\DiacriticsTransformer;
use YoannRenard\Pseudolocalization\Transformer\EncloseInBracketsTransformer;
use YoannRenard\Pseudolocalization\Transformer\ExpandTransformer;
use YoannRenard\Pseudolocalization\Transformer\TransformerChain;
use YoannRenard\Pseudolocalization\Transformer\TransformerFactory;
use YoannRenard\Pseudolocalization\Transformer\UpperCaseTransformer;

class TranslatorFactory implements TranslatorFactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public static function create(Config $config = null)
    {
        $config = $config ?: new Config();

        $transformerChain = new TransformerChain();

        if ($config->alternateCase()) {
            $transformerChain->add(TransformerFactory::create(AlternateCaseTransformer::getName()));
        }
        if ($config->upperCase()) {
            $transformerChain->add(TransformerFactory::create(UpperCaseTransformer::getName()));
        }
        if ($config->useDiacriticCharacters()) {
            $transformerChain->add(TransformerFactory::create(DiacriticsTransformer::getName()));
        }
        if ($config->expandString()) {
            $transformerChain->add(TransformerFactory::create(ExpandTransformer::getName()));
        }
        if ($config->encloseInBracket()) {
            $transformerChain->add(TransformerFactory::create(EncloseInBracketsTransformer::getName()));
        }

        return new Translator($transformerChain);
    }
}
