<?php

namespace YoannRenard\Pseudolocalization\Exception;

class TransformerNotFoundException extends \RuntimeException implements PseudolocalizationExceptionInterface
{
    /**
     * @param string $name
     *
     * @return TransformerNotFoundException
     */
    public static function fromName($name)
    {
        return new self(sprintf('The transformer "%s" does not exist', $name));
    }
}
