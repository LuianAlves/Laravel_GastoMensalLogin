@extends('layouts.layout')

@section('content')

<!-- Cards Diário/Mensal/Anual -->
<div class="row mb-4">
  <!-- Diário -->
  <div class="col-4">
    <div class="card">
      <div class="card-body">
        <div class="card-title d-flex align-items-start justify-content-between">
          
          <!-- Imagem/Icon -->              
          <div class="avatar flex-shrink-0">
            <img src="../assets/img/icons/unicons/cc-success.png" alt="chart success" class="rounded" />
          </div>
        </div>

        <!-- Descrição -->            
        <span class="fw-semibold d-block mb-1">Gasto Diário</span>
        <h3 class="card-title mb-2">R$ {{str_replace('.', ',', $gastoHoje)}}</h3>
        <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>
      </div>
    </div>
  </div>

  <!-- Mensal -->
  <div class="col-4">
    <div class="card">
      <div class="card-body">
        
        <div class="card-title d-flex align-items-start justify-content-between">
          <!-- Imagem/Icon -->
          <div class="avatar flex-shrink-0">
            <img src="../assets/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded" />
          </div>
        </div>
        
        <!-- Descrição -->
        <span class="fw-semibold d-block mb-1">Gasto Mensal</span>
        <h3 class="card-title mb-2">R$ {{str_replace('.', ',', $gastoMes)}}</h3>
        <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>
      </div>
    </div>
  </div>

  <!-- Anual -->
  <div class="col-4">
    <div class="card">
      <div class="card-body">

        <div class="card-title d-flex align-items-start justify-content-between">
          <!-- Imagem/Icon -->
          <div class="avatar flex-shrink-0">
            <img src="../assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
          </div>
        </div>
        
        <!-- Descrição -->            
        <span class="d-block mb-1">Gasto Anual</span>
        <h3 class="card-title text-nowrap mb-2">R$ {{str_replace('.', ',', $gastoAno)}}</h3>
        <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i> -14.82%</small>
      </div>
    </div>
  </div>
</div>

<!-- Relatório de Gastos -->
<div class="row">
  <div class="col-12 mb-4">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title m-0 me-2">Transações Recentes</h5>
      </div>
      <div class="card-body">

        <div class="table-responsive text-nowrap">
          <table class="table table-borderless">

            @foreach ($gastos as $gasto)
              <tbody>
                <tr>
                  <td class="text-left col-2"><strong>{{$gasto->usuario->nome_usuario}}</strong></td>
                  <td class="col-4">
                    <small class="text-muted">{{$gasto->descricao_gasto}}</small>
                  </td>
                  <td class="col-2">
                    <span class="text-muted">{{Carbon\Carbon::parse($gasto->data_do_gasto)->format('d m Y')}}</span>
                  </td>
                  <td class="col-2">
                    @if($gasto->forma_de_pagamento == 1)
                      <span class="badge bg-label-primary me-1">Dinheiro</span>
                    @elseif($gasto->forma_de_pagamento == 2)
                      <span class="badge bg-label-danger me-1">Crédito</span>
                    @else
                      <span class="badge bg-label-info me-1">Débito</span>
                    @endif
                  </td>
                  <td class="align-right fw-bold">
                    <span class="text-success">R$</span>
                    <span class="mb-0">{{str_replace('.', ',', $gasto->valor_do_gasto)}}</span>
                  </td>
                </tr>
              </tbody>
            @endforeach

          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Cards Crédito/Dinheiro/Pix -->
