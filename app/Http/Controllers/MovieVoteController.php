<?php

namespace App\Http\Controllers;

use App\MovieVote;
use App\Movie;
use Illuminate\Http\Request;

class MovieVoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        try {
            $this->validate($request, [
                'movie_id' => 'required|numeric|min:1',
            ]);
        } catch (\illuminate\Validation\ValidationException $e) {
            return $this->responseErrors($e->errors(), 422);
        }
        //Instancia Movie
        $movie_vote = new MovieVote();
        $movie_vote->movie_id = $request->input('movie_id');

        if ($movie_vote->save()) {
            //Busca la Pelicula a registrar Voto
            $movie = Movie::find($request->input('movie_id'));
            $movie->puntuacion = $movie_vote->getPuntuacion($request->input('movie_id'));
            $movie->update();
            $response = 'Voto Registrado Exitósamente';
            return response()->json($response, 201);
        } else {
            $response = ['msg' => 'Error al Registrar Voto'];
            return response()->json($response, 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MovieVote  $movieVote
     * @return \Illuminate\Http\Response
     */
    public function show(MovieVote $movieVote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MovieVote  $movieVote
     * @return \Illuminate\Http\Response
     */
    public function edit(MovieVote $movieVote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MovieVote  $movieVote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MovieVote $movieVote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MovieVote  $movieVote
     * @return \Illuminate\Http\Response
     */
    public function destroy(MovieVote $movieVote)
    {
        //
    }
}
