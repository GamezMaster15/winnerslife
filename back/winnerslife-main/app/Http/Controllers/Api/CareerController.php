<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CareerController extends Controller
{
    public function listCareer()
    {
        $career = Career::all();

        if(!$career->isEmpty())
        {
            $data = [
                'message' => 'no se encontro carrera',
                'status' => 200,
            ];

            return response()->json($data, 404);
        }
        return response()->json($career, 200);
    }

    public function registerCareer(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'nombre_career' => 'required|max:100',
            'descripcion_career' => 'required|max:300',
            'status_career' => 'required|max:50',

        ]);

        if($validator->fails())
        {
            $data = [
                'message' => 'Error al registrar la carrera',
                $validator->errors(),
                'status' => 400,
            ];
            return response()->json($data, 400);
        }

        $career = Career::create([
            'nombre_career' => $request->nombre_career,
            'descripcion_career' => $request->descripcion_career,
            'status_career' => $request->status_career
        ]);

        if(!$career)
        {
            $data = [
                'message' => 'Error al registrar la carrera',
                'status' => 500,
            ];
            return response()->json($data, 500);
        }

        $data = [
            'message' => $career,
            'status' => 201,
        ];
        return response()->json($data, 201);
    }

    public function showCareer($id)
    {	
        $career = Career::find($id);

        if (!$career) {
            $data = [
                'message' => 'No se encontro la carrera',
                'status' => 404,
                ];
                return response()->json($data, 404);
            }

            $data = [
                'category'=> $career,
                'status'=> 200
            ];
            return response()->json($data, 200);
        }

        public function upgradePartial(Request $request, $id)
    {

        $career = Career::find($id);
        if (!$career) {
            $data = [
                'message' => 'estudiante no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre_career' => 'required|max:100',
            'descripcion_career' => 'required|max:300',
            'status_career' => 'required|max:50',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'error en la validacion de datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];

            return response()->json($data, 400);
        }
        if ($request->has('nombre_career')) {
            $career->nombre_career = $request->nombre_career;
        }

        if ($request->has('descripcion_career')) {
            $career->descripcion_career = $request->descripcion_career;
        }

        if ($request->has('status_career')) {
            $career->status_career = $request->status_career;
        }


        $career->save();

        $data = [
            'message' => 'los cambios han sido realizados',
            'student' => $career,
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
