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
        // Exclude HTML tags
        if (0 < preg_match('/<.*>/', $message)) {
            return preg_replace_callback(
                '/>([^<]*)/si',
                function ($matches) {
                    return strtoupper($matches[0]);
                },
                $message
            );
        }

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
