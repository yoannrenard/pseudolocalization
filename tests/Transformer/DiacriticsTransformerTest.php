<?php

namespace YoannRenard\Pseudolocalization\Transformer;

use PHPUnit\Framework\TestCase;

class DiacriticsTransformerTest extends TestCase
{
    /**
     * @test
     */
    public function it_returns_its_name()
    {
        TestCase::assertSame('diacritics', DiacriticsTransformer::getName());
    }

    /**
     * @return array
     */
    public function messageDataProvider()
    {
        return [
            ['', null],
            ['', ''],
            ['áβçδèƒϱλïJƙℓ₥ñôƥ9řƨƭúƲωж¥ƺÂßÇÐÉFGHÌJK£MNÓÞQR§TÛVWXÝZ', 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'],
            ['£ôřè₥ ïƥƨú₥ δôℓôř ƨïƭ á₥èƭ, çôñƨèçƭèƭúř áδïƥïƨçïñϱ èℓïƭ...', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...'],
            ['<a href="http://www.google.com/">£ôřè₥ <u>ïƥƨú₥</u></a>', '<a href="http://www.google.com/">Lorem <u>ipsum</u></a>'],
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
        $transformer = new DiacriticsTransformer();

        TestCase::assertSame($expectedMessage, $transformer->transform($message));
    }
}
