<?php

namespace YoannRenard\Pseudolocalization\Transformer;

class AlternateCaseTransformer implements TransformerInterface
{
    const CASE_TRANSFORMER = 'alternate';

    /**
     * {@inheritdoc}
     */
    public function transform($message)
    {
        $transformedMessage = '';

        foreach (str_split($message) as $key => $letter) {
            $transformedMessage .= 0 === $key%2 ? strtoupper($letter) : $letter;
        }

        return $transformedMessage;
    }

    /**
     * {@inheritdoc}
     */
    public static function getName()
    {
        return 'alternate_case';
    }
}
