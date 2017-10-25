<?php

namespace Endeavors\MaxMD\Http\Contracts;

interface IResponse
{
    function make($response, $status = 200, $headers = array());
}