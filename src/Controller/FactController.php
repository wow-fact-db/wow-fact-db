<?php

namespace Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

class FactController
{
    public function get(int $factId)
    {
        return new JsonResponse([
            'id' => $factId
        ]);
    }
}
