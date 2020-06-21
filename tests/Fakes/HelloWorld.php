<?php

namespace PaulhenriL\Generator\Tests\Fakes;

use PaulhenriL\Generator\GeneratorSpecification;

class HelloWorld implements GeneratorSpecification
{
    /**
     * The Name to greet.
     *
     * @var string
     */
    protected $name;

    /**
     * HelloWorld constructor.
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * The template to use for generation.
     */
    public function getTemplate(): string
    {
        return "<h1>{{ name }}</h1>";
    }

    /**
     * Return the target path for the generated file.
     */
    public function getTargetPath(): string
    {
        return __DIR__ . '/generated_files/welcome.html';
    }

    /**
     * Return the replacements
     */
    public function getReplacements(): array
    {
        return [
            'name' => $this->name
        ];
    }

    /**
     * Return template processors.
     */
    public function getProcessors(): array
    {
        return [
            // Processors are callable that can process the file right before it
            // gets written to disk. Invokable classes are a good fit for this.
            //
            // new MyCustomProcessor(),
        ];
    }
}
