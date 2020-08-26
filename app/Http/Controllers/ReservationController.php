<?php

namespace App\Http\Controllers;

use App\Reservation;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

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
    public function reservacion($id)
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
    public function reservacion_for_user($user_id)
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
        // $table->increments('id');
        // $table->unsignedInteger('user_id');
        // $table->decimal('iva');
        // $table->decimal('total');
        try {
            $this->validate($request, [
                'user_id' => 'required|numeric|min:1',
                'iva'=> 'nullable',
                'total' => 'nullable',
                'tickets' => 'required|array|min:1',
                'products' => 'required|array|min:0',
            ]);
            //Obtener el usuario autenticado actual
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(
                    ['msg' => 'Usuario no encontrado'],
                    404
                );
            }
        } catch (\illuminate\Validation\ValidationException $e) {
            return $this->responseErrors($e->errors(), 422);
        }
        //Instancia Show
        $reservacion = new Reservation();
        $reservacion->user()->associate($request->input('user_id'));
        $reservacion->iva = $reservacion->calc_iva();
        $reservacion->total = $reservacion->calc_total();
        if ($reservacion->save()) {
            $reservacion->tickets()->attach([
                $request->input('tickets') === null ?
                    [] : $request->input('tickets') => ['cantidad' => $request->input('tickets.pivot.cantidad')]]
                // $request->input('tickets') === null ?
                //     [] : $request->input('tickets')
            );
            $reservacion->products()->attach(
                $request->input('products') === null ?
                    [] : $request->input('products')
            );
            $response = 'Reservación Creada Exitósamente';
            return response()->json($response, 201);
        } else {
            $response = ['msg' => 'Error en la creación de la Reservación'];
            return response()->json($response, 404);
        }
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
    public function update(Request $request, $id)
    {
        // $table->increments('id');
        // $table->unsignedInteger('user_id');
        // $table->decimal('iva');
        // $table->decimal('total');
        try {
            $this->validate($request, [
                'user_id' => 'required|unique:reservacions,fecha',
                'iva' => 'required|unique:reservacions,hora',
                'total' => 'required|numeric|min:1',
                'tickets' => 'required|array|min:1',
                'products' => 'required|array|min:0',
            ]);
            //Obtener el usuario autenticado actual
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(
                    ['msg' => 'Usuario no encontrado'],
                    404
                );
            }
        } catch (\illuminate\Validation\ValidationException $e) {
            return $this->responseErrors($e->errors(), 422);
        }
        //Instancia Show
        $reservacion = Reservation::find($id);
        $reservacion->user()->associate($request->input('user_id'));
        $reservacion->iva = $reservacion->calc_iva();
        $reservacion->total = $reservacion->calc_iva();

        if ($reservacion->update()) {
            $reservacion->tickets()->sync(
                $request->input('tickets') === null ?
                    [] : $request->input('tickets')
            );
            $reservacion->products()->sync(
                $request->input('products') === null ?
                    [] : $request->input('products')
            );
            $response = 'Reservación Actualizada Exitósamente';
            return response()->json($response, 201);
        } else {
            $response = ['msg' => 'Error en la actualización de la Reservación'];
            return response()->json($response, 404);
        }
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
