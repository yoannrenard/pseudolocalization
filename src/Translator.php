<?php

namespace YoannRenard\Pseudolocalization;

use YoannRenard\Pseudolocalization\Transformer\TransformerChain;
use YoannRenard\Pseudolocalization\Transformer\TransformerInterface;

class Translator implements TranslatorInterface
{
    /** @var TransformerChain */
    private $transformerChain;

    /**
     * @param TransformerChain $transformerChain
     */
    public function __construct(TransformerChain $transformerChain)
    {
        $this->transformerChain = $transformerChain;
    }

    /**
     * {@inheritdoc}
     */
    public function trans($message)
    {
        /** @var TransformerInterface $transformer */
        foreach ($this->transformerChain as $transformer) {
            $message = $transformer->transform($message);
        }

        return $message;
    }
}
