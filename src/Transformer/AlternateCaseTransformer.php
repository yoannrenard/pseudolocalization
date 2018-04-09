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
        /**
         * @param string $message
         * @return string
         */
        $handler = function ($message) {
            $transformedMessage = '';

            foreach (str_split($message) as $key => $letter) {
                $transformedMessage .= 0 === $key%2 ? strtoupper($letter) : $letter;
            }

            return $transformedMessage;
        };


        // Exclude HTML tags
        if (0 < preg_match('/<.*>/', $message)) {
            return preg_replace_callback(
                '/>([^<]*)/si',
                function ($matches) use ($handler) {
                    return $handler($matches[0]);
                },
                $message
            );
        }


        return $handler($message);
    }

    /**
     * {@inheritdoc}
     */
    public static function getName()
    {
        return 'alternate_case';
    }
}
