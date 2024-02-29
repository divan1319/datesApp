<?php

namespace App\Domain\Repository\Establishments;

use App\Domain\Dtos\Establishments\RegisterEstablishmentDto;
use App\Models\establishments\Establishment;
use Illuminate\Http\JsonResponse;

class EstablishmentsRepository {

    public function registerEstablishment(RegisterEstablishmentDto $registerEstablishmentDto):JsonResponse{
        try {
            Establishment::create([
                'name' => $registerEstablishmentDto->name,
                'user_id' => $registerEstablishmentDto->user_id,
                'telephone' => $registerEstablishmentDto->telephone,
                'address' => $registerEstablishmentDto->address
            ]);
            return response()->json([
                'message' => 'Establecimiento registrado correctamente.'
            ],201);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'Hubo un error al querer registrar el establecimiento' . $th->getMessage()
            ],500);
        }
    }
}