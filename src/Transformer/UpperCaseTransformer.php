<?php

namespace YoannRenard\Pseudolocalization\Transformer;

class UpperCaseTransformer implements TransformerInterface
{
    /**
     * {@inheritdoc}
     */
    public function transform($message)
    {
        return strtoupper($message);
    }

    /**
     * {@inheritdoc}
     */
    public static function getName()
    {
        return 'upper_case';
    }
}
