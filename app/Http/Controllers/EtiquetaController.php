<?php

namespace App\Http\Controllers;

use App\Http\Requests\EtiquetaRequest;
use App\Models\Etiqueta;
use Illuminate\Http\Request;

class EtiquetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etiquetas = Etiqueta::get();
        return view('etiqueta.index', compact('etiquetas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('etiqueta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EtiquetaRequest $request)
    {
        $etiqueta = new Etiqueta( $request->all() );
        $etiqueta->save();
        return redirect()->route('etiqueta.index')->with('message_success', 'Se ha creado con éxito la categoría '.$etiqueta->nombre);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etiqueta  $etiqueta
     * @return \Illuminate\Http\Response
     */
    // public function show( Etiqueta $etiqueta )
    public function show( $id )
    {
    //     dd( $etiqueta );//
        $etiqueta = Etiqueta::find( $id );
        return view('etiqueta.show', compact('etiqueta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etiqueta  $etiqueta
     * @return \Illuminate\Http\Response
     */
    // public function edit(Etiqueta $etiqueta)
    public function edit( $id )
    {
        // dd( $etiqueta );//
        $etiqueta = Etiqueta::find( $id );
        return view('etiqueta.edit', compact('etiqueta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Etiqueta  $etiqueta
     * @return \Illuminate\Http\Response
     */
    // public function update(EtiquetaRequest $request, Etiqueta $etiqueta)
    public function update(EtiquetaRequest $request, $id)
    {
        // $etiqueta->fill( $request->all() );
        $etiqueta = Etiqueta::find( $id );
        $etiqueta->fill( $request->all() );
        $etiqueta->save();
        return redirect()->route('etiqueta.index')->with('message_success', 'Actualizado con exito '.$etiqueta->nombre);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etiqueta  $etiqueta
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Etiqueta $etiqueta)
    public function destroy( $id )
    {
        $etiqueta = Etiqueta::find( $id );
        $etiqueta->delete();
        return redirect()->back()->with('message_success', 'Eliminado con exito '.$etiqueta->nombre);
    }
}
