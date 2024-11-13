<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    // controlar si la lista esta vacia

    public function listCategory()
    {
        // obtengo el modelo
        $category = Category::all();

        //si la lista esta vacia
        if ($category->isEmpty()) {
            $data = [
                'message' => 'No hay categorias',
                'status' => 200,
            ];
            return response()->json($data, 404);
        }
        // si la lista no esta vacia
        return response()->json($category, 200);
    }

    public function registerCategory(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nombre_category' => 'required|max:35',
                'status_category' => 'required|max:50'
            ]

        );

        //pregunta si la validacion fallo
        if ($validator->fails()) {

            // doy el mensaje
            $data = [

                'message' => 'Error al registrar la categoria',
                'errors' => $validator->errors(),
                'status' => 400,
            ];
            // retorno el mensaje
            return response()->json($data, 400);
        }

        // si la validacion es acorrecta creo
        $category = Category::create([
            'nombre_category' => $request->nombre_category,
            'status_category' => $request->status_category,
        ]);

        //pregunto si la variable esta vacia
        if (!$category) {
            $data = [
                'message' => 'Error al registrar la categoria',
                'status' => 400,
            ];
            return response()->json($data, 500);
        }

        // si no esta vacia muestro el registro

        $data = [
            'message' => $category,
            'status' => 201,
        ];
    }
    public function upgradePartialCategory(Request $request, $id)
    {

        $category = Category::find($id);
        if (!$category) {
            $data = [
                'message' => 'categoria no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre_category' => 'required|max:35',
            'status_category' => 'required|max:50',

        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'error en la validacion de datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];

            return response()->json($data, 400);
        }
        if ($request->has('nombre_category')) {
            $category->iso_paises = $request->iso_paises;
        }


        if ($request->has('status_category')) {
            $category->nombre_paises = $request->nombre_paises;
        }

        $category->save();

        $data = [
            'message' => 'los cambios han sido realizados',
            'category' => $category,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function showCategory($id)
    {	
        $category = Category::find($id);

        if (!$category) {
            $data = [
                'message' => 'No se encontro la categoria',
                'status' => 404,
                ];
                return response()->json($data, 404);
            }

            $data = [
                'category'=> $category,
                'status'=> 200
            ];
            return response()->json($data, 200);
        }
}
