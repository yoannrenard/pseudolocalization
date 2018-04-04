<?php

namespace YoannRenard\Pseudolocalization;

use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    /**
     * @return array
     */
    public function notBooleanDataProvider()
    {
        return [
            [null],
            [0],
            [1],
            [['I am an array']],
            ['not a boolean'],
        ];
    }

    /**
     * @test
     * @dataProvider notBooleanDataProvider
     *
     * @expectedException \YoannRenard\Pseudolocalization\Exception\InvalidArgumentException
     * @expectedExceptionMessage The field `diacriticCharacters` must be a boolean
     *
     * @param mixed $value
     */
    public function it_throws_an_exception_as_diacriticCharacters_is_not_a_boolean($value)
    {
        new Config($value);
    }

    /**
     * @test
     *
     * @expectedException \YoannRenard\Pseudolocalization\Exception\InvalidArgumentException
     * @expectedExceptionMessage The field `caseConversion` must be in (`same`, `alternate`, `upper`)
     */
    public function it_throws_an_exception_as_caseConversion_is_not_valid()
    {
        new Config(true, 'not supported case');
    }

    /**
     * @test
     * @dataProvider notBooleanDataProvider
     *
     * @expectedException \YoannRenard\Pseudolocalization\Exception\InvalidArgumentException
     * @expectedExceptionMessage The field `expandString` must be a boolean
     *
     * @param mixed $value
     */
    public function it_throws_an_exception_as_expandString_is_not_a_boolean($value)
    {
        new Config(false, null, $value);
    }

    /**
     * @test
     * @dataProvider notBooleanDataProvider
     *
     * @expectedException \YoannRenard\Pseudolocalization\Exception\InvalidArgumentException
     * @expectedExceptionMessage The field `encloseWithBracket` must be a boolean
     *
     * @param mixed $value
     */
    public function it_throws_an_exception_as_encloseWithBracket_is_not_a_boolean($value)
    {
        new Config(false, null, false, $value);
    }

    /**
     * @test
     */
    public function it_instantiates_a_config_with_default_values()
    {
        TestCase::assertEquals(
            new Config(true, 'alternate', true, true),
            new Config()
        );
    }
}
