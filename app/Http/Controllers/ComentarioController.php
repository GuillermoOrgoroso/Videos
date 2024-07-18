<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
class ComentarioController extends Controller
{
    

    public function CreateComentario(Request $request){


        $comentario = new Comentario();
        $comentario -> text = $request->post('text');
        $comentario -> userAutor = $request->post('userAutor');
        $comentario -> idUsuario = $request->post('idUsuario');
        $comentario -> idVideo = $request->post('idVideo');
        $comentario->save();

        return $comentario;      

    }


    public function MostrarComentariosDeUnVideo(Request $request, $idVideo){

        $comentario = Comentario::where('idVideo', $idVideo)->get();
        return $comentario;
    }


    public function BuscarComentariosDeUnUsuario(Request $request, $idUsuario){

        $comentario = Comentario::where('idUsuario', $idUsuario)->get();
        return $comentario;

    }


    public function FindComentario(Request $request, $idComentario){

        $comentario = Comentario::FindOrFail($idComentario);
        return $comentario;

    }

    public function ListComentarios(Request $request){

        $arrayComentarios = [];
        $comentarios = Comentario::all();

        foreach($comentarios as $comentario){

            $arrayPelado[] = [
                "id" => $comentario -> id,
                "text" => $comentario -> text,
                "userAutor" => $comentario -> userAutor,
                "idUsuario" => $comentario -> idUsuario,
                "idVideo" => $comentario -> idVideo,
                "usuario" => $this -> obtenerDatosDeUser($comentario -> idUsuario, $request)
            ];
        }


    }

    public function obtenerDatosDeUser($id, $request){
        $tokenHeader = [
            "Authorization" => $request -> header("Authorization"),
            "Accept" => "application/json",
            "Content-Type" => "application/json"
        ];

        $response = Http::withHeaders($tokenHeader) -> get ( "http://localhost:8000/api/v1/user/" . $id);
        return $response -> json();
    }


    public function DeleteComentario($idComentario){

        $comentario = Comentario::FindOrFail($idComentario);
        $comentario->delete();
        return ['Message' => 'Comentario eliminado.'];
    }

        
    public function UpdateComentario(Request $request, $idComentario){

        $comnentario = Comentario::FindOrFail($idComentario);
        $comentario -> text = $request->post("text");
        $comentario->save();
        return $comentario;


    }

    public function RestoreComentario(Request $request, $idComentario){

        $comentario = Comentario::FindOrFail($idComentario);
        $comentario->restore();
        $comentario->save();
        return $comentario;

    }

}
