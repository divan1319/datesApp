<?php

namespace App\Domain\Repository\Establishments;

use App\Domain\Dtos\Establishments\RegisterEstablishmentDto;
use App\Domain\Entities\EstablishmentEntity;
use App\Http\Requests\Establishments\EstablishmentCreateRequest;
use App\Models\establishments\Establishment;
use Illuminate\Http\JsonResponse;

class EstablishmentsRepository {

    public function registerEstablishment(RegisterEstablishmentDto $registerEstablishmentDto, EstablishmentCreateRequest $request):JsonResponse{
        try {
            
            $image = $request->file('photo')->store('public/images/establishments');
            $imageName = str_replace('public/images/establishments','',$image);

            Establishment::create([
                'name' => $registerEstablishmentDto->name,
                'user_id' => $registerEstablishmentDto->user_id,
                'telephone' => $registerEstablishmentDto->telephone,
                'address' => $registerEstablishmentDto->address,
                'photo'=>$imageName
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
    
    public function getInfoEstablishment(string $id):JsonResponse{
        try {
            $establishment = Establishment::find($id);
            $infoEstablishment = EstablishmentEntity::fromArray($establishment->toArray()) ;
            
            return response()->json([
                'id'=> $infoEstablishment->id,
                'user'=> $infoEstablishment->user_id
            ]);
        } catch (\Throwable $th) {
            
            return response()->json([
                'error' => 'Hubo un error al obtener el establecimiento: '.$th->getMessage()
            ],500);
        }

    }
}