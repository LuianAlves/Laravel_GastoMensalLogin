@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">

            <form action="{{route('gastos.update', $gasto->id)}}" method="post">
                @csrf
                @method('PATCH')

                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="usuario_id" class="form-label">Usuário</label>
                                <select id="usuario_id" name="usuario_id" class="form-select">
                                    @foreach ($usuarios as $usuario)
                                        <option value="{{$usuario->id}}" id="usuario_{{$usuario->id}}" {{$usuario->id == $gasto->usuario_id ? 'selected' : '' }}>{{$usuario->nome_usuario}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="mb-3">
                                <label for="categoria_de_gastos_id" class="form-label">Categoria de Gasto</label>
                                <select id="categoria_de_gastos_id" name="categoria_de_gastos_id" class="form-select">
                                    @foreach ($categoriaGastos as $categoria)
                                        <option value="{{$categoria->id}}" id="categoria_{{$categoria->id}}" {{ $categoria->id == $gasto->categoria_de_gastos_id ? 'selected' : '' }}>{{$categoria->categoria_de_gastos}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="valor" class="form-label">Valor Gastado</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">R$</span>
                                <input type="text" class="form-control" name="valor_do_gasto" id="valor" value={{$gasto->valor_do_gasto}}
                                    placeholder="21,90">

                                @error('valor_do_gasto')
                                <small class="text-danger fw-bold">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="data" class="form-label">Data do Gasto</label>
                            <div class="input-group input-group-merge">
                                <input type="date" class="form-control" name="data_do_gasto" id="data" value={{$gasto->data_do_gasto}}>

                                @error('data_do_gasto')
                                <small class="text-danger fw-bold">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="descricao" class="form-label d-block">Forma de Pagamento</label>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="forma_de_pagamento" id="dinheiro" {{ $gasto->forma_de_pagamento == 1 ? 'checked' : '' }}
                                    value="1">
                                <label class="form-check-label" for="dinheiro">Dinheiro</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="forma_de_pagamento" id="credito" {{ $gasto->forma_de_pagamento == 2 ? 'checked' : '' }}
                                    value="2">
                                <label class="form-check-label" for="credito">Crédito</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="forma_de_pagamento" id="debito_pix" {{ $gasto->forma_de_pagamento == 3 ? 'checked' : '' }}
                                    value="3">
                                <label class="form-check-label" for="debito_pix">Débito/Pix</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label for="descricao" class="form-label">Descrição do Gasto</label>
                            <textarea class="form-control" name="descricao_gasto" id="descricao" rows="6"
                                placeholder="Pagamento do boleto da Faculdade">{{$gasto->descricao_gasto}}</textarea>
                            @error('descricao_gasto')
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