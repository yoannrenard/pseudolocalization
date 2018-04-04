<?php

namespace YoannRenard\Pseudolocalization\Transformer;

use YoannRenard\Pseudolocalization\Exception\TransformerNotFoundException;

class TransformerFactory
{
    /**
     * @param string $name
     *
     * @return TransformerInterface
     *
     * @throws TransformerNotFoundException
     */
    public static function create($name)
    {
        switch ($name) {
            case AlternateCaseTransformer::getName():
                return new AlternateCaseTransformer();
                break;
            case DiacriticsTransformer::getName():
                return new DiacriticsTransformer();
                break;
            case EncloseInBracketsTransformer::getName():
                return new EncloseInBracketsTransformer();
                break;
            case ExpandTransformer::getName():
                return new ExpandTransformer();
                break;
            case UpperCaseTransformer::getName():
                return new UpperCaseTransformer();
                break;
        }

        throw TransformerNotFoundException::fromName($name);
    }
}
