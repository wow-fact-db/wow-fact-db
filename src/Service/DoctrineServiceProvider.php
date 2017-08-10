<?php

namespace Service;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Cache\ArrayCache;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Doctrine\ORM\Tools\Setup;

class DoctrineServiceProvider implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container['om'] = function ($container) {
            $cache = new ArrayCache();

            $config = Setup::createAnnotationMetadataConfiguration(
                [],
                false,
                __DIR__ . '/../../var/cache/doctrine/proxies/',
                $cache,
                false
            );

            $driver = new AnnotationDriver(
                new AnnotationReader(),
                [
                    __DIR__ . '/../Entity/'
                ]
            );
            $config->setMetadataDriverImpl($driver);

            return EntityManager::create($container['dbConnection'], $config);
        };
    }
}
