<?php

namespace YoannRenard\Pseudolocalization\Transformer;

use PHPUnit\Framework\TestCase;

class ExpandTransformerTest extends TestCase
{
    /**
     * @test
     */
    public function it_returns_its_name()
    {
        TestCase::assertSame('expand', ExpandTransformer::getName());
    }

    /**
     * @return array
     */
    public function messageDataProvider()
    {
        return [
            ['', null],
            ['', ''],
            ['Lorem ipsum dolor sit amet, consectetur adipiscing elit Lorem ipsum dolor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'],
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
        $transformer = new ExpandTransformer();

        TestCase::assertSame($expectedMessage, $transformer->transform($message));
    }
}
