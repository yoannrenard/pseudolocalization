<?php

namespace YoannRenard\Pseudolocalization\Transformer;

class DiacriticsTransformer implements TransformerInterface
{
    /**
     * @inheritdoc
     */
    public function transform($message)
    {
        return str_replace(
            [
                'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
                'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
            ],
            [
                'á', 'β', 'ç', 'δ', 'è', 'ƒ', 'ϱ', 'λ', 'ï', 'J', 'ƙ', 'ℓ', '₥', 'ñ', 'ô', 'ƥ', '9', 'ř', 'ƨ', 'ƭ', 'ú', 'Ʋ', 'ω', 'ж', '¥', 'ƺ',
                'Â', 'ß', 'Ç', 'Ð', 'É', 'F', 'G', 'H', 'Ì', 'J', 'K', '£', 'M', 'N', 'Ó', 'Þ', 'Q', 'R', '§', 'T', 'Û', 'V', 'W', 'X', 'Ý', 'Z'
            ],
            $message
        );
    }

    /**
     * @inheritdoc
     */
    public static function getName()
    {
        return 'diacritics';
    }
}
