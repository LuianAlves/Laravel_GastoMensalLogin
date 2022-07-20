<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Usuario;

use Carbon\Carbon;
use Auth;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = Usuario::where('user_id', Auth::user()->id)->orderBy('created_at', 'ASC')->get();
        return view('app.usuario.index', compact('usuarios'));
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
            'nome_usuario' => 'required'
        ], [
            'nome_usuario.required' => 'Insira um nome para este usuário!'
        ]);

        Usuario::insert([
            'user_id' => Auth::user()->id,
            'nome_usuario' => $request->nome_usuario,
            'created_at' => Carbon::now()
        ]);

        $noti = [
            'message' => 'Usuário adicionado com sucesso!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($noti);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        return view('app.usuario.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        $request->validate([
            'nome_usuario' => 'required'
        ]);

        Usuario::findOrFail($usuario->id)->update([
            'nome_usuario' => $request->nome_usuario,
            'updated_at' => Carbon::now()
        ]);

        $noti = [
            'message' => 'Usuário atualizado com sucesso!',
            'alert-type' => 'success'
        ];

        return redirect()->route('usuario.index')->with($noti);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();

        $noti = [
            'message' => 'Usuário removido com sucesso!',
            'alert-type' => 'error'
        ];

        return redirect()->back()->with($noti);
    }
}
