<?php

namespace App\Http\Controllers;

use App\ProductVote;
use Illuminate\Http\Request;

class ProductVoteController extends Controller
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
                'product_id' => 'required|numeric|min:1',
            ]);
        } catch (\illuminate\Validation\ValidationException $e) {
            return $this->responseErrors($e->errors(), 422);
        }
        //Instancia Movie
        $product_vote = new ProductVote();
        $product_vote->nombre = $request->input('product_id');

        if ($product_vote->save()) {
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
     * @param  \App\ProductVote  $productVote
     * @return \Illuminate\Http\Response
     */
    public function show(ProductVote $productVote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductVote  $productVote
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductVote $productVote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductVote  $productVote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductVote $productVote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductVote  $productVote
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductVote $productVote)
    {
        //
    }
}
