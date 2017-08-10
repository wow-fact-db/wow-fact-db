<?php

namespace Controller;

use Doctrine\Common\Persistence\ObjectManager;
use Entity\Fact;
use Silex\Application;
use Symfony\Component\HttpFoundation\JsonResponse;

class FactController
{
    public function get(Application $app, int $factId)
    {
        /* @var $om ObjectManager */
        $om = $app['om'];
        $om->getClassMetadata(Fact::class);
        return new JsonResponse([
            'id' => $factId
        ]);
    }
}
