<?php

namespace App\Http\Controllers\Api;

use App\Models\Country;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function listCountry(){
        $countries = Country::all();

        // Si la lista esta vacia
        if($countries->isEmpty()){
            $data = [
                'message' => 'No hay paises registrados',
                'status' => 200,
            ];
            //retorno el mensaje
            return response()->json($data, 200);
        }
        // Si la lista no esta vacia
        return response()->json($countries, 200);
    }

    // Registro de paises
    public function registerCountries(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'iso_paises' => 'required|max:2',
            'nombre_paises' => 'required|max:80'
        ]);

        // pregunto si la validacion fallo
        if ($validator->fails()) {
            $data = [
                'message' => 'Error al registrar pais',
                'errors' => $validator->errors(),
                'status' => 400,
            ];
            return response()->json($data, 400);
        }

        // si la validacion funciono creo un pais

        $countries = Country::create([
            'iso_paises' => $request->iso_paises,
            'nombre_paises' => $request->nombre_paises
        ]);

        // pregunto si la variable esta vacia
        if(!$countries){
            $data = [
                'message' => 'Error al crear el pais',
                'status' => 500,
            ];
            return response()->json($data, 500);
        }
        // si la variable no esta vacia retorno el pais creado
        $data = [
            'message' => $countries,
            'status' => 201,
        ];
        return response()->json($data, 201);
    }

 
    public function upgradePartialCountry(Request $request, $id)
    {

        $country = Country::find($id);
        if (!$country) {
            $data = [
                'message' => 'pais no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'iso_paises' => 'required|max:2',
            'nombre_paises' => 'required|max:80',
            
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'error en la validacion de datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];

            return response()->json($data, 400);
        }
        if ($request->has('iso_paises')) {
            $country->iso_paises = $request->iso_paises;
        }

        if ($request->has('nombre_paises')) {
            $country->nombre_paises = $request->nombre_paises;
        }
        
        $country->save();

        $data = [
            'message' => 'los cambios han sido realizados',
            'country' => $country,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function showCountry($id)
    {	
        $country = Country::find($id);

        if (!$country) {
            $data = [
                'message' => 'No se encontro el pais',
                'status' => 404,
                ];
                return response()->json($data, 404);
            }

            $data = [
                'country'=> $country,
                'status'=> 200
            ];
            return response()->json($data, 200);
        }
}