<?php

namespace App\Presentation\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clients\ClientCreateRequest;
use App\Presentation\Services\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller {

    protected $clientService;
    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    public function create(ClientCreateRequest $clientCreateRequest){
        
        $client = $this->clientService->createClient($clientCreateRequest);

        return $client;
    }
}