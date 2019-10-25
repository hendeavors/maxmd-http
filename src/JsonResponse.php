<?php

namespace Endeavors\MaxMD\Http;

use Endeavors\MaxMD\Http\Response;
use Psr\Http\Message\ResponseInterface;

/**
 * Get a PSR-7 JsonResponse
 */
final class JsonResponse
{
    /**
     * Should not be constructed
     */
    private function __construct()
    {
    }

    /**
     * Make a new PSR-7 response
     * @param  array|mixed             $data
     * @param  int               $status
     * @param  array             $headers
     * @return ResponseInterface
     */
    public static function make($data = [], int $status = 200, array $headers = []): ResponseInterface
    {
        $headers['Content-Type'] = 'application/json';
        return Response::make($data, $status, $headers);
    }
}
