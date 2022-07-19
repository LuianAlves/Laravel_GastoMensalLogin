<?php

namespace App\Http\Controllers;

use App\Models\CategoriaGasto;
use App\Http\Requests\StoreCategoriaGastoRequest;
use App\Http\Requests\UpdateCategoriaGastoRequest;

class CategoriaGastoController extends Controller
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
     * @param  \App\Http\Requests\StoreCategoriaGastoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoriaGastoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoriaGasto  $categoriaGasto
     * @return \Illuminate\Http\Response
     */
    public function show(CategoriaGasto $categoriaGasto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoriaGasto  $categoriaGasto
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoriaGasto $categoriaGasto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoriaGastoRequest  $request
     * @param  \App\Models\CategoriaGasto  $categoriaGasto
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoriaGastoRequest $request, CategoriaGasto $categoriaGasto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoriaGasto  $categoriaGasto
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoriaGasto $categoriaGasto)
    {
        //
    }
}
