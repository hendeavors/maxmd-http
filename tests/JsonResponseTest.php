<?php

namespace Endeavors\MaxMD\Http\Tests;

use Endeavors\MaxMD\Http\JsonResponse;
use PHPUnit\Framework\TestCase;

class JsonResponseTest extends TestCase
{
    public function test_new()
    {
        $response = new JsonResponse(['name' => 'John Doe'], 201, ['acustomheader' => 'custom']);

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertEquals('{"name":"John Doe"}', $response->getContent());
        $this->assertEquals('no-cache', $response->headers->get('cache-control'));
        $this->assertEquals('application/json', $response->headers->get('Content-Type'));
        $this->assertEquals('custom', $response->headers->get('acustomheader'));
    }

    public function test_create()
    {
        $response = JsonResponse::create(['name' => 'Jane Doe'], 202, ['acustomheader' => 'custom1']);

        $this->assertEquals(202, $response->getStatusCode());
        $this->assertEquals('{"name":"Jane Doe"}', $response->getContent());
        $this->assertEquals('no-cache', $response->headers->get('cache-control'));
        $this->assertEquals('application/json', $response->headers->get('Content-Type'));
        $this->assertEquals('custom1', $response->headers->get('acustomheader'));
    }

    public function test_make()
    {
        $response = JsonResponse::make(['name' => 'Jane Done'], 203, ['acustomheader' => 'custom2']);

        $this->assertEquals(203, $response->getStatusCode());
        $this->assertEquals('{"name":"Jane Done"}', $response->getContent());
        $this->assertEquals('no-cache', $response->headers->get('cache-control'));
        $this->assertEquals('application/json', $response->headers->get('Content-Type'));
        $this->assertEquals('custom2', $response->headers->get('acustomheader'));
    }
}
