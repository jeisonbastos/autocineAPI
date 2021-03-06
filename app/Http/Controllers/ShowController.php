<?php

namespace App\Http\Controllers;

use App\Show;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class ShowController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['only' => '']);
    }
    /**
     * Listado de Funciones habilitadas
     * @jeisonbastos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $funciones = Show::where('visible_cartelera', true)->orderBy('location_id', 'desc')->orderBy('movie_id', 'desc')->with(['movie', 'tickets', 'location'])->get();
            $response = $funciones;

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Listado de Funciones habilitadas
     * @jeisonbastos
     *
     * @return \Illuminate\Http\Response
     */
    public function sell()
    {
        try {
            $funciones = Show::where('disponible_venta', true)->orderBy('location_id', 'desc')->orderBy('movie_id', 'desc')->withCount(['movie', 'tickets', 'location'])->get();
            $response = $funciones;

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     *  Listado de todas las Funciones
     *
     */
    public function all()
    {
        try {
            $funciones = Show::orderBy('location_id', 'desc')->orderBy('movie_id', 'desc')->with(['movie', 'tickets', 'location'])->get();
            $response = $funciones;

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Obtener Funciones especifica por id
     * @param  \App\Show  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $funcion = Show::where('id', $id)->orderBy('location_id', 'desc')->orderBy('movie_id', 'desc')->with(['movie', 'tickets', 'location'])->get();
            $response = $funcion;

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Obtener Funciones especifica por location_id
     * @param  \App\Show  $location_id
     * @return \Illuminate\Http\Response
     */
    public function show_for_location($location_id)
    {
        try {
            $funcion = Show::where('location_id', $location_id)->orderBy('location_id', 'desc')->orderBy('movie_id', 'desc')->with(['movie', 'tickets', 'location'])->get();
            $response = [$funcion];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            return response()->json($e->getMessage(), 422);
        }
    }

    /**
     * Obtener Funciones especifica por show_id
     * @param  \App\Show  $show_id
     * @return \Illuminate\Http\Response
     */
    public function show_for_movie($movie_id)
    {
        try {
            $funcion = Show::where('movie_id', $movie_id)->orderBy('location_id', 'desc')->orderBy('movie_id', 'desc')->with(['movie', 'tickets', 'location'])->get();
            $response = [$funcion];

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
        // $table->date('fecha');
        // $table->time('hora');
        // $table->unsignedInteger('show_id');
        // $table->unsignedInteger('location_id');
        // $table->boolean('visible_cartelera', false);
        // $table->boolean('disponible_venta', false);
        // $table->unsignedInteger('cantidad_espacios');
        // $table->timestamps();
        // #foreign keys
        // $table->foreign('show_id')->references('id')->on('shows');
        // $table->foreign('location_id')->references('id')->on('locations');
        try {
            $this->validate(
                $request,
                [
                    'fecha' => ['required', 'unique:shows,fecha,,id,hora,' . $request->input('hora') . ',location_id,' . $request->input('location_id')],
                    'hora' => ['required', 'unique:shows,hora,,id,fecha,' . $request->input('fecha') . ',location_id,' . $request->input('location_id')],
                    'location_id' => 'required|numeric|min:1',
                    'movie_id' => 'required|numeric|min:1',
                    'visible_cartelera' => 'required',
                    'disponible_venta' => 'required',
                    'cantidad_espacios' => 'required|numeric|min:1',
                ],
                [
                    'fecha.unique' => 'Ya existe una funcion en la fecha seleccionada, con la misma hora y ubicación',
                    'hora.unique' => 'Ya existe una funcion en la hora seleccionada, con misma la fecha y ubicación',
                    'location_id' => 'Debe seleccionar una Ubicación',
                    'movie_id' => 'Debe seleccionar una Película',
                    'visible_cartelera' => 'Visible en cartelera es requerido y no debes ser nulo',
                    'disponible_venta' => 'Visible en cartelera es requerido y no debes ser nulo',
                    'cantidad_espacios' => 'La cantidad de espacios es requerida y debe ser mayor que cero',
                ]
            );
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
        $show = new Show();
        $show->fecha = $request->input('fecha');
        $show->hora = $request->input('hora');
        $show->location()->associate($request->input('location_id'));
        $show->movie()->associate($request->input('movie_id'));
        $show->visible_cartelera = $request->input('visible_cartelera');
        $show->disponible_venta = $request->input('disponible_venta');
        $show->cantidad_espacios = $request->input('cantidad_espacios');

        if ($show->save()) {
            $response = 'Función Creada Exitósamente';
            return response()->json($response, 201);
        } else {
            $response = ['msg' => 'Error en la creación de la Función'];
            return response()->json($response, 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function edit(Show $show)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $table->increments('id');
        // $table->date('fecha');
        // $table->time('hora');
        // $table->unsignedInteger('show_id');
        // $table->unsignedInteger('location_id');
        // $table->boolean('visible_cartelera', false);
        // $table->boolean('disponible_venta', false);
        // $table->unsignedInteger('cantidad_espacios');
        // $table->timestamps();
        // #foreign keys
        // $table->foreign('show_id')->references('id')->on('shows');
        // $table->foreign('location_id')->references('id')->on('locations');
        try {
            $this->validate(
                $request,
                [
                    'fecha' => ['required', 'unique:shows,fecha,' . $id . ',id,hora,' . $request->input('hora') . ',location_id,' . $request->input('location_id')],
                    'hora' => ['required', 'unique:shows,hora,' . $id . ',id,fecha,' . $request->input('fecha') . ',location_id,' . $request->input('location_id')],
                    'location_id' => 'required|numeric|min:1',
                    'movie_id' => 'required|numeric|min:1',
                    'visible_cartelera' => 'required',
                    'disponible_venta' => 'required',
                    'cantidad_espacios' => 'required',
                ],
                [
                    'fecha.unique' => 'Ya existe una funcion en la fecha seleccionada, con la misma hora y ubicación',
                    'hora.unique' => 'Ya existe una funcion en la hora seleccionada, con misma la fecha y ubicación',
                ]
            );
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
        //Buscar Show
        $show = Show::find($id);
        $show->fecha = $request->input('fecha');
        $show->hora = $request->input('hora');
        $show->location()->associate($request->input('location_id'));
        $show->movie()->associate($request->input('movie_id'));
        $show->visible_cartelera = $request->input('visible_cartelera');
        $show->disponible_venta = $request->input('disponible_venta');
        $show->cantidad_espacios = $request->input('cantidad_espacios');

        if ($show->update()) {
            $response = 'Función Actualizada Exitósamente';
            return response()->json($response, 201);
        } else {
            $response = ['msg' => 'Error en la actualización de la Función'];
            return response()->json($response, 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Show  $show
     * @return \Illuminate\Http\Response
     */
    public function destroy(Show $show)
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
