<?php

namespace Endeavors\MaxMD\Http\Tests;

use Endeavors\MaxMD\Http\Response;
use PHPUnit\Framework\TestCase;

class ResponseTest extends TestCase
{
    public function test_make()
    {
        $response = Response::make('Even More Content', 203, ['acustomheader' => 'custom2']);

        $this->assertEquals(203, $response->getStatusCode());
        $this->assertEquals('Even More Content', $response->getBody()->getContents());
        $this->assertEquals('custom2', $response->getHeader('acustomheader')[0]);
    }
}
