<?php

namespace App\Http\Controllers;

use App\Show;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['only' => 'all']);
    }
    /**
     * Listado de Funciones habilitadas
     * @jeisonbastos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $funciones = Show::where('visible_cartelera', true)->orderBy('location_id', 'desc')->orderBy('movie_id', 'desc')->with(['movie', 'tickets'])->get();
            $response = [$funciones];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Listado de Funciones habilitadas
     * @jeisonbastos
     *
     * @return \Illuminate\Http\Response
     */
    public function sell()
    {
        try {
            $funciones = Show::where('disponible_venta', true)->orderBy('location_id', 'desc')->orderBy('movie_id', 'desc')->withCount(['movie', 'tickets'])->get();
            $response = [$funciones];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     *  Listado de todas las Funciones
     *
     */
    public function all()
    {
        try {
            $funciones = Show::orderBy('location_id', 'desc')->orderBy('movie_id', 'desc')->with(['movie', 'tickets'])->get();
            $response = [$funciones];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Obtener Funciones especifica por id
     * @param  \App\Show  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $funcion = Show::where('id', $id)->orderBy('location_id', 'desc')->orderBy('movie_id', 'desc')->with(['movie', 'tickets'])->get();
            $response = [$funcion];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Obtener Funciones especifica por location_id
     * @param  \App\Show  $location_id
     * @return \Illuminate\Http\Response
     */
    public function show_for_location($location_id)
    {
        try {
            $funcion = Show::where('location_id', $location_id)->orderBy('location_id', 'desc')->orderBy('movie_id', 'desc')->with(['movie', 'tickets'])->get();
            $response = [$funcion];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Obtener Funciones especifica por movie_id
     * @param  \App\Show  $movie_id
     * @return \Illuminate\Http\Response
     */
    public function show_for_movie($movie_id)
    {
        try {
            $funcion = Show::where('movie_id', $movie_id)->orderBy('location_id', 'desc')->orderBy('movie_id', 'desc')->with(['movie', 'tickets'])->get();
            $response = [$funcion];

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
     * @param  \App\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function edit(Show $show)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Show $show)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function destroy(Show $show)
    {
        //
    }
}
