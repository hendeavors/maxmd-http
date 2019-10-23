<?php

namespace Endeavors\MaxMD\Http\Tests;

use Endeavors\MaxMD\Http\Response;
use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{
    public function test_new()
    {
        $response = new Response('Some content', 201, ['acustomheader' => 'custom']);

        $this->assertEquals(201, $response->getStatusCode());
        $this->assertEquals('Some content', $response->getContent());
        $this->assertEquals('no-cache', $response->headers->get('cache-control'));
        $this->assertEquals('custom', $response->headers->get('acustomheader'));
    }

    public function test_create()
    {
        $response = Response::create('More Content', 202, ['acustomheader' => 'custom1']);

        $this->assertEquals(202, $response->getStatusCode());
        $this->assertEquals('More Content', $response->getContent());
        $this->assertEquals('no-cache', $response->headers->get('cache-control'));
        $this->assertEquals('custom1', $response->headers->get('acustomheader'));
    }

    public function test_make()
    {
        $response = Response::make('Even More Content', 203, ['acustomheader' => 'custom2']);

        $this->assertEquals(203, $response->getStatusCode());
        $this->assertEquals('Even More Content', $response->getContent());
        $this->assertEquals('no-cache', $response->headers->get('cache-control'));
        $this->assertEquals('custom2', $response->headers->get('acustomheader'));
    }
}
