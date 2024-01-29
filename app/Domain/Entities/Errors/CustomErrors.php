<?php

namespace App\Entities\Errors;

use Symfony\Component\HttpKernel\Exception\HttpException;

class CustomErrors extends HttpException{

    public function __construct()
    {
        
    }
}