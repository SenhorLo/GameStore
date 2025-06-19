<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\JogoController;
use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\FiguraController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\PedidosController;

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::get('/produtos', function () {
    return view('produtos.index');
})->middleware('auth');


Route::middleware(['auth'])->group(function () {

    // Produtos Routes
    Route::get('/produtos', [ProdutosController::class, 'index'])->name('produtos.index');
    Route::get('/produtos/novo', [ProdutosController::class, 'create'])->name('produtos.create');
    Route::post('/produtos', [ProdutosController::class, 'store'])->name('produtos.store');
    
    // Jogos Routes
    Route::get('/produtos/novo-jogo', [JogoController::class, 'view'])->name('jogos.create');
    Route::post('/produtos/novo-jogo', [JogoController::class, 'store'])->name('jogos.store');
    Route::resource('jogos', JogoController::class)->except(['show', 'index']);
    
    // Consoles Routes
    Route::get('/produtos/novo-console', [ConsoleController::class, 'view'])->name('consoles.create');
    Route::post('/produtos/novo-console', [ConsoleController::class, 'store'])->name('consoles.store');
    Route::resource('consoles', ConsoleController::class)->except(['show', 'index']);
    
    // Figuras Routes
    Route::get('/produtos/novo-figura', [FiguraController::class, 'view'])->name('figuras.create');
    Route::post('/produtos/novo-figura', [FiguraController::class, 'store'])->name('figuras.store');
    Route::resource('figura', FiguraController::class)->except(['show', 'index']);
    
    // Usuarios routes
    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
    
    // Vendedores routes
    Route::get('/vendedores', [VendedorController::class, 'index'])->name('vendedores.index');
    
    //Pedidos routes
    Route::get('/pedidos', [PedidosController::class, 'index'])->name('pedidos.index');
    Route::get('/pedidos/novo-pedido', [PedidosController::class, 'create'])->name('pedidos.create');
    Route::post('/pedidos', [PedidosController::class, 'store'])->name('pedidos.store');
    
    Auth::routes();

});