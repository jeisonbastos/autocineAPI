<?php

namespace App\Http\Controllers;

use App\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
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
            $tipos_producto = ProductType::orderBy('nombre', 'desc')->with(['products'])->get();
            $response = $tipos_producto;

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
            $tipos_producto = ProductType::orderBy('nombre', 'desc')->with(['products'])->get();
            $response = $tipos_producto;

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Obtener ProductTypeo especifica por id
     * @param  \App\ProductType  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $tipo_producto = ProductType::where('id', $id)->orderBy('nombre', 'desc')->with(['products'])->get();
            $response = $tipo_producto;

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
     * @param  \App\ProductType  $product_Type
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductType $product_Type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductType  $product_Type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductType $product_Type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductType  $product_Type
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductType $product_Type)
    {
        //
    }
}
