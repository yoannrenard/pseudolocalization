<?php

namespace YoannRenard\Pseudolocalization\Transformer;

class UpperCaseTransformer implements TransformerInterface
{
    const CASE_TRANSFORMER = 'upper';

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
