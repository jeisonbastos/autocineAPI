<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['only' => '']);
    }
    /**
     * Listado de Tiquetes habilitadas
     * @jeisonbastos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $tiquetes = Ticket::orderBy('id', 'desc')->orderBy('show_id', 'desc')->with(['show', 'ticket_type'])->get();
            $response = $tiquetes;

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     *  Listado de todas las Tiquetes
     *
     */
    public function all()
    {
        try {
            $tiquetes = Ticket::orderBy('id', 'desc')->orderBy('show_id', 'desc')->with(['show', 'ticket_type'])->get();
            $response = $tiquetes;

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Obtener Tiquete especifico por id
     * @param  \App\Ticket  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $tiquete = Ticket::where('id', $id)->orderBy('id', 'desc')->orderBy('show_id', 'desc')->with(['show', 'ticket_type'])->get();
            $response = [$tiquete];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Obtener Tiquetes especifica por show_id
     * @param  \App\Ticket  $show_id
     * @return \Illuminate\Http\Response
     */
    public function show_for_a_show($show_id)
    {
        try {
            $tiquete = Ticket::where('show_id', $show_id)->orderBy('id', 'desc')->orderBy('show_id', 'desc')->with(['show', 'ticket_type'])->get();
            $response = [$tiquete];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Ticket the form for creating a new resource.
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
     * Ticket the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
