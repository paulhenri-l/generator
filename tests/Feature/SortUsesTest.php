<?php

namespace PaulhenriL\Generator\Tests\Feature;

use PaulhenriL\Generator\Generator;
use PaulhenriL\Generator\SingleUseSpecification;
use PaulhenriL\Generator\SortUsesProcessor;
use PaulhenriL\Generator\Tests\TestCase;

class SortUsesTest extends TestCase
{
    protected const TEMPLATE = <<<PHP
<?php

use C;
use A;
use B;
PHP;

    protected const EXPECTED = <<<PHP
<?php

use A;
use B;
use C;
PHP;


    public function test_uses_are_sorted()
    {
        $path = __DIR__ . '/../Fakes/generated_files/sort';

        $generator = new Generator();

        $spec = new SingleUseSpecification(
            static::TEMPLATE, $path, [], [new SortUsesProcessor]
        );

        $generator->generate($spec);

        $this->assertEquals(
            static::EXPECTED,
            file_get_contents($path)
        );
    }
}
