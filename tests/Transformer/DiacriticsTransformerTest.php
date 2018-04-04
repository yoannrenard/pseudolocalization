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
            ['áβçδèƒϱλïJƙℓ₥ñôƥ9řƨƭúƲωж¥ƺ', 'abcdefghijklmnopqrstuvwxyz'],
            ['ÂßÇÐÉFGHÌJK£MNÓÞQR§TÛVWXÝZ', 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'],
            ['£ôřè₥ ïƥƨú₥ δôℓôř ƨïƭ á₥èƭ, çôñƨèçƭèƭúř áδïƥïƨçïñϱ èℓïƭ...', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...'],
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
