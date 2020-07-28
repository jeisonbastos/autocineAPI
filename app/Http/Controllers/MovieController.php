<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;

class MovieController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['only' => 'create']);
    }
    /**
     * Listado de Peliculas habilitadas
     * @jeisonbastos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $peliculas = Movie::where('habilitada', true)->orderBy('nombre', 'desc')->with(['classification', 'genders', 'shows'])->get();
            $response = $peliculas;

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     *  Listado de todas las peliculas
     *
     */
    public function all()
    {
        try {
            $peliculas = Movie::orderBy('nombre', 'desc')->with(['classification', 'genders', 'shows'])->get();
            $response = $peliculas;

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Obtener Pelicula especifica por id
     * @param  \App\Movie  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $pelicula = Movie::where('id', $id)->orderBy('nombre', 'desc')->with(['classification', 'genders', 'shows'])->get();
            $response = $pelicula;

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Obtener Pelicula especifica por id
     * @param  \App\Movie  $id
     * @return \Illuminate\Http\Response
     */
    public function gender($gender_id)
    {
        try {
            $peliculas = Movie::with(['classification', 'genders', 'shows'])->where('id', $gender_id)->orderBy('nombre', 'desc')->get();
            $response = $peliculas;

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$table->string('nombre', 200);
            $table->unsignedInteger('classification_id');
            $table->boolean('habilitada', false);
            $table->text('sinopsis');
            $table->decimal('puntuacion');
            $table->string('imagenURL');*/
        try {
            $this->validate($request, [
                'nombre' => 'required|min:5',
                'habilitada' => 'required',
                'sinopsis' => 'required|min:5',
                'puntuacion' => 'required|min:0',
                'classification_id' => 'required|numeric|min:1',
                'imagenURL' => 'nullable'
            ]);
            //Obtener el usuario autenticado actual
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['msg' => 'Usuario no encontrado'], 404);
            }
        } catch (\illuminate\Validation\ValidationException $e) {
            return $this->responseErrors($e->errors(), 422);
        }
        //Instancia Movie
        $movie = new Movie();
        $movie->nombre = $request->input('nombre');
        $movie->habilitada = $request->input('habilitada');
        $movie->sinopsis = $request->input('sinopsis');
        $movie->puntuacion = $request->input('puntuacion');
        $movie->classification()->associate($request->input('classification_id'));
        $movie->imagenURL = $request->input('imagenURL');

        //Usuario que inserta la pelicula
        $movie->user()->associate($user->id);

        if ($movie->save()) {
            $movie->genders()->attach(
                $request->input('genders') === null ?
                    [] : $request->input('genders')
            );
            $response = 'Pelicula Creada Exitósamente';
            return response()->json($response, 201);
        } else {
            $response = ['msg' => 'Error en la creación de la Película'];
            return response()->json($response, 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        /*$table->string('nombre', 200);
            $table->unsignedInteger('classification_id');
            $table->boolean('habilitada', false);
            $table->text('sinopsis');
            $table->decimal('puntuacion');
            $table->string('imagenURL');*/
        try {
            $this->validate($request, [
                'nombre' => 'required|min:5',
                'habilitada' => 'required',
                'sinopsis' => 'required|min:5',
                'puntuacion' => 'required|min:0',
                'classification_id' => 'required|numeric|min:1',
                'imagenURL' => 'nullable'
            ]);
            //Obtener el usuario autenticado actual
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['msg' => 'Usuario no encontrado'], 404);
            }
        } catch (\illuminate\Validation\ValidationException $e) {
            return $this->responseErrors($e->errors(), 422);
        }
        //Instancia Movie
        $movie = Movie::find($id);
        $movie->nombre = $request->input('nombre');
        $movie->habilitada = $request->input('habilitada');
        $movie->sinopsis = $request->input('sinopsis');
        $movie->puntuacion = $request->input('nombre');
        $movie->classification()->associate($request->input('classification_id'));
        $movie->imagenURL = $request->input('imagenURL');

        //Usuario que inserta la pelicula
        $movie->user()->associate($user->id);

        if ($movie->update()) {
            $movie->genders()->sync(
                $request->input('genders') === null ?
                    [] : $request->input('genders')
            );
            $response = 'Pelicula Actualizado Exitósamente';
            return response()->json($response, 200);
        } else {
            $response = ['msg' => 'Error en la Actualización de la Película'];
            return response()->json($response, 404);
        }
    }

    /**
     * Habilita o deshabilita una pelicula
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function habilitar($id)
    {
        $movie = Movie::find($id);
        $movie->habilitada === true ? false : true;

        if ($movie->update()) {
            $response = 'Pelicula ' + $movie->habilitada === true ? 'Habilitada' : 'Deshabilitada' + ' Exitósamente';
            return response()->json($response, 200);
        } else {
            $response = ['msg' => 'Error al ' + $movie->habilitada === false ? 'Habilitar' : 'Deshabilitar' + ' la Película'];
            return response()->json($response, 404);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
