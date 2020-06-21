<?php

namespace PaulhenriL\Generator\Tests;

use Illuminate\Filesystem\Filesystem;

class TestCase extends \PHPUnit\Framework\TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->initGeneratedFilesFolder();
    }

    protected function tearDown(): void
    {
        $this->initGeneratedFilesFolder();

        parent::tearDown();
    }

    protected function initGeneratedFilesFolder()
    {
        (new Filesystem())->deleteDirectory(
            $path = __DIR__ . '/Fakes/generated_files'
        );

        (new Filesystem())->makeDirectory(
            $path
        );
    }
}
