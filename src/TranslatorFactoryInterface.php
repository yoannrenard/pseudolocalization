<?php

namespace YoannRenard\Pseudolocalization;

interface TranslatorFactoryInterface
{
    /**
     * @param Config $config
     *
     * @return TranslatorInterface
     */
    public static function create(Config $config = null);
}
