<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['only' => '']);
    }
    /**
     * Listado de Productos habilitadas
     * @jeisonbastos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $productos = Product::orderBy('nombre', 'desc')->with(['product_type', 'reservations', 'classifications'])->get();
            $response = $productos;

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
            $productos = Product::orderBy('nombre', 'desc')->with(['product_type', 'reservations', 'classifications'])->get();
            $response = $productos;

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Obtener Producto especifica por id
     * @param  \App\Product  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $producto = Product::where('id', $id)->orderBy('nombre', 'desc')->with(['product_type', 'reservations', 'classifications'])->get();
            $response = $producto;

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
        ////$table->increments('id');
        // $table->string('nombre', 75);
        // $table->string('descripcion', 250);
        // $table->unsignedInteger('product_type_id');
        // $table->decimal('tamano_presentacion');
        // $table->decimal('precio');
        // $table->string('imagenURL');
        // $table->decimal('puntuacion');
        // $table->timestamps();
        // #foreign keys
        // $table->foreign('product_type_id')->references('id')->on('product_types');
        try {
            $this->validate($request, [
                'nombre' => 'required|min:5',
                'descripcion' => 'required|min:5',
                'product_type_id' => 'required|numeric|min:1',
                'tamano_presentacion' => 'required',
                'precio' => 'required',
                'puntuacion' => 'required|min:0',
                'imagenURL' => 'nullable'
            ]);
            //Obtener el usuario autenticado actual
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['msg' => 'Usuario no encontrado'], 404);
            }
        } catch (\illuminate\Validation\ValidationException $e) {
            return $this->responseErrors($e->errors(), 422);
        }
        //instancia Product
        $product = new Product();
        $product->nombre = $request->input('nombre');
        $product->descripcion = $request->input('descripcion');
        $product->product_type()->associate($request->input('product_type_id'));
        $product->tamano_presentacion = $request->input('tamano_presentacion');
        $product->precio = $request->input('precio');
        $product->puntuacion = $request->input('puntuacion');
        $product->imagenURL = $request->input('imagenURL');

        if ($product->save()) {
            $product->classifications()->attach(
                $request->input('classifications') === null ?
                    [] : $request->input('classifications')
            );
            $response = 'Producto Actualizado Exitósamente';
            return response()->json($response, 200);
        } else {
            $response = ['msg' => 'Error en la Actualización de la Producto'];
            return response()->json($response, 404);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        ////$table->increments('id');
        // $table->string('nombre', 75);
        // $table->string('descripcion', 250);
        // $table->unsignedInteger('product_type_id');
        // $table->decimal('tamano_presentacion');
        // $table->decimal('precio');
        // $table->string('imagenURL');
        // $table->decimal('puntuacion');
        // $table->timestamps();
        // #foreign keys
        // $table->foreign('product_type_id')->references('id')->on('product_types');
        try {
            $this->validate($request, [
                'nombre' => 'required|min:5',
                'descripcion' => 'required|min:5',
                'product_type_id' => 'required|numeric|min:1',
                'tamano_presentacion' => 'required',
                'precio' => 'required',
                'puntuacion' => 'required|min:0',
                'imagenURL' => 'nullable'
            ]);
            //Obtener el usuario autenticado actual
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['msg' => 'Usuario no encontrado'], 404);
            }
        } catch (\illuminate\Validation\ValidationException $e) {
            return $this->responseErrors($e->errors(), 422);
        }
        //Buscar Product
        $product = Product::find($id);
        $product->nombre = $request->input('nombre');
        $product->descripcion = $request->input('descripcion');
        $product->product_type()->associate($request->input('product_type_id'));
        $product->tamano_presentacion = $request->input('tamano_presentacion');
        $product->precio = $request->input('precio');
        $product->puntuacion = $request->input('puntuacion');
        $product->imagenURL = $request->input('imagenURL');

        if ($product->update()) {
            $product->classifications()->sync(
                $request->input('classifications') === null ?
                    [] : $request->input('classifications')
            );
            $response = 'Producto Actualizado Exitósamente';
            return response()->json($response, 200);
        } else {
            $response = ['msg' => 'Error en la Actualización de la Producto'];
            return response()->json($response, 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    //Método para dar formato a los errores de validación
    public function responseErrors($errors, $statusHTML)
    {
        $transformed = [];

        foreach ($errors as $field => $message) {
            $transformed[] = [
                'field' => $field,
                'message' => $message[0]
            ];
        }

        return response()->json([
            'errors' => $transformed
        ], $statusHTML);
    }
}
