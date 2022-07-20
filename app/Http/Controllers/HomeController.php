<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Gasto;
use App\Models\Entrada;

class HomeController extends Controller
{
    public function Home() {
        $dataAtual = date('d-m-y');
        $dia = date('d');
        $mes = date('m');
        $ano = date('Y');
        
        // Gastos
        $gastoHoje = Gasto::where('dia_do_gasto', $dia)->sum('valor_do_gasto');
        $gastoMes = Gasto::where('mes_do_gasto', $mes)->sum('valor_do_gasto');
        $gastoAno = Gasto::where('ano_do_gasto', $ano)->sum('valor_do_gasto');

        $gastoDinheiro = Gasto::where('forma_de_pagamento', 1)->sum('valor_do_gasto');
        $gastoCredito = Gasto::where('forma_de_pagamento', 2)->sum('valor_do_gasto');
        $gastoDebito = Gasto::where('forma_de_pagamento', 3)->sum('valor_do_gasto');

        $gastos = Gasto::orderBy('data_do_gasto', 'DESC')->limit(5)->get();

        // Entradas
        $entradaMes = Entrada::where('mes_da_entrada', $mes)->sum('valor_da_entrada');
        $entradaAno = Entrada::where('ano_da_entrada', $ano)->sum('valor_da_entrada');
        $entradas = Entrada::orderBy('data_da_entrada', 'DESC')->limit(5)->get();

        // Cálculo Renda Mensal
        $rendaMensal = $entradaMes - $gastoMes;

        return view('app.dashboard', compact(
            'gastoHoje', 'gastoMes', 'gastoAno', 
            'gastoDinheiro', 'gastoCredito', 'gastoDebito', 
            'gastos', 'entradas', 'rendaMensal',
            'entradaMes', 'entradaAno'
        ));
    }
}
