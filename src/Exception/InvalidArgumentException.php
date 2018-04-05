<?php

namespace YoannRenard\Pseudolocalization\Exception;

class InvalidArgumentException extends \InvalidArgumentException implements PseudolocalizationExceptionInterface
{
    /**
     * @param string $argumentName
     *
     * @return InvalidArgumentException
     */
    public static function booleanArgument($argumentName)
    {
        return new self(sprintf('The field `%s` must be a boolean', $argumentName));
    }

    /**
     * @param string $argumentName
     * @param array  $values
     *
     * @return InvalidArgumentException
     */
    public static function inArrayArgument($argumentName, array $values)
    {
        return new self(sprintf('The field `%s` must be in (`%s`)', $argumentName, implode('`, `', $values)));
    }
}
