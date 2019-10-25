<?php

namespace Endeavors\MaxMD\Http;

use Symfony\Component\HttpFoundation\JsonResponse as SymfonyJsonResponse;

/**
 * Once again, we'll just extend Symfony's JsonResponse in case we
 * Encounter any issues with the response from maxmd
 */
final class JsonResponse extends SymfonyJsonResponse
{
    /**
     * @param $data array|mixed
     * @param $status int
     * @param $headers array
     */
    public function __construct($data = [], $status = 200, $headers = array())
    {
        parent::__construct($data, $status, $headers);
    }

    /**
     * Alias
     * @see make
     * {@inheritdoc}
     */
    public static function create($data = [], $status = 200, $headers = array())
    {
        return static::make($data, $status, $headers);
    }

    /**
     * {@inheritdoc}
     */
    public static function make($data = [], $status = 200, $headers = array())
    {
        return SymfonyJsonResponse::create($data, $status, $headers);
    }
}
