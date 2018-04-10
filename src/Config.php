<?php

namespace YoannRenard\Pseudolocalization;

use YoannRenard\Pseudolocalization\Exception\InvalidArgumentException;
use YoannRenard\Pseudolocalization\Transformer\AlternateCaseTransformer;
use YoannRenard\Pseudolocalization\Transformer\UpperCaseTransformer;

class Config
{
    public static $supportedCaseList = [AlternateCaseTransformer::CASE_TRANSFORMER, UpperCaseTransformer::CASE_TRANSFORMER];

    /** @var bool */
    private $diacriticCharacters;

    /** @var string */
    private $caseConversion;

    /** @var bool */
    private $expandString;

    /** @var bool */
    private $encloseInBracket;

    /**
     * @param bool   $diacriticCharacters
     * @param string $caseConversion
     * @param bool   $expandString
     * @param bool   $encloseInBracket
     */
    public function __construct($diacriticCharacters = true, $caseConversion = '', $expandString = true, $encloseInBracket = true)
    {
        if (!is_bool($diacriticCharacters)) {
            throw InvalidArgumentException::booleanArgument('diacriticCharacters');
        }
        if (!empty($caseConversion) && !in_array($caseConversion, self::$supportedCaseList, true)) {
            throw InvalidArgumentException::inArrayArgument('caseConversion', self::$supportedCaseList);
        }
        if (!is_bool($expandString)) {
            throw InvalidArgumentException::booleanArgument('expandString');
        }
        if (!is_bool($encloseInBracket)) {
            throw InvalidArgumentException::booleanArgument('encloseInBracket');
        }

        $this->diacriticCharacters = $diacriticCharacters;
        $this->caseConversion      = $caseConversion;
        $this->expandString        = $expandString;
        $this->encloseInBracket  = $encloseInBracket;
    }

    /**
     * @return bool
     */
    public function useDiacriticCharacters()
    {
        return $this->diacriticCharacters;
    }

    /**
     * @return bool
     */
    public function alternateCase()
    {
        return 'alternate' === $this->caseConversion;
    }

    /**
     * @return bool
     */
    public function upperCase()
    {
        return 'upper' === $this->caseConversion;
    }

    /**
     * @return bool
     */
    public function expandString()
    {
        return $this->expandString;
    }

    /**
     * @return bool
     */
    public function encloseInBracket()
    {
        return $this->encloseInBracket;
    }
}
