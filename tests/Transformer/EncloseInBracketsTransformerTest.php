<?php

namespace YoannRenard\Pseudolocalization\Transformer;

use PHPUnit\Framework\TestCase;

class EncloseInBracketsTransformerTest extends TestCase
{
    /**
     * @test
     */
    public function it_returns_its_name()
    {
        TestCase::assertSame('enclose_with_bracket', EncloseInBracketsTransformer::getName());
    }

    /**
     * @return array
     */
    public function messageDataProvider()
    {
        return [
            ['[]', null],
            ['[]', ''],
            ['[[]', '['],
            ['[]]', ']'],
            ['[Lorem ipsum]', 'Lorem ipsum'],
        ];
    }

    /**
     * @param string $expectedMessage
     * @param string $message
     *
     * @test
     *
     * @dataProvider messageDataProvider
     */
    public function it_returns_the_formatted_message($expectedMessage, $message)
    {
        $transformer = new EncloseInBracketsTransformer();

        TestCase::assertSame($expectedMessage, $transformer->transform($message));
    }
}
