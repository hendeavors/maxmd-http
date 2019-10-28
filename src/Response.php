<?php

namespace Endeavors\MaxMD\Http;

use GuzzleHttp\Psr7\Response as Psr7Response;
use Psr\Http\Message\ResponseInterface;

/**
 * Get a PSR-7 JsonResponse
 */
final class Response
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
        return new Psr7Response($status, $headers, static::getBody($data));
    }

    private static function getBody($data): string
    {
        $body = '';

        if(!empty($data)) {
            if(is_string($data)) {
                $body = $data;
            } else {
                $body = json_encode($data);
            }

            if($body === null) {
                $body = (string)$data;
            }
        }

        return $body;
    }
}
