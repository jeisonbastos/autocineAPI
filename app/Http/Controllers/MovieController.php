<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['only' => 'all']);
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
            $peliculas = Movie::where('habilitada', true)->orderBy('nombre', 'desc')->with(['classifications', 'genders', 'shows'])->get();
            $response = [$peliculas];

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
            $peliculas = Movie::orderBy('nombre', 'desc')->with(['classifications', 'genders', 'shows'])->get();
            $response = [$peliculas];

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
            $pelicula = Movie::where('id', $id)->orderBy('nombre', 'desc')->with(['classifications', 'genders', 'shows'])->get();
            $response = [$pelicula];

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
            $peliculas = Movie::with(['classifications', 'genders', 'shows'])->where('id', $gender_id)->orderBy('nombre', 'desc')->get();
            $response = [$peliculas];

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  \App\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        //
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
