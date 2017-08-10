<?php

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

$console = new Application('wow-fact-db', 'n/a');

$om = $app['om'];
$console->setHelperSet(new Symfony\Component\Console\Helper\HelperSet(
    [
        'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($om->getConnection()),
        'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($om)
    ]
));
$console->addCommands([
    new Doctrine\ORM\Tools\Console\Command\ConvertMappingCommand(),
    new Doctrine\ORM\Tools\Console\Command\EnsureProductionSettingsCommand(),
    new Doctrine\ORM\Tools\Console\Command\GenerateEntitiesCommand(),
    new Doctrine\ORM\Tools\Console\Command\GenerateProxiesCommand(),
    new Doctrine\ORM\Tools\Console\Command\GenerateRepositoriesCommand(),
    new Doctrine\ORM\Tools\Console\Command\InfoCommand(),
    new Doctrine\ORM\Tools\Console\Command\MappingDescribeCommand(),
    new Doctrine\ORM\Tools\Console\Command\RunDqlCommand(),
    new Doctrine\ORM\Tools\Console\Command\ValidateSchemaCommand(),
    new Doctrine\ORM\Tools\Console\Command\ClearCache\CollectionRegionCommand(),
    new Doctrine\ORM\Tools\Console\Command\ClearCache\EntityRegionCommand(),
    new Doctrine\ORM\Tools\Console\Command\ClearCache\MetadataCommand(),
    new Doctrine\ORM\Tools\Console\Command\ClearCache\QueryCommand(),
    new Doctrine\ORM\Tools\Console\Command\ClearCache\QueryRegionCommand(),
    new Doctrine\ORM\Tools\Console\Command\ClearCache\ResultCommand(),
    new Doctrine\ORM\Tools\Console\Command\SchemaTool\CreateCommand(),
    new Doctrine\ORM\Tools\Console\Command\SchemaTool\DropCommand(),
    new Doctrine\ORM\Tools\Console\Command\SchemaTool\UpdateCommand()
]);

$console->getDefinition()->addOption(new InputOption('--env', '-e', InputOption::VALUE_REQUIRED, 'The Environment name.', 'dev'));
$console->setDispatcher($app['dispatcher']);
$console
    ->register('my-command')
    ->setDefinition(array(
        // new InputOption('some-option', null, InputOption::VALUE_NONE, 'Some help'),
    ))
    ->setDescription('My command description')
    ->setCode(function (InputInterface $input, OutputInterface $output) use ($app) {
        // do something
    })
;

return $console;
