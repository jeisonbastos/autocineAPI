<?php

namespace App\Http\Controllers;

use App\Gender;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['only' => '']);
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
            $generos = Gender::orderBy('nombre', 'desc')->with(['movies'])->get();
            $response = $generos;

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     *  Listado de todas las generos
     *
     */
    public function all()
    {
        try {
            $generos = Gender::orderBy('nombre', 'desc')->with(['movies'])->get();
            $response = $generos;

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Obtener Pelicula especifica por id
     * @param  \App\Gender  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $genero = Gender::where('id', $id)->orderBy('nombre', 'desc')->with(['movies'])->get();
            $response = $genero;

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
     * @param  \App\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function edit(Gender $gender)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gender $gender)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gender $gender)
    {
        //
    }
}
