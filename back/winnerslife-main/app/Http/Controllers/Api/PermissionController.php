<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //Controlar si la lista esta vacia

    public function listPermission()
    {
        //Obtengo el modelo
        $permissions = Permission::all();

        //Si la lista esta vacia
        if ($permissions->isEmpty()) {
            $data = [
                'message' => 'No se encuentaron los permisos',
                'status' => 200,
            ];
            //retorno el mensaje
            return response()->json($data, 404);
        }

        return response()->json($permissions, 200);
    }

    //Registro de permisos
    public function registerPermission(Request $request)
    {
        //Obtengo los datos del request
        $validator = Validator::make($request->all(), [
            'nombre_permissions' => 'required|max:35',
            'tipo_permissions' => 'required',
            'status_permissions' => 'required|max:50'
        ]);

        //Pregunto si la validacion fallo
        if ($validator->fails()) {
            //doy mensaje
            $data = [
                'message' => 'Error al registrar el permiso',
                'errors' => $validator->errors(),
                'status' => 400,
            ];
            //retorno el mensaje
            return response()->json($data, 400);
        }

        //si la validacion funciono creo un permisoi nuevo
        $permission = Permission::create([
            'nombre_permissions' => $request->nombre_permissions,
            'tipo_permissions' => $request->tipo_permissions,
            'status_permissions' => $request->status_permissions
        ]);

        //pregunto si la variable esta vacia
        if (!$permission) {
            $data = [
                'message' => 'Error al crear el permiso',
                'status' => 400,
            ];

            return response()->json($data, 500);
        }

        //si no esta vacia muestro el registro en consola
        $data = [
            'message' => $permission,
            'status' => 201,
        ];
        return response()->json($data, 201);
    }

    public function upgradePartialPermission(Request $request, $id)
    {

        $permission = Permission::find($id);
        if (!$permission) {
            $data = [
                'message' => 'permiso no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre_permission' => 'required|max:35',
            'tipo_permission' => 'required',
            'status_permission' => 'required|max:50',
            
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'error en la validacion de datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];

            return response()->json($data, 400);
        }
        if ($request->has('nombre_permission')) {
            $permission->nombre_permissions = $request->nombre_permissions;
        }

        if ($request->has('tipo_permission')) {
            $permission->tipo_permission = $request->tipo_permission;
        }

        if ($request->has('status_permission')) {
            $permission->status_permission = $request->status_permission;
        }
        
        $permission->save();

        $data = [
            'message' => 'los cambios han sido realizados',
            'permission' => $permission,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function showPermission($id)
    {	
        $permission = Permission::find($id);

        if (!$permission) {
            $data = [
                'message' => 'No se encontro el permiso',
                'status' => 404,
                ];
                return response()->json($data, 404);
            }

            $data = [
                'permission'=> $permission,
                'status'=> 200
            ];
            return response()->json($data, 200);
        }

}