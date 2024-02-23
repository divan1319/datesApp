<?php

namespace App\Presentation\Establishments;

use Illuminate\Http\JsonResponse;

class EstablishmentsController {

    public function __construct()
    {
        
    }

    public function create():JsonResponse{
        return response()->json([
            'info'=>'success'
        ],201);
    }
}