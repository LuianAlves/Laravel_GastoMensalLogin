@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">Editar Usuario</div>
                <form action="{{route('usuario.update', $usuario->id)}}" method="post">
                    @csrf
                    @method('PATCH')

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <label for="novo_usuario" class="form-label">Nome Usuário</label>
                                <input type="text" class="form-control form-control" name="nome_usuario" id="novo_usuario" value="{{$usuario->nome_usuario}}" placeholder="John Doe" autofocus>
                                @error('nome_usuario')
                                    <small class="text-danger fw-bold">{{$message}}</small>   
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="card-footer d-flex justify-content-end">
                        <button class="btn btn-md btn-primary fw-bold align-right">Atualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection