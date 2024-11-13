<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VideoController extends Controller
{
    public function listVideo()
    {
        $video = Video::all();

       if($video->isEmpty()){
            $data = [
                'message' => 'no se encontraron videos',
                'status' => 200,
            ];

            return response()->json($data, 404);
       }

        return response()->json($video, 200);
    }

    public function registerVideo(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'nombre_video' => 'required|max:100',
            'description_video' => 'required|max:300',
            'url_video' => 'required|max:500',
            'status_video' => 'required|max:50'

        ]);

        if($validator->fails())
        {
            $data = [
                'message' => 'Error al registrar el video',
                $validator->errors(),
                'status' => 400,
            ];
            return response()->json($data, 400);
        }

        $video = Video::create([
            'nombre_video' => $request->nombre_video,
            'description_video' => $request->description_video,
            'url_video' => $request->url_video,
            'status_video' => $request->status_video,

        ]);

        if (!$video){
            $data = [

                'message' => 'Error al registrar el video',
                'status' => 500,

            ];

            return response()->json($data, 500);

        }

        $data = [
            'message' => $video,
            'status' => 200,
        ];
        return response()->json($data, 201);

    }

    public function showVideo($id)
    {	
        $video = Video::find($id);

        if (!$video) {
            $data = [
                'message' => 'No se encontro el Video',
                'status' => 404,
                ];
                return response()->json($data, 404);
            }

            $data = [
                'permission'=> $video,
                'status'=> 200
            ];
            return response()->json($data, 200);
        }

}
