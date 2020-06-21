# LaravelTaskRunner

![Tests](https://github.com/paulhenri-l/generator/workflows/Tests/badge.svg)
[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)

Generate files from a specification. This tool is useful in scaffold commands.

## Installation

You just need to require the package.

```shell script
composer require paulhenri-l/generator
```

## Usage

Generator use specifications to generate new files. A specification is a class
that implements the `PaulhenriL\Generator\GeneratorSpecification` interface.

You then pass this specification to the `generate` method of the `Generator`

```php
$generator = new \PaulhenriL\Generator\Generator();

$spec = new HelloWorld('Paul-Henri');

$generator->generate($spec);
```

### Defining a specification

Here's a sample specification.

```php
<?php

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
        // You may also store the template in another file and return it here
        // return file_get_contents('path/to/template');

        return "<h1>{{ name }}</h1>";
    }

    /**
     * Return the target path for the generated file.
     */
    public function getTargetPath(): string
    {
        return getcwd() . '/welcome.html';
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
```
