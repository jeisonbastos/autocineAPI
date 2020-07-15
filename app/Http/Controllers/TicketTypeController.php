<?php

namespace App\Http\Controllers;

use App\TicketType;
use Illuminate\Http\Request;

class TicketTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['only' => '']);
    }
    /**
     * Listado de TicketType habilitadas
     * @jeisonbastos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $tipos_tiquete = TicketType::orderBy('id', 'desc')->with(['tickets'])->get();
            $response = $tipos_tiquete;

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     *  Listado de todas las TicketType
     *
     */
    public function all()
    {
        try {
            $tipos_tiquete = TicketType::orderBy('id', 'desc')->with(['tickets'])->get();
            $response = $tipos_tiquete;

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Obtener TicketType especifica por id
     * @param  \App\TicketType  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $tipo_tiquete = TicketType::where('id', $id)->orderBy('id', 'desc')->with(['tickets'])->get();
            $response = $tipo_tiquete;

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
     * @param  \App\TicketType  $ticket_Type
     * @return \Illuminate\Http\Response
     */
    public function edit(TicketType $ticket_Type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TicketType  $ticket_Type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TicketType $ticket_Type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TicketType  $ticket_Type
     * @return \Illuminate\Http\Response
     */
    public function destroy(TicketType $ticket_Type)
    {
        //
    }
}
