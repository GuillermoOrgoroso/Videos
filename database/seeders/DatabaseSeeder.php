<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Video::factory(500)->create();
        \App\Models\Video::factory(1)->create([

            "id" => 1001,
            "titulo" => "KimDotcom va en cana",
            "descripcion" => "Se porto mal con EEUU, no pago los tax",
            "autor" => 'KimDotcom',
            "url" => 'This domain name associated with the website Megaupload.com has been seized pursuant to an order issued by a U.S Distrct Court',
            "visitas" => 911,
            "idUsuario" => 1,
            "urlMiniatura" => 'asd'

            

        ]);
        \App\Models\Video::factory(1)->create([

            "id" => 1002,
            "titulo" => "KimDotcom va en cana",
            "descripcion" => "Se porto mal con EEUU, no pago los tax",
            "autor" => 'KimDotcom',
            "url" => 'This domain name associated with the website Megaupload.com has been seized pursuant to an order issued by a U.S Distrct Court',
            "visitas" => 911,
            "idUsuario" => 1,
            "urlMiniatura" => 'asd'



        ]);
        \App\Models\Video::factory(1)->create([

            "id" => 1003,
            "titulo" => "KimDotcom va en cana",
            "descripcion" => "Se porto mal con EEUU, no pago los tax",
            "autor" => 'KimDotcom',
            "url" => 'This domain name associated with the website Megaupload.com has been seized pursuant to an order issued by a U.S Distrct Court',
            "visitas" => 911,
            "idUsuario" => 1,
            "urlMiniatura" => 'asd'



        ]);


        \App\Models\Comentario::factory(1)->create([


            "id" => 1,
            "text" => "tu video me parece muy ofensivo porque altera mis sentimientos de cristal",
            "userAutor" => "Facundo100xCientoProPlayer",
            "idUsuario" => 1,
            "idVideo" => 1001

        ]);

        \App\Models\Comentario::factory(1)->create([


            "id" => 2,
            "text" => "Fua amigo gracias por hacer de este mundo un lugar mejor, lleno de flores y algodon de azucar",
            "userAutor" => "RaulHernandezCi1395830358Num095963944",
            "idUsuario" => 1,
            "idVideo" => 1002
        ]);

        \App\Models\Comentario::factory(1)->create([


            "id" => 3,
            "text" => "kkkkkkk hola manito",
            "userAutor" => "Pepe",
            "idUsuario" => 1,
            "idVideo" => 1001

        ]);

        \App\Models\Comentario::factory(1)->create([


            "id" => 4,
            "text" => "kkkkkjlkasdjlkasdjlkasdo",
            "userAutor" => "Pepeeee",
            "idUsuario" => 1,
            "idVideo" => 1001

        ]);
        
        \App\Models\Comentario::factory(1)->create([


            "id" => 5,
            "text" => "lalaalalalalalalala",
            "userAutor" => "raulee",
            "idUsuario" => 1,
            "idVideo" => 1001

        ]);
        


    }
}
