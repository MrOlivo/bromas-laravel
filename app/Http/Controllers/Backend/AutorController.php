<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Autor;
use App\Http\Requests\AutorRequest;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autores = Autor::simplePaginate(15);
        return view('autores.index', compact('autores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('autores.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Requests\AutorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AutorRequest $request)
    {
        Autor::create($request->all());
        return back()->with('status', 'Creado con exito.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function edit(Autor $autor)
    {
        return view('autores.form', compact('autor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\AutorRequest  $request
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function update(AutorRequest $request, Autor $autor)
    {
        $autor->update($request->all());
        return back()->with('status', 'Actualizado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Autor $autor)
    {
        $autor->delete();
        return back()->with('status', 'Eliminado con exito.');
    }
}
