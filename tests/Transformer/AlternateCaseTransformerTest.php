<?php

namespace YoannRenard\Pseudolocalization\Transformer;

use PHPUnit\Framework\TestCase;

class AlternateCaseTransformerTest extends TestCase
{
    /**
     * @test
     */
    public function it_returns_its_name()
    {
        TestCase::assertSame('alternate_case', AlternateCaseTransformer::getName());
    }

    /**
     * @return array
     */
    public function messageDataProvider()
    {
        return [
            ['', null],
            ['', ''],
            ['LoReM IpSuM DoLoR SiT AmEt, CoNsEcTeTuR AdIpIsCiNg eLiT...', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...'],
            ['<a href="http://www.google.com/">LOrEm <u>iPsUm</u></a>', '<a href="http://www.google.com/">Lorem <u>ipsum</u></a>'],
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
        $transformer = new AlternateCaseTransformer();

        TestCase::assertSame($expectedMessage, $transformer->transform($message));
    }
}
