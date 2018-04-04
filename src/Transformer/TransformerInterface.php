<?php

namespace YoannRenard\Pseudolocalization\Transformer;

interface TransformerInterface
{
    /**
     * @param string $message
     *
     * @return string
     */
    public function transform($message);

    /**
     * @return string
     */
    public static function getName();
}
