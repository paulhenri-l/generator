<?php

namespace PaulhenriL\Generator\Tests\Feature;

use PaulhenriL\Generator\Keywords;
use PaulhenriL\Generator\Tests\TestCase;

class KeywordsTest extends TestCase
{
    public function test_php_keywords_are_detected()
    {
        $this->assertTrue(
            Keywords::isReserved('new')
        );

        $this->assertFalse(
            Keywords::isReserved('hello')
        );
    }
}
