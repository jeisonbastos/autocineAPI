<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['only' => '']);
    }
    /**
     * Listado de ProductTypeos habilitadas
     * @jeisonbastos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $reservaciones = Reservation::orderBy('id', 'desc')->with(['user', 'tickets', 'products'])->get();
            $response = $reservaciones;

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     *  Listado de todas las productos
     *
     */
    public function all()
    {
        try {
            $reservaciones = Reservation::orderBy('id', 'desc')->with(['user', 'tickets', 'products'])->get();
            $response = $reservaciones;

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Obtener ProductTypeo especifica por id
     * @param  \App\Reservation  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $reservacion = Reservation::where('id', $id)->orderBy('id', 'desc')->with(['user', 'tickets', 'products'])->get();
            $response = $reservacion;

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Obtener ProductTypeo especifica por id
     * @param  \App\Reservation  $id
     * @return \Illuminate\Http\Response
     */
    public function show_for_user($user_id)
    {
        try {
            $reservacion = Reservation::where('user_id', $user_id)->orderBy('id', 'desc')->with(['user', 'tickets', 'products'])->get();
            $response = $reservacion;

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
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}
