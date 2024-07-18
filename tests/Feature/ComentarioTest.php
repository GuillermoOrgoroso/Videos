<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ComentarioTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_ListAllComentarios(){
        $estructura = [
            '*'=> [
                "id",
                "text",
                "userAutor",
                "idUsuario",
                "idVideo",
                "created_at",
                "updated_at"
            ]

            ];
            $response = $this->get('/api/v1/comentario');
            $response->assertStatus(200);
            $response->assertJsonCount(3);
            $response->assertJsonStructure($estructura);



    }



    // public function test_ListAllComentsFromOneVideo(){
    //     $estructura = [
    //         '*'=> [
    //             "id",
    //             "text",
    //             "userAutor",
    //             "idUsuario",
    //             "idVideo",
    //             "created_at",
    //             "updated_at",
    //             "deleted_at"
    //         ]
    //     ];

    //     $response = $this->get('api/v2/comentario/1001/video');
    //     $response->assertStatus(200);
    //     $response->assertJsonCount(4);
    //     $response->assertJsonStructure($estructura);

         

    // }


    public function test_CreateOneComentario(){

        $estructura = [
                "id",
                "text",
                "userAutor",
                "idUsuario",
                "idVideo",
                "created_at",
                "updated_at"
                

        ];

        $response = $this->post("api/v2/comentario", [

            "text" => "Esto es un comentario random",
            "userAutor" => "El Raulito ;)",
            "idUsuario" => 1,
            "idVideo" => 2


        ]);

        $response->assertStatus(201);
        $response->assertJsonCount(7);
        $response->assertJsonStructure($estructura);



    }

    public function test_BuscarComentariosDeUnUsuario(){

        $estrucutura = [
            '*' => [
                "id",
                "text",
                "userAutor",
                "idUsuario",
                "idVideo",
                "created_at",
                "updated_at",
                "deleted_at"
            ]

            ];

        $response = $this->get("api/v2/comentario/1/user");
        $response->assertStatus(200);
        $response->assertJsonCount(6);
        $response->assertJsonStructure($estrucutura);



    }

    public function test_FindComentario(){

        $estructura = [
            
                "id",
                "text",
                "userAutor",
                "idUsuario",
                "idVideo",
                "created_at",
                "updated_at",
                "deleted_at"

            ];

        $response = $this->get('api/v2/comentario/4');
        $response->assertStatus(200);
        $response->assertJsonCount(8);
        $response->assertJsonStructure($estructura);
        $response->assertJsonFragment([
            "id" => 4,
            "text" => "kkkkkjlkasdjlkasdjlkasdo",
            "userAutor" => "Pepeeee",
            "idUsuario" => 1,
            "idVideo" => 1001
        ]);


    }

}
