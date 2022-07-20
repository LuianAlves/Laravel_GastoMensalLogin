@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card mb-4">
            
            <form action="{{route('categoria-gastos.update', $categoriaGasto->id)}}" method="post">
                @csrf
                @method('PATCH')

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <label for="categoria" class="form-label">Categoria de Gastos</label>
                            <input type="text" class="form-control form-control" name="categoria_de_gastos" id="categoria" value={{$categoriaGasto->categoria_de_gastos}} placeholder="Fatura">
                            @error('categoria_de_gastos')
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