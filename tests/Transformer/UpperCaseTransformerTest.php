<?php

namespace YoannRenard\Pseudolocalization\Transformer;

use PHPUnit\Framework\TestCase;

class UpperCaseTransformerTest extends TestCase
{
    /**
     * @test
     */
    public function it_returns_its_name()
    {
        TestCase::assertSame('upper_case', UpperCaseTransformer::getName());
    }

    /**
     * @return array
     */
    public function messageDataProvider()
    {
        return [
            ['', null],
            ['', ''],
            ['LOREM IPSUM DOLOR SIT AMET, CONSECTETUR ADIPISCING ELIT...', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...'],
            ['<a href="http://www.google.com/">LOREM <u>IPSUM</u></a>', '<a href="http://www.google.com/">Lorem <u>ipsum</u></a>'],
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
        $transformer = new UpperCaseTransformer();

        TestCase::assertSame($expectedMessage, $transformer->transform($message));
    }
}
