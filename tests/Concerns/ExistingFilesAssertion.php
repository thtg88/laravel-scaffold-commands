<?php

namespace Thtg88\LaravelScaffoldCommands\Tests\Concerns;

use Illuminate\Filesystem\Filesystem;

trait ExistingFilesAssertion
{
    public function assertFilesExist($files): self
    {
        foreach ($files as $_file) {
            $this->assertTrue(file_exists($_file));
        }

        return $this;
    }

    protected function clearUpFiles($files): self
    {
        app()->make(Filesystem::class)->delete($files);

        return $this;
    }
}
