<?php

namespace PaulhenriL\Generator\Tests\Feature;

use PaulhenriL\Generator\Generator;
use PaulhenriL\Generator\SingleUseSpecification;
use PaulhenriL\Generator\Tests\Fakes\HelloWorld;
use PaulhenriL\Generator\Tests\TestCase;

class GeneratorTest extends TestCase
{
    public function test_file_is_generated()
    {
        $generator = new Generator();

        $spec = new HelloWorld('Paul-Henri');

        $generator->generate($spec);

        $this->assertEquals(
            '<h1>Paul-Henri</h1>',
            file_get_contents(__DIR__ . '/../Fakes/generated_files/welcome.html')
        );
    }

    public function test_processors_run()
    {
        $generator = new Generator();

        $spec = new SingleUseSpecification(
            '{{ word }}',
            __DIR__ . '/../Fakes/generated_files/single_use',
            ['word' => 'hello'],
            ['strtoupper']
        );

        $generator->generate($spec);

        $this->assertEquals(
            'HELLO',
            file_get_contents(__DIR__ . '/../Fakes/generated_files/single_use')
        );
    }
}
