<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Usuario;
use App\Models\Gasto;
use App\Models\CategoriaGasto;

use Carbon\Carbon;
use Auth;

class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Index() {
        $gastos = Gasto::orderBy('data_do_gasto', 'DESC')->get();
        $usuarios = Usuario::orderBy('nome_usuario', 'ASC')->get();
        $categoriaGastos = CategoriaGasto::orderBy('categoria_de_gastos', 'ASC')->get();

        return view('app.gastos.gasto.index', compact('gastos', 'usuarios', 'categoriaGastos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required',
            'categoria_de_gastos_id' => 'required',
            'descricao_gasto' => 'required',
            'forma_de_pagamento' => 'required',
            'valor_do_gasto' => 'required',
            'data_do_gasto' => 'required',
        ]);

        $valor = str_replace(',', '.', $request->valor_do_gasto);

        Gasto::insert([
            'user_id' => Auth::user()->id,
            'usuario_id' => $request->usuario_id,
            'categoria_de_gastos_id' => $request->categoria_de_gastos_id,
            'descricao_gasto' => $request->descricao_gasto,
            'forma_de_pagamento' => $request->forma_de_pagamento,
            'valor_do_gasto' => $valor,
            'data_do_gasto' => $request->data_do_gasto,
            'dia_do_gasto' => Carbon::parse($request->data_do_gasto)->format('d'),
            'mes_do_gasto' => Carbon::parse($request->data_do_gasto)->format('m'),
            'ano_do_gasto' => Carbon::parse($request->data_do_gasto)->format('Y'),
            'created_at' => Carbon::now()
        ]); 

        $noti = [
            'message' => 'Gasto inserido com sucesso!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($noti);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function edit(Gasto $gasto)
    {
        $usuarios = Usuario::get();
        $categoriaGastos = CategoriaGasto::get();

        return view('app.gastos.gasto.edit', compact('gasto', 'usuarios', 'categoriaGastos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Illuminate\Http\Request  $request
     * @param  \App\Models\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gasto $gasto)
    {
        $request->validate([
            'usuario_id' => 'required',
            'categoria_de_gastos_id' => 'required',
            'descricao_gasto' => 'required',
            'forma_de_pagamento' => 'required',
            'valor_do_gasto' => 'required',
            'data_do_gasto' => 'required',
        ]);

        $valor = str_replace(',', '.', $request->valor_do_gasto);

        Gasto::findOrFail($gasto->id)->update([
            'user_id' => Auth::user()->id,
            'usuario_id' => $request->usuario_id,
            'categoria_de_gastos_id' => $request->categoria_de_gastos_id,
            'descricao_gasto' => $request->descricao_gasto,
            'forma_de_pagamento' => $request->forma_de_pagamento,
            'valor_do_gasto' => $valor,
            'data_do_gasto' => $request->data_do_gasto,
            'updated_at' => Carbon::now()
        ]); 

        $noti = [
            'message' => 'Gasto atualizado com sucesso!',
            'alert-type' => 'success'
        ];

        return redirect()->route('gastos.index')->with($noti);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gasto $gasto)
    {
        $gasto->delete();

        $noti = [
            'message' => 'Gasto removido com sucesso!',
            'alert-type' => 'error'
        ];

        return redirect()->back()->with($noti);
    }
}
