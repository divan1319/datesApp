<?php

namespace App\Presentation\Services;

use App\Domain\Repository\Clients\ClientRepository;
use App\Http\Requests\Clients\ClientCreateRequest;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ClientService{
    protected $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;    
    }

    public function createClient(ClientCreateRequest $clientCreateRequest){
        
        $clientCreateRequest->validated();

        $client = $this->clientRepository->registerClient($clientCreateRequest);

        return $client;

    }
}