<div class="row mb-4">
  <!-- Dinheiro -->
  <div class="col-4">
    <div class="card">
      <div class="card-body">
        <div class="card-title d-flex align-items-start justify-content-between">
          
          <!-- Imagem/Icon -->              
          <div class="avatar flex-shrink-0">
            <img src="../assets/img/icons/unicons/cc-success.png" alt="chart success" class="rounded" />
          </div>
          
        </div>

        <!-- Descrição -->            
        <span class="fw-semibold d-block mb-1">Gasto em Dinheiro</span>
        <h3 class="card-title mb-2">R$ {{str_replace('.', ',', $gastoDinheiro)}}</h3>
        <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>
      </div>
    </div>
  </div>

  <!-- Débito/Pix -->
  <div class="col-4">
    <div class="card">
      <div class="card-body">
        
        <div class="card-title d-flex align-items-start justify-content-between">
          <!-- Imagem/Icon -->
          <div class="avatar flex-shrink-0">
            <img src="../assets/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded" />
          </div>
        </div>
        
        <!-- Descrição -->
        <span class="fw-semibold d-block mb-1">Gasto no Débito/Pix</span>
        <h3 class="card-title mb-2">R$ {{str_replace('.', ',', $gastoDebito)}}</h3>
        <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>
      </div>
    </div>
  </div>

  <!-- Crédito -->
  <div class="col-4">
    <div class="card">
      <div class="card-body">

        <div class="card-title d-flex align-items-start justify-content-between">
          <!-- Imagem/Icon -->
          <div class="avatar flex-shrink-0">
            <img src="../assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
          </div>

        </div>
        
        <!-- Descrição -->            
        <span class="d-block mb-1">Gasto no Crédito</span>
        <h3 class="card-title text-nowrap mb-2">R$ {{str_replace('.', ',', $gastoCredito)}}</h3>
        <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i> -14.82%</small>
      </div>
    </div>
  </div>
</div>

<!-- Relatório de Entradas -->
<div class="row">
  <div class="col-12 mb-4">
    <div class="card h-100">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="card-title m-0 me-2">Entradas Recentes</h5>
      </div>
      <div class="card-body">

        <div class="table-responsive text-nowrap">
          <table class="table table-borderless">

            @foreach ($entradas as $entrada)
              <tbody>
                <tr>
                  <td class="text-left col-6"><strong>{{$entrada->descricao_entrada}}</strong></td>
                  <td class="col-2">
                    <span class="text-muted">{{Carbon\Carbon::parse($entrada->data_da_entrada)->format('d m Y')}}</span>
                  </td>
                  <td class="col-2">
                    @if($entrada->forma_da_entrada == 1)
                      <span class="badge bg-label-primary me-1">Dinheiro</span>
                    @else
                      <span class="badge bg-label-info me-1">Transferência</span>
                    @endif
                  </td>
                  <td class="align-right fw-bold col-2">
                    <span class="text-success">R$</span>
                    <span class="mb-0">{{str_replace('.', ',', $entrada->valor_da_entrada)}}</span>
                  </td>
                </tr>
              </tbody>
            @endforeach

          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Cards Entrada -->
<div class="row mb-4">
  <!-- Entrada -->
  <div class="col-4">
    <div class="card">
      <div class="card-body">

        <div class="card-title d-flex align-items-start justify-content-between">
          <!-- Imagem/Icon -->              
          <div class="avatar flex-shrink-0">
            <img src="../assets/img/icons/unicons/cc-success.png" alt="chart success" class="rounded" />
          </div>
        </div>

        <!-- Descrição -->            
        <span class="fw-semibold d-block mb-1">Entrada Mensal</span>
        <h3 class="card-title mb-2">R$ {{str_replace('.', ',', $entradaMes)}}</h3>
        <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>
      </div>
    </div>
  </div>

  <!-- Renda Mensal -->
  <div class="col-4">
    <div class="card">
      <div class="card-body">

        <div class="card-title d-flex align-items-start justify-content-between">
          <!-- Imagem/Icon -->              
          <div class="avatar flex-shrink-0">
            <img src="../assets/img/icons/unicons/cc-success.png" alt="chart success" class="rounded" />
          </div>
        </div>
        
        <!-- Descrição -->            
        <span class="d-block mb-1">Renda no Mês</span>
        <h3 class="card-title text-nowrap mb-2">
          @if($rendaMensal >= 0)
            <span class="text-success">R$ {{str_replace('.', ',', $rendaMensal)}}</span>
          @else
            <span class="text-danger">R$ {{str_replace('.', ',', $rendaMensal)}}</span>
          @endif
        </h3>
        <small class="text-success fw-semibold"><i class="bx bx-down-arrow-alt"></i> -14.82%</small>
      </div>
    </div>
  </div>

  <!-- Entrada Anual -->
  <div class="col-4">
    <div class="card">
      <div class="card-body">

        <div class="card-title d-flex align-items-start justify-content-between">
          <!-- Imagem/Icon -->
          <div class="avatar flex-shrink-0">
            <img src="../assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
          </div>
        </div>
        
        <!-- Descrição -->            
        <span class="d-block mb-1">Entrada Anual</span>
        <h3 class="card-title text-nowrap mb-2">R$ {{str_replace('.', ',', $entradaAno)}}</h3>
        <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i> -14.82%</small>
      </div>
    </div>
  </div>
</div>

@endsection