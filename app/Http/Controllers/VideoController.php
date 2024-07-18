<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Http\Requests\VideoValidator;
use Exception;

class VideoController extends Controller
{
    




    public function Store(VideoValidator $request)
    {
        try { 
            
            $validatedData = $request->validated();
    
            $video = new Video();
            $video->titulo = $validatedData['titulo'];
            $video->descripcion = $validatedData['descripcion'];
            $video->autor = $validatedData['autor'];
            $video->visitas = 0;
            $video->url = " "; 
            $video->urlMiniatura = " ";
            $video->idUsuario = $request->post("idUsuario");
            $video->save();

            $rutaArchivo = $request->file('archivo')->storeAs('videosT', 'video_' . $video->id . '.mp4', 'public');
            $rutaArchivoMiniatura = $request->file('miniatura')->storeAs('Miniatura', 'miniatura_' . $video->id . '.png', 'public');

            $video->urlMiniatura = $rutaArchivoMiniatura;
            $video->url = $rutaArchivo;
            
            $video->save(); 

            // $table->string('urlMiniatura');
            // $table->integer('iduUuario');

    
            return $video;
        }
        catch (ValidationException $e) {
            $errors = $e->validator->errors()->getMessages();
            return response()->json(['errors' => $errors], 422);
        }
        
        catch (\Exception $e) {     
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function ShowVideo(Request $request, $id){

        $video = Video::findOrFail($id);
        $video->increment('visitas'); 
        return $video; 
    
    }


    public function Delete(Request $request, $id){

        $video = Video::findOrFail($id);
        $video->delete();

        return ['Message' => 'Video eliminado'];

    }

    public function Update(Request $request, $id){


        $video = Video::findOrFail($id);
        $video->titulo = $request->post('titulo');
        $video->descripcion = $request->post('descripcion');
        $video->autor = $request->post('autor');
        $video->save();


        return $video;
    }

    public function List(Request $request){

        $video = Video::all();
        return $video;

    }






    


}
