<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{

    public function listCourse()
    {
        $course = Course::all();

        if ($course->isEmpty()) {
            $data = [
                'message' => 'No hay cursos',
                'status' => 200,
            ];

            return response()->json($data, 404);
        }

        return response()->json($course, 200);
    }

    public function registerCourse(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'nombre_courses' => 'required|max:100',
            'status_courses' => 'required|max:50',
            'id_category' => 'required',
            'id_video' => 'required',
            'id_career' => 'required'

        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en la validacion de datos',
                $validator->errors(),
                'status' => 400,
            ];

            return response()->json($data, 400);
        }

        $course = Course::create([

            'nombre_courses'  => $request->nombre_courses,
            'status_courses' => $request->status_courses,
            'id_category' => $request->id_category,
            'id_video' => $request->id_video,
            'id_career' => $request->id_career

        ]);

        if (!$course) {
            $data = [
                'message' => 'Error al crear el curso',
                'status' => 500,
            ];

            return response()->json(
                $data,
                500
            );
        }

        $data = [
            'message' => $course,
            'status' => 201,
        ];
        return response()->json($data, 201);
    }
}
