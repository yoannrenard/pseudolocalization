<?php

namespace YoannRenard\Pseudolocalization\Transformer;

class EncloseInBracketsTransformer implements TransformerInterface
{
    /**
     * @inheritdoc
     */
    public function transform($message)
    {
        return sprintf('[%s]', $message);
    }

    /**
     * @inheritdoc
     */
    public static function getName()
    {
        return 'enclose_in_bracket';
    }
}
