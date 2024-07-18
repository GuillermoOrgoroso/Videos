<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class VideoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */


    //  public function test_validationNullUpdateVideo()
    //  {

    //     $response = $this->put('/api/v1/video/1004',[
    //         "titulo" => " ",
    //         "descripcion" => " ",
    //         "autor" => ' '
    //     ]);
    //     $response->assertStatus(500);
    //     $response->assertInvalid([
    //             'titulo' => 'El campo título es obligatorio.',
    //             'descripcion' => 'La descripción es obligatoria.',
    //             'autor' => 'El autor es obligatorio.'
    //             ]);

    //  }

    public function test_validatorNullStoreVideo() {

        $response = $this->post('api/v1/videos', [

            'titulo' => ' ',
            'descripcion' => ' ',
            'autor' => ' ',
            'archivo' => null,
            "idUsuario" => null,
            "miniatura" => null,

        ]);

        $response->assertStatus(302);
        $response->assertInvalid([
                'titulo' => 'El campo título es obligatorio.',
                'descripcion' => 'La descripción es obligatoria.',
                 'autor' => 'El autor es obligatorio.',
                 'archivo' => 'El archivo es obligatorio.',
                 "idUsuario"  => 'El usuario es obligatorio'
        ]);
    }


    public function test_validatorInvalidFileStoreVideo(){

       $response = $this->post('api/v1/videos', [
        'titulo' => 'No soy un video',
        'descripcion' => 'No soy un video',
        'autor' => 'PEPE',
        'url' => 'a',
        'urlMiniatura' => 'a',
        'archivo' => UploadedFile::fake()->create('sample.png', '1000', 'png'),
        'miniatura' => UploadedFile::fake()->create('random.png', '1000', 'png')

    ]);

        $response->assertStatus(302);
        $response->assertInvalid([
        
            'archivo' => 'El archivo debe ser un tipo de archivo: mp4, avi, mov.'
            
    ]);

    }
    public function test_validatorInvalidFileMiniaturaStoreVideo(){

        $response = $this->post('api/v1/videos', [
         'titulo' => 'No soy un video',
         'descripcion' => 'No soy un video',
         'autor' => 'PEPE',
         'url' => 'a',
         'urlMiniatura' => 'a',
         'idUsuario' => 1,
         'archivo' => UploadedFile::fake()->create('sample.mp4', '1000', 'mp4'),
         'miniatura' => UploadedFile::fake()->create('random.mp4', '1000', 'mp4')
 
     ]);
 
         $response->assertStatus(302);
         $response->assertInvalid([
         
             'miniatura' => 'El archivo debe ser de tipo JPG o PNG.'
             
     ]);
 
     }


    // 'miniatura' => UploadedFile::fake()->create('random.png', '1000', 'png')
    // 'miniatura' => 'El archivo debe ser de tipo JPG o PNG.'
    public function test_validatorMax255CaracteresStore(){

        $response = $this->post('api/v1/videos', [
            'titulo' => '¿A quién no le encanta un tazón de helado rico y cremoso? No obstante, en lugar de comprar un litro de helado en una tienda, puedes prepararlo en casa y así tener el control de todos los ingredientes, así como dejar volar tu creatividad con los sabores. Puedes hacer una base de crema que incluya huevos o una base de estilo Filadelfia sin huevos, aunque la decisión más importante es la forma en que la batirás. Una heladora eléctrica simplificará mucho las cosas, aunque puedes batir a mano con la ayuda de una cuchara. También puedes utilizar un recipiente para heladera, bolsas de plástico con hiel y sal de roca, o un procesador de alimentos. Asimismo, si el proceso de batido te parece demasiado trabajoso, puedes utilizar leche condensada endulzada para preparar un helado que no necesite batirse. ¡Las posibilidades son infinitas!',
            'descripcion' => 'No soy un video',
            'autor' => '¿A quién no le encanta un tazón de helado rico y cremoso? No obstante, en lugar de comprar un litro de helado en una tienda, puedes prepararlo en casa y así tener el control de todos los ingredientes, así como dejar volar tu creatividad con los sabores. Puedes hacer una base de crema que incluya huevos o una base de estilo Filadelfia sin huevos, aunque la decisión más importante es la forma en que la batirás. Una heladora eléctrica simplificará mucho las cosas, aunque puedes batir a mano con la ayuda de una cuchara. También puedes utilizar un recipiente para heladera, bolsas de plástico con hiel y sal de roca, o un procesador de alimentos. Asimismo, si el proceso de batido te parece demasiado trabajoso, puedes utilizar leche condensada endulzada para preparar un helado que no necesite batirse. ¡Las posibilidades son infinitas!',
            'url' => 'a',
            'urlMiniatura' => 'a',
            'archivo' => UploadedFile::fake()->create('sample.mp4', '1000', 'mp4'),
            'miniatura' => UploadedFile::fake()->create('random.png', '1000', 'png')
    
        ]);

        $response->assertStatus(302);
        $response->assertInvalid([
        
            'titulo' => 'El título no puede tener más de 255 caracteres.',
            'autor' => 'El autor no puede tener más de 255 caracteres.'
    
    ]);

        
    }
    

    public function test_ListAllVideos(){
        $estructura = [
            '*'=> [
                "id",
                "titulo",
                "descripcion",
                "autor",
                "url",
                "visitas",
                "urlMiniatura",
                "idUsuario",
                "created_at",
                "updated_at"
            ]

            ];
            $response = $this->get('/api/v1/video');
            $response->assertStatus(200);
            $response->assertJsonCount(503);
            $response->assertJsonStructure($estructura);


    }


    public function test_ListOneVideo(){
        $estructura = [
                "id",
                "titulo",
                "descripcion",
                "autor",
                "url",
                "visitas",
                "urlMiniatura",
                "idUsuario",
                "created_at",
                "updated_at"
        ];

        $response = $this->get('api/v1/video/1001');
        $response->assertStatus(200);
        $response->assertJsonCount(12);
        $response->assertJsonStructure($estructura);
        $response->assertJsonFragment([
            "id" => 1001,
            "titulo" => "KimDotcom va en cana",
            "descripcion" => "Se porto mal con EEUU, no pago los tax",
            "autor" => 'KimDotcom',
            "url" => 'This domain name associated with the website Megaupload.com has been seized pursuant to an order issued by a U.S Distrct Court',
            "visitas" => 912,
            "idUsuario" => 1,
            "urlMiniatura" => 'asd',

        ]);

    }
    public function test_CreateOneVideo(){
        $estructura = [
            "id",
            "titulo",
            "descripcion",
            "autor",
            "url",
            "visitas",
            "urlMiniatura",
            "idUsuario",

            "created_at",
            "updated_at"
    ];

    $response = $this->post('api/v1/videos',[
            "titulo" => "KimDotcom va en cana",
            "descripcion" => "Se porto mal con EEUU, no pago los tax",
            "autor" => 'KimDotcom',
            "archivo" => UploadedFile::fake()->create('sample.mp4', '1000', 'mp4'),
            'miniatura' => UploadedFile::fake()->create('random.png', '1000', 'png'),
            "url" => ' ',
            "urlMiniatura" => ' ',
            "idUsuario" => 1,
            "visitas" => 911
    ]);

     $response->assertStatus(201);
     $response->assertJsonCount(11);
     $response->assertJsonStructure($estructura);


        
    }

    public function test_UpdateOneVideoThatDoesExists(){
        $estructura = [
            "id",
            "titulo",
            "descripcion",
            "autor",
            "url",
            "visitas",
            "urlMiniatura",
            "idUsuario",
            "created_at",
            "updated_at"
    ];
        $response = $this->put('/api/v1/video/1002',[
            "titulo" => "KimDotcom va en cana",
            "descripcion" => "Se porto mal con EEUU, no pago los tax",
            "autor" => 'KimDotcom'
            
        ]);

        $response->assertStatus(200);
        $response->assertJsonCount(12);
        $response->assertJsonStructure($estructura);
        $response->assertJsonFragment([
            "titulo" => "KimDotcom va en cana",
            "descripcion" => "Se porto mal con EEUU, no pago los tax",
            "autor" => 'KimDotcom'


        ]);
        $this->assertDatabaseHas('videos',[
            "id"=> 1002,
            "titulo" => "KimDotcom va en cana",
            "descripcion" => "Se porto mal con EEUU, no pago los tax",
            "autor" => 'KimDotcom'
        ]);


    }

    public function test_UpdateOneVideoThatDoesNotExists(){
        $response = $this->put('/api/v1/video/99999');
        $response->assertStatus(404);
    }

    public function test_DeleteOneVideoThatDoesExists(){
        $estructura = [

            'Message'
        ];

        $response = $this->delete('/api/v1/video/1003');
        $response->assertStatus(200);
        $response->assertJsonCount(1);
        $response->assertJsonStructure($estructura);
        $response->assertJsonFragment([
            'Message' => 'Video eliminado'
        ]);

        $this->assertDatabaseMissing('videos', [
            "id" => 1003
        ]);
    }

    public function test_DeleteOneVideoThatDoesNotExists(){
        $response = $this->delete('/api/v1/video/989898');
        $response->assertStatus(404);

    }
}
