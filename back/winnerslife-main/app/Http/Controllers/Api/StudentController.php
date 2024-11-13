<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    //Controlar si la lista esta vacia
    public function listStudents()
    {
        //Obtengo el modelo
        $students = Student::all();

        //Si la lista esta vacia
        if ($students->isEmpty()) {
            $data = [
                'message' => 'No se encontraron estudiantes',
                'status' => 200,
            ];
            //retorno el mensaje
            return response()->json($data, 404);
        }

        return response()->json($students, 200);
    }

    //Registro de estudiantes
    public function registerStudent(Request $request)
    {
        //Valido los datos usando el method Validator
        $validator = Validator::make($request->all(), [
            'primernombre_students' => 'required|max:100',
            'segundonombre_students' => 'required|max:100',
            'primerapellido_students' => 'required|max:100',
            'segundoapellido_students' => 'required|max:100',
            'ci_students' => 'required|max:30',
            'correo_student' => 'required|email|max:100|unique:students_life',//cambio
            'status_student' => 'required|max:50',
            'id_paises' => 'required'
        ]);
        //Pregunto si la validacion fallo
        if ($validator->fails()) {
            //doy un mensaje
            $data = [
                'message' => 'Error en la validacion de datos',
                'errors' => $validator->errors(),
                'status' => 400,
            ];
            //retorno el mensaje
            return response()->json($data, 400);
        }

        //si la validacion funciono creo un estudiante en la tabla con el method create
        $students = Student::create([
            'primernombre_students' =>  $request->primernombre_students,
            'segundonombre_students' => $request->segundonombre_students,
            'primerapellido_students' => $request->primerapellido_students,
            'segundoapellido_students' => $request->segundoapellido_students,
            'ci_students' => $request->ci_students,
            'correo_student' => $request->correo_student,
            'status_student' => $request->status_student,
            'id_paises' => $request->id_paises,
        ]);

        //pregunto si la variable esta vacia
        if (!$students) {
            $data = [
                'message' => 'Error al crear el estudiante',
                'status' => 500,
            ];
            return response()->json($data, 500);
        }
        //si no esta vacia muestro el registro en consola del postmn
        $data = [
            'message' => $students,
            'status' => 201,
        ];
        return response()->json($data, 201);
    }

    //Actualizacion de estudiante
    public function upgradeAll($request, $id)
    {
        //verifico si el id de estudiante existe
        $student = student::find($id);
        if (!$student) {
            $data = [
                'message' => 'estudiante no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        // valido usando el metodo validator
        $validator = Validator::make($request->all(), [
            'primernombre_students' => 'required|max:100',
            'segundonombre_students' => 'required|max:100',
            'primerapellido_students' => 'required|max:100',
            'segundoapellido_students' => 'required|max:100',
            'ci_students' => 'required|max:30',
            'correo_student' => 'required|email|max:100|unique:students_life',
            'status_student' => 'required|max:50',
            'id_paises' => 'required'
        ]);
        // si la validacion falla retorno un mensaje de error
        if ($validator->fails()) {
            $data = [
                'message' => 'error en la validacion de datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            // retorno el mensaje de error
            return response()->json($data, 400);
        }
        // solicito los datos que se van a modificar
        $student->primernombre_students = $request->primernombre_students;
        $student->segundonombre_students = $request->segundonombre_students;
        $student->primerapellido_students = $request->primerapellido_students;
        $student->segundoapellido_students = $request->segundoapellido_students;
        $student->ci_students = $request->ci_students;
        $student->correo_student = $request->correo_student;
        $student->status_student = $request->status_student;
        $student->id_paises = $request->id_paises;
        // guardo los datos suministrados por el ususario
        $student->save();
        // mensaje de datos cambiados correctamente
        $data = [
            'message' => 'estudiante actualizado',
            'student' => $student,
            'status' => 200
        ];
        // retorno mensaje
        return response()->json($data, 200);
    }

    //buscar estudiante en especifico
    public function show($id)
    {
        $student = Student::find($id);

        if (!$student) {
            $data = [
                'message' => 'No se encontro el estudiante',
                'status' => 404,
            ];
            return response()->json($data, 404);
        }

        $data = [
            'student' => $student,
            'status' => 200
        ];
        return response()->json($data, 200);
    }


    public function upgradePartial(Request $request, $id)
    {

        $student = student::find($id);
        if (!$student) {
            $data = [
                'message' => 'estudiante no encontrado',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'primernombre_students' => 'required|max:100',
            'segundonombre_students' => 'required|max:100',
            'primerapellido_students' => 'required|max:100',
            'segundoapellido_students' => 'required|max:100',
            'ci_students' => 'required|max:30',
            'correo_student' => 'required|email|max:100|unique:student',
            'status_student' => 'required|max:50',
            'id_paises' => 'required'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'error en la validacion de datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];

            return response()->json($data, 400);
        }
        if ($request->has('primernombre_students')) {
            $student->primernombre_students = $request->primernombre_students;
        }

        if ($request->has('segundonombre_students')) {
            $student->segundonombre_students = $request->segundonombre_students;
        }

        if ($request->has('primerapellido_students')) {
            $student->primerapellido_students = $request->primerapellido_students;
        }

        if ($request->has('segundoapellido_students')) {
            $student->segundoapellido_students = $request->segundoapellido_students;
        }

        if ($request->has('ci_students')) {
            $student->ci_students = $request->ci_students;
        }

        if ($request->has('correo_student')) {
            $student->correo_student = $request->correo_student;
        }

        if ($request->has('status_student')) {
            $student->status_student = $request->status_student;
        }

        if ($request->has('id_paises')) {
            $student->id_paises = $request->id_paises;
        }

        $student->save();

        $data = [
            'message' => 'los cambios han sido realizados',
            'student' => $student,
            'status' => 200
        ];

        return response()->json($data, 200);
    }
}
