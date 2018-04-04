<?php

namespace YoannRenard\Pseudolocalization\Transformer;

use PHPUnit\Framework\TestCase;

class TransformerChainTest extends TestCase
{
    /**
     * @test
     */
    public function i_can_add_a_new_transformer()
    {
        $transformerMock = $this->prophesize(TransformerInterface::class);

        $transformerChain = new TransformerChain();

        TestCase::assertCount(0, $transformerChain);

        $transformerChain->add($transformerMock->reveal());

        TestCase::assertCount(1, $transformerChain);
    }

    /**
     * @test
     */
    public function it_returns_an_ArrayIterator()
    {
        $transformerChain = new TransformerChain();

        TestCase::assertInstanceOf(\ArrayIterator::class, $transformerChain->getIterator());
    }
}
