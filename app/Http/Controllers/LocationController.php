<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['only' => 'all']);
    }
    /**
     * Obtener lista todas las ubicaciones.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        try {
            $ubicaciones = Location::orderBy('nombre', 'asc')->with('shows')->get();
            $response = [$ubicaciones];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }


    /**
     * Obtener ubicacion con el 'id' por parametro
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        try {
            $ubicacion = Location::where('id', $id)->orderBy('nombre', 'asc')->with('shows')->get();
            $response = [$ubicacion];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }


    /**
     * Obtener Ubicaciones para una provincia
     * @param $provincia
     * @return \Illuminate\Http\Response
     */
    public function show_for_provincia($provincia)
    {
        //
        try {
            $ubicaciones = Location::where('provincia', $provincia)->orderBy('nombre', 'asc')->with('shows')->get();
            $response = [$ubicaciones];

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
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        //
    }
}
