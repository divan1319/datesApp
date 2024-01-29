<?php

namespace App\Domain\Repository\Clients;

use App\Http\Requests\Clients\ClientCreateRequest;
use App\Models\clients\Client;
use Illuminate\Http\JsonResponse;


class ClientRepository{
    
    public function registerClient(ClientCreateRequest $clientCreateRequest): JsonResponse{
        try {

            $photo = $clientCreateRequest->file('photo')->store('public/images/clients');
            $photoName = str_replace('public/images/clients','',$photo);
    
            Client::create([
                'user_id'=> $clientCreateRequest['user_id'],
                'photo'=>$photoName
            ]);
    
            return response()->json([
                'message'=>'Cliente registrado correctamente'
            ],201);

        } catch (\Throwable $th) {
            return response()->json([
                'error'=>'Hubo un error al registrar el cliente',
                'details'=>$th->getMessage()
            ],500);
        }

    }
}