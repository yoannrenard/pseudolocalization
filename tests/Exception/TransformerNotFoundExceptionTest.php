<?php

namespace YoannRenard\Pseudolocalization\Exception;

use PHPUnit\Framework\TestCase;

class TransformerNotFoundExceptionTest extends TestCase
{
    /**
     * @test
     */
    public function it_throws_a_TransformerNotFoundException_fromName()
    {
        TestCase::assertEquals(
            new TransformerNotFoundException('The transformer "Unknown transformer" does not exist'),
            TransformerNotFoundException::fromName('Unknown transformer')
        );
    }
}
