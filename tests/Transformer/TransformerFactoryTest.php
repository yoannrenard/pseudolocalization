<?php

namespace YoannRenard\Pseudolocalization\Transformer;

use PHPUnit\Framework\TestCase;

class TransformerFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function it_returns_a_AlternateCaseTransformer()
    {
        TestCase::assertInstanceOf(AlternateCaseTransformer::class, TransformerFactory::create('alternate_case'));
    }

    /**
     * @test
     */
    public function it_returns_a_DiacriticsTransformer()
    {
        TestCase::assertInstanceOf(DiacriticsTransformer::class, TransformerFactory::create('diacritics'));
    }

    /**
     * @test
     */
    public function it_returns_a_EncloseInBracketsTransformer()
    {
        TestCase::assertInstanceOf(EncloseInBracketsTransformer::class, TransformerFactory::create('enclose_in_bracket'));
    }

    /**
     * @test
     */
    public function it_returns_a_ExpandTransformer()
    {
        TestCase::assertInstanceOf(ExpandTransformer::class, TransformerFactory::create('expand'));
    }

    /**
     * @test
     */
    public function it_returns_a_UpperCaseTransformer()
    {
        TestCase::assertInstanceOf(UpperCaseTransformer::class, TransformerFactory::create('upper_case'));
    }
}
