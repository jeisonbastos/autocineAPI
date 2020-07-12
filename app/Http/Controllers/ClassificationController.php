<?php

namespace App\Http\Controllers;

use App\Classification;
use Illuminate\Http\Request;

class ClassificationController extends Controller
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
            $classificaciones = Classification::orderBy('siglas', 'desc')->with(['movies'])->get();
            $response = [$classificaciones];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     *  Listado de todas las classificaciones
     *
     */
    public function all()
    {
        try {
            $classificaciones = Classification::orderBy('siglas', 'desc')->with(['movies'])->get();
            $response = [$classificaciones];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Obtener Pelicula especifica por id
     * @param  \App\Classification  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $classificacion = Classification::where('id', $id)->orderBy('siglas', 'desc')->with(['movies'])->get();
            $response = [$classificacion];

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
     * @param  \App\Classification  $classification
     * @return \Illuminate\Http\Response
     */
    public function edit(Classification $classification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classification  $classification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classification $classification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classification  $classification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classification $classification)
    {
        //
    }
}
