<?php

namespace Endeavors\MaxMD\Http\Tests;

use Endeavors\MaxMD\Http\JsonResponse;
use PHPUnit\Framework\TestCase;

class JsonResponseTest extends TestCase
{
    public function test_make()
    {
        $response = JsonResponse::make(['name' => 'Jane Done'], 203, ['acustomheader' => 'custom2']);

        $this->assertEquals(203, $response->getStatusCode());
        $this->assertEquals('{"name":"Jane Done"}', $response->getBody()->getContents());
        $this->assertEquals('application/json', $response->getHeader('Content-Type')[0]);
        $this->assertEquals('custom2', $response->getHeader('acustomheader')[0]);
    }
}
