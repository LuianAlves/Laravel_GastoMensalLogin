@extends('layouts.layout')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-4">

            <form action="{{route('entradas.store')}}" method="post">
                @csrf

                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-3">
                            <label for="valor" class="form-label">Valor de Entrada</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text">R$</span>
                                <input type="text" class="form-control" name="valor_da_entrada" id="valor_da_entrada" placeholder="1800">
                                @error('valor_da_entrada')
                                    <small class="text-danger fw-bold">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-3">
                            <label for="data" class="form-label">Data da Entrada</label>
                            <div class="input-group input-group-merge">
                                <input type="date" class="form-control" name="data_da_entrada" id="data_da_entrada">

                                @error('data_da_entrada')
                                <small class="text-danger fw-bold">{{$message}}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="descricao" class="form-label d-block">Forma de Pagamento</label>
                            <div class="form-check form-check-inline mt-3">
                                <input class="form-check-input" type="radio" name="forma_de_entrada" id="dinheiro"
                                    value="1">
                                <label class="form-check-label" for="dinheiro">Dinheiro</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="forma_de_entrada" id="transferencia_pix"
                                    value="2">
                                <label class="form-check-label" for="transferencia_pix">Transferência/Pix</label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-6">
                            <label for="descricao" class="form-label">Descrição da Entrada</label>
                            <textarea class="form-control" name="descricao_entrada" id="descricao_entrada" rows="6"
                                placeholder="Salário do mês de Abril ..."></textarea>
                            @error('descricao_entrada')
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
                            <th>Valor da Entrada</th>
                            <th>Descrição</th>
                            <th>Data</th>
                            <th class="col-2 text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($entradas as $entrada)
                        <tr>
                            <td><strong class="text-success">R$</strong> <b>{{str_replace('.', ',', $entrada->valor_da_entrada)}}</b></td>
                            <td>{{$entrada->descricao_entrada}}</td>
                            <td>{{Carbon\Carbon::parse($entrada->data_da_entrada)->format('d/m/Y')}}</td>
                            <td class="d-flex justify-content-between text-center">
                                <a type="button" href="{{route('entradas.edit', $entrada->id)}}">
                                    <i class="bx bx-edit text-success fs-3"></i>
                                </a>   

                                <form id="removeForm_{{$entrada->id}}" action="{{route('entradas.destroy', $entrada->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a type="button" onclick="getElementById('removeForm_{{$entrada->id}}').submit()">
                                        <i class="bx bx-block text-danger fs-3"></i>
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