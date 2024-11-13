<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    public function listUsers()
    {
        //Obtengo el modelo
        $users = User::all();

        //Si la lista esta vacia
        if ($users->isEmpty()) {
            $data = [
                'message' => 'No se encontraron estudiantes',
                'status' => 200,
            ];
            //retorno el mensaje
            return response()->json($data, 404);
        }

        return response()->json($users, 200);
    }





    public function registerUsers(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'nombre_user' => 'required|max:100',
            'apellido_user' => 'required|max:100',
            'ci_user' => 'required|max:30',
            'correo_user' => 'required|max:100|email',
            'password_user' => 'required|max:61',
            'status_user' => 'required|max:50',
            'id_paises' => 'required',
            'id_permissions' => 'required',
            'id_courses' => 'required',
            'id_students' => 'required'

        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error al registrar usuario',
                'errors' => $validator->errors(),
                'status' => 400,
            ];
            return response()->json($data, 400);
        }

        $users = User::create([
            'nombre_user' => $request->nombre_user,
            'apellido_user'=> $request->apellido_user,
            'ci_user'=> $request->ci_user,
            'correo_user'=> $request->correo_user,
            'password_user' => Hash::make($request->password_user),
            'status_user'=> $request->status_user,
            'id_paises'=> $request->id_paises,
            'id_permissions'=> $request->id_permissions,
            'id_courses'=> $request->id_courses,
            'id_students'=> $request->id_students

        ]);

        if (!$users){
            $data = [
                'message' => 'Error al registrar usuario',
                'status' => 500,
            ];
            return response()->json($data, 500);
        }
        $data = [
            'message' => $users,
            'status' => 200,
        ];
        return response()->json($data, 201);
    }
    public function upgradePartialUser(Request $request, $id)
    {

        $user = User::find($id);
        if (!$user) {
            $data = [
                'message' => 'usuario no encontrada',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre_user' => 'required|max:100',
            'apellido_user' => 'required|max:100',
            'ci_user' => 'required|max:30',
            'correo_user' => 'required|max:100|email',
            'password_user' => 'required|max:61',
            'status_user' => 'required|max:50',
            'id_paises' => 'required',
            'id_permissions' => 'required',
            'id_courses' => 'required',
            'id_students' => 'required'

        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'error en la validacion de datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];

            return response()->json($data, 400);
        }
        if ($request->has('nombre_user')) {
            $user->nombre_user = $request->nombre_user;
        }


        if ($request->has('apellido_user')) {
            $user->apellido_user = $request->apellido_user;
        }

        if ($request->has('ci_user')) {
            $user->ci_user = $request->ci_user;
        }

        if ($request->has('correo_user')) {
            $user->correo_user = $request->correo_user;
        }

        if ($request->has('password_user')) {
            $user->password_user = $request->password_user;
        }

        if ($request->has('status_user')) {
            $user->status_user = $request->status_user;
        }

        if ($request->has('id_paises')) {
            $user->id_paises = $request->id_paises;
        }

        if ($request->has('id_permissions')) {
            $user->id_permissions = $request->id_permissions;
        }

        if ($request->has('id_courses')) {
            $user->id_courses = $request->id_courses;
        }

        if ($request->has('id_students')) {
            $user->id_students = $request->id_students;
        }

        $user->save();

        $data = [
            'message' => 'los cambios han sido realizados',
            'User' => $user,
            'status' => 200
        ];

        return response()->json($data, 200);
    }

    public function showUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            $data = [
                'message' => 'No se encontro el usuario',
                'status' => 404,
                ];
                return response()->json($data, 404);
            }

            $data = [
                'user'=> $user,
                'status'=> 200
            ];
            return response()->json($data, 200);
        }

}
