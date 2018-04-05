<?php

namespace YoannRenard\Pseudolocalization;

use PHPUnit\Framework\TestCase;
use YoannRenard\Pseudolocalization\Transformer\TransformerChain;
use YoannRenard\Pseudolocalization\Transformer\TransformerInterface;

class TranslatorTest extends TestCase
{
    /**
     * @test
     */
    public function it_iterates_on_every_transformer()
    {
        $transformerMock1 = $this->prophesize(TransformerInterface::class);
        $transformerMock2 = $this->prophesize(TransformerInterface::class);

        $transformerChain = new TransformerChain([$transformerMock1->reveal(), $transformerMock2->reveal()]);

        $transformerMock1
            ->transform('Lorem ipsum dolor sit amet, consectetur adipiscing elit...')
            ->willReturn('Lorem ipsum dolor sit amet');
        $transformerMock2
            ->transform('Lorem ipsum dolor sit amet')
            ->willReturn('Lorem ipsum');

        $translator = new Translator($transformerChain);
        $pseudolocaliziedMessage = $translator->trans('Lorem ipsum dolor sit amet, consectetur adipiscing elit...');

        TestCase::assertEquals('Lorem ipsum', $pseudolocaliziedMessage);
    }
}
