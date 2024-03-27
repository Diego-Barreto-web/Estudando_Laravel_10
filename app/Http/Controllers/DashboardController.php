<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $totalDeProdutosCadastrados = $this->buscaTotalProdutoCadastrado();
        $totalDeClientesCadastrados = $this->buscaTotalClienteCadastrado();
        $totalDeVendasCadastradas = $this->buscaTotalVendasCadastrado();
        return view('pages.dashboard.dashboard', compact('totalDeProdutosCadastrados', 'totalDeClientesCadastrados', 'totalDeVendasCadastradas'));
    }

    public function buscaTotalProdutoCadastrado() {
        $findProduto = Produto::all()->count();

        return $findProduto;
    }
    public function buscaTotalClienteCadastrado() {
        $findCliente = Cliente::all()->count();

        return $findCliente;
    }
    public function buscaTotalVendasCadastrado() {
        $findVenda = Venda::all()->count();

        return $findVenda;
    }

}
