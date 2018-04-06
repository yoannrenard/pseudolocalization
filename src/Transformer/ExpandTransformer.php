<?php

namespace YoannRenard\Pseudolocalization\Transformer;

class ExpandTransformer implements TransformerInterface
{
    const LOREM = <<<OEF
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
OEF;

    /**
     * {@inheritdoc}
     */
    public function transform($message)
    {
        if (0 === strlen($message)) {
            return '';
        }

        return sprintf(
            '%s %s',
            $message,
            trim(substr(self::LOREM, 0, round(strlen($message)/3)))
        );
    }

    /**
     * {@inheritdoc}
     */
    public static function getName()
    {
        return 'expand';
    }
}
