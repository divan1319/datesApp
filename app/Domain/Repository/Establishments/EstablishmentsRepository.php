<?php

namespace App\Domain\Repository\Establishments;

use App\Domain\Dtos\Establishments\RegisterEstablishmentDto;
use App\Models\establishments\Establishment;
use Illuminate\Http\JsonResponse;

class EstablishmentsService {

    public function registerEstablishment(RegisterEstablishmentDto $registerEstablishmentDto):JsonResponse{
        try {
            Establishment::create([
                
            ]);
            return response()->json();
        } catch (\Throwable $th) {
            return response()->json([
                'error' => 'Hubo un error al querer registrar el establecimiento' . $th->getMessage()
            ],500);
        }
    }
}