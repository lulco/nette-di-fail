<?php

declare(strict_types=1);

use Nette\Bootstrap\Configurator;

require_once __DIR__ . '/vendor/autoload.php';

$configurator = new Configurator();
$configurator->setTempDirectory(__DIR__ . '/temp');
$configurator->addConfig(__DIR__ . '/config/config.neon');
$configurator->createContainer();
