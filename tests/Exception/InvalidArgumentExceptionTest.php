<?php

namespace YoannRenard\Pseudolocalization\Exception;

use PHPUnit\Framework\TestCase;

class InvalidArgumentExceptionTest extends TestCase
{
    /**
     * @test
     */
    public function it_returns_an_InvalidArgumentException_as_the_argument_is_not_a_boolean()
    {
        TestCase::assertEquals(
            new InvalidArgumentException('The field `diacriticCharacters` must be a boolean'),
            InvalidArgumentException::booleanArgument('diacriticCharacters')
        );
    }

    /**
     * @test
     */
    public function it_returns_an_InvalidArgumentException_as_the_argument_is_not_in_array()
    {
        TestCase::assertEquals(
            new InvalidArgumentException('The field `caseConversion` must be in (`alternate`, `upper`)'),
            InvalidArgumentException::inArrayArgument('caseConversion', ['alternate', 'upper'])
        );
    }
}
