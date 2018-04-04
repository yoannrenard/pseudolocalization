<?php

namespace YoannRenard\Pseudolocalization;

interface TranslatorInterface
{
    /**
     * @param string $message
     *
     * @return string
     */
    public function trans($message);
}
