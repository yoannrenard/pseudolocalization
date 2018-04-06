<?php

namespace YoannRenard\Pseudolocalization;

use PHPUnit\Framework\TestCase;
use YoannRenard\Pseudolocalization\Transformer\AlternateCaseTransformer;
use YoannRenard\Pseudolocalization\Transformer\DiacriticsTransformer;
use YoannRenard\Pseudolocalization\Transformer\EncloseInBracketsTransformer;
use YoannRenard\Pseudolocalization\Transformer\ExpandTransformer;
use YoannRenard\Pseudolocalization\Transformer\TransformerChain;
use YoannRenard\Pseudolocalization\Transformer\TransformerFactory;
use YoannRenard\Pseudolocalization\Transformer\UpperCaseTransformer;

class TranslatorFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function it_creates_a_Translator_from_a_default_Config()
    {
        TestCase::assertEquals(
            new Translator(new TransformerChain([
                TransformerFactory::create(DiacriticsTransformer::getName()),
                TransformerFactory::create(ExpandTransformer::getName()),
                TransformerFactory::create(EncloseInBracketsTransformer::getName()),
            ])),
            TranslatorFactory::create()
        );
    }

    /**
     * @test
     */
    public function it_creates_a_Translator_from_an_empty_Config()
    {
        $config = new Config(false, '', false, false);

        TestCase::assertEquals(
            new Translator(new TransformerChain()),
            TranslatorFactory::create($config)
        );
    }

    /**
     * @test
     */
    public function it_creates_a_Translator_from_a_given_Config()
    {
        $config = new Config(true, 'upper', false, true);

        TestCase::assertEquals(
            new Translator(new TransformerChain([
                TransformerFactory::create(UpperCaseTransformer::getName()),
                TransformerFactory::create(DiacriticsTransformer::getName()),
                TransformerFactory::create(EncloseInBracketsTransformer::getName()),
            ])),
            TranslatorFactory::create($config)
        );
    }
}
