<?php

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
        factory(App\Group::class, 3)->create();

        factory(App\Level::class)->create(['name' => 'Oro']);
        factory(App\Level::class)->create(['name' => 'Plata']);
        factory(App\Level::class)->create(['name' => 'Bronce']);


        /*
        En este factory estamos creando a 5 usuarios,
        luego que lo creamos, hacemos un ciclo con each() en donde al usuario creado lo guardamos en una variable,
        luego en $profile con el ususario creado y con el metod de profile creamos un perfil haciendo uso del factory profile,
        asi mismo al profile creamos una localizacion con el metod location() y con su factory creamos una localizacion,
        luego al mismo usuario con el metod groups creamos de 1 a 3 tipos de grupos aleatorios, el metodo array esta abajo y es como nos lo crea,
        por ultimo al usuario le creamos una imagen con el factory image en donde el especificamos la forma en que debe de estar.

        Tener en cuenta que los metodos que utilizamos estan en los model de cada tabla y que estan bien relacionados.

        IMPORTANTE

        Todos los usuarios que se crean asi como su profile, location groups e image estan relacionados entre si ya que en la
        forma en que estan relacionados es como se esta creando aqui, asi que un usuario esta relacionado con un profile y
        un profile esta relacionado con una location, tambien un usuario esta relacionado con uno u muchos grupos y un usuario esta relacionado
        con una imagen, es por eso de las varias relaciones que debe de hacerse asi XD
        */

        factory(App\User::class, 5)->create()->each(function ($user){

            $profile = $user->profile()->save(factory(App\Profile::class)->make());

            $profile->location()->save(factory(App\Location::class)->make());

            $user->groups()->attach($this->array(rand(1,3)));

            $user->image()->save(factory(App\Image::class)->make(['url' => 'https://lorempixel.com/90/90/']));

        });

        /*
        Los post y los videos
        */

        factory(App\Category::class, 4)->create();
        factory(App\Tag::class, 12)->create();

        /*
         En el siguiente factory hago algo parecido a lo de arriba.

         Estoy creando 40 post con una imagen, etiquetas y de 1 a 6 comenatarios

         todos los crea con los factorys configurados y los modelos bien relacionados para hacer uso de los metodos correspondientes
        */

        factory(App\Post::class, 40)->create()->each(function ($post) {

            $post->image()->save(factory(App\Image::class)->make());

            $post->tags()->attach($this->array(rand(1, 12)));

            $number_comments = rand(1, 6);

            for ($i=0; $i < $number_comments; $i++)
            {
                $post->comments()->save(factory(App\Comment::class)->make());
            }
        });

        /*
        Ahora hago lo mismo pero con los videos XD
        */
        factory(App\Video::class, 40)->create()->each(function ($video) {

            $video->image()->save(factory(App\Image::class)->make());

            $video->tags()->attach($this->array(rand(1, 12)));

            $number_comments = rand(1, 6);

            for ($i=0; $i < $number_comments; $i++)
            {
                $video->comments()->save(factory(App\Comment::class)->make());
            }
        });

    }

    /* Este metodo me sirve para crear un arreglo aleatorio entre 1-3 para los grupos de un usuario */
    public function array($max)
    {
        $values = [];
        for($i=1; $i < $max; $i++)
        {
            $values[] = $i;
        }
        return $values;
    }
}
