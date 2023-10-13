<?php

declare(strict_types=1);

namespace NetteDiFail;

use Nette\DI\CompilerExtension;
use Nette\DI\Definitions\Statement;
use Nette\Schema\Expect;
use Nette\Schema\Schema;

final class TestExtension extends CompilerExtension
{
    public function getConfigSchema(): Schema
    {
        return Expect::structure([
            'lang' => Expect::string()->required(),
//            'resolvers' => Expect::arrayOf(Statement::class),
        ]);
    }

    public function loadConfiguration()
    {
        var_dump($this->config);
    }
}
