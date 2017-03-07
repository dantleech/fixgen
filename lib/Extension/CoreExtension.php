<?php

namespace DTL\Fixgen\Extension;

use PhpBench\DependencyInjection\ExtensionInterface;
use PhpBench\DependencyInjection\Container;
use DTL\Fixgen\Console\Command\GenerateCommand;
use Symfony\Component\Console\Application;

class CoreExtension implements ExtensionInterface
{
    const NAME = 'fixgen';
    const VERSION = 'dev';

    public function getDefaultConfig()
    {
        return [];
    }

    public function load(Container $container)
    {
        $container->register('console.application', function ($container) {
            $application = new Application(self::NAME, self::VERSION);

            foreach (array_keys($container->getServiceIdsForTag('console.command')) as $id) {
                $application->add($container->get($id));
            }

            return $application;
        });

        $container->register('console.command.generate', function ($container) {
            return new GenerateCommand();
        }, [ 'console.command' => []]);
    }
}
