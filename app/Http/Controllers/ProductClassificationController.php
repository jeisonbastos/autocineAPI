<?php

namespace App\Http\Controllers;

use App\ProductClassification;
use Illuminate\Http\Request;

class ProductClassificationController extends Controller
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
            $clasificaciones_producto = ProductClassification::orderBy('nombre', 'desc')->with(['products'])->get();
            $response = $clasificaciones_producto;

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     *  Listado de todas las clasificaciones_producto
     *
     */
    public function all()
    {
        try {
            $clasificaciones_producto = ProductClassification::orderBy('nombre', 'desc')->with(['products'])->get();
            $response = $clasificaciones_producto;

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Obtener Pelicula especifica por id
     * @param  \App\ProductClassification  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $clasificacion_producto = ProductClassification::where('id', $id)->orderBy('nombre', 'desc')->with(['products'])->get();
            $response = $clasificacion_producto;

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
     * @param  \App\ProductClassification  $product_Classification
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductClassification $product_Classification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductClassification  $product_Classification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductClassification $product_Classification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductClassification  $product_Classification
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductClassification $product_Classification)
    {
        //
    }
}
