@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            
            <form action="{{route('usuario.store')}}" method="post">
                @csrf

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <label for="novo_usuario" class="form-label">Nome Usuário</label>
                            <input type="text" class="form-control form-control" name="nome_usuario" id="novo_usuario" placeholder="John Doe">
                            @error('nome_usuario')
                                <small class="text-danger fw-bold">{{$message}}</small>   
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-end">
                    <button class="btn btn-md btn-primary fw-bold align-right">Adicionar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table responsive-table">
                    <thead>
                        <tr>
                            <th>Nome Usuário</th>
                            <th>Data de Criação</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{$usuario->nome_usuario}}</td>
                                <td>{{Carbon\Carbon::parse($usuario->created_at)->format('d/m/Y')}}</td>
                                <td>
                                    <form id="removeForm_{{$usuario->id}}" action="{{route('usuario.destroy', $usuario->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')

                                        <a class="text-danger" type="button" onclick="getElementById('removeForm_{{$usuario->id}}').submit()">
                                            Excluir
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection