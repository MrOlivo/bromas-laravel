<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Broma;
use App\Http\Requests\BromaRequest;
use App\Models\Autor;
use App\Models\BromaCategoria;
use App\Models\Categoria;

class BromaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bromas = Broma::simplePaginate(15);
        return view('bromas.index', compact('bromas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $autores = Autor::get();
        $categorias = Categoria::get();
        $autores = Autor::get();

        return view('bromas.form', [
            'autores' => $autores,
            'categorias' => $categorias,
            'autores' => $autores
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BromaRequest $request)
    {
        $broma = Broma::create([
            'autor_id' => $request->Autor,
            'broma' => $request->broma,
        ]);

        foreach ($request->categorias as $categoria) {
            BromaCategoria::create([
                'broma_id' => $broma->id,
                'categoria_id' => $categoria
            ]);
        }

        return back()->with('status', 'Creado con exito.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Broma  $broma
     * @return \Illuminate\Http\Response
     */
    public function edit(Broma $broma)
    {
        $categorias = Categoria::get();
        $haystack = array();

        // Accedemos al array de categorias
        foreach ($broma->categorias as $categoria) {
            array_push($haystack, $categoria->pivot->categoria_id);
        }

        // A cada uno de los objetos categoria que coincida en 'id'
        // se le asigna la propiedad 'selected' igual a true
        foreach ($categorias as $cat) {
            if (in_array($cat->id, $haystack)) {
                $cat->selected = true;
            }
        }

        $autores = Autor::get();

        return view('bromas.form', ['broma' => $broma, 'categorias' => $categorias, 'autores' => $autores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Broma  $broma
     * @return \Illuminate\Http\Response
     */
    public function update(BromaRequest $request, Broma $broma)
    {
        BromaCategoria::where('broma_id', $broma->id)->delete();

        foreach ($request->categorias as $categoria) {
            BromaCategoria::create([
                'broma_id' => $broma->id,
                'categoria_id' => $categoria
            ]);
        }

        $broma->update([
            'autor_id' => $request->Autor,
            'broma' => $request->broma,
        ]);
        return back()->with('status', 'Actualizado con exito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Broma  $broma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Broma $broma)
    {
        BromaCategoria::where('broma_id', '=', $broma->id)->delete();
        $broma->delete();
        return back()->with('status', 'Eliminado con exito.');
    }
}
