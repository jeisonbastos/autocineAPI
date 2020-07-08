<?php

use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*$table->string('nombre', 200);
            $table->unsignedInteger('classification_id');
            $table->boolean('habilitada', false);
            $table->text('sinopsis');
            $table->decimal('puntuacion');
            $table->timestamps();
            #foreign keys
            $table->foreign('classification_id')->references('id')->on('classifications');*/

        $pelicula = new \App\Movie();
        $pelicula->nombre = 'Mascotas 2';
        $pelicula->classification_id = 1; //TP - Todo Público
        $pelicula->habilitada = true;
        $pelicula->sinopsis = 'Max Se Enfrenta A Nuevos E Importantes Cambios En Su Vida: Su Dueña Katie No Sólo Se Ha Casado,
                            Sino Que También Ha Sido Madre Por Primera Vez. En Un Viaje Familiar Al Campo Conoce A Un Perro
                            Granjero Llamado Rooster, Con El Que Aprende A Dominar Sus Miedos. Mientras Tanto, Gidget Trata
                            De Recuperar El Juguete Favorito De Max De Un Apartamento Repleto De Gatos.
                            Snowball, Por Otro Lado, Se Embarca En Una Peligrosa Misión Para Liberar A Un Tigre Blanco, Hu,
                            De Sus Captures En Un Circo De Animales. Secuela De "Mascotas"';
        $pelicula->puntuacion = 8.8;
        $pelicula->save();
        // Para hacer insert en tabla pivote
        $pelicula->genders()->attach([5]);

        $pelicula = new \App\Movie();
        $pelicula->nombre = 'La Gran Fuga';
        $pelicula->classification_id = 3; //TP12 - Todo Público Mayores de 12
        $pelicula->habilitada = true;
        $pelicula->sinopsis = 'Dos hermanos especializados en el robo de automóviles viajan al sur de Francia
                               para probar nuevos horizontes.';
        $pelicula->puntuacion = 6.8;
        $pelicula->save();
        // Para hacer insert en tabla pivote
        $pelicula->genders()->attach([1]);

        $pelicula = new \App\Movie();
        $pelicula->nombre = 'Una Buena Receta';
        $pelicula->classification_id = 1; //TP - Todo Público
        $pelicula->habilitada = false;
        $pelicula->sinopsis = 'Tras Perder El Prestigio Por Culpa De Su Carácter Y Sus Problemas Personales,
                                El Chef Adam Jones (Bradley Cooper), Pasado Un Tiempo, Abre Con Su Antiguo Equipo
                                Un Nuevo Restaurante Con El Objetivo De Alcanzar La Perfección Y Conseguir Las Tres
                                Estrellas Michelin.';
        $pelicula->puntuacion = 8.8;
        $pelicula->save();
        // Para hacer insert en tabla pivote
        $pelicula->genders()->attach([3, 4]);
    }
}
