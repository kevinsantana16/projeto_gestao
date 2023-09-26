<?php


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "principalController@principal")->name('site.index');
Route::get('/sobrenos', "sobrenosController@sobrenos")->name('site.sobrenos');

Route::get('/contato', "contatoController@contato")->name('site.contato');
Route::post('/contato', "contatoController@salvar")->name('site.contato');

Route::get('/login/{erro?}', 'loginController@index')->name('site.login');
Route::post('/login', 'loginController@autenticar')->name('site.login');

Route::middleware('autenticacao')-> prefix('/app')->group(function(){
    Route::get('/home', 'homeController@index')->name('app.home');
    Route::get('/sair', 'loginController@sair')->name('app.sair');
    
    
    Route::get('/fornecedor', 'fornecedorController@index')->name('app.fornecedor');
    Route::post('/fornecedor/listar', 'fornecedorController@listar')->name('app.fornecedor.listar'); 
    Route::get('/fornecedor/listar', 'fornecedorController@listar')->name('app.fornecedor.listar'); 
    Route::get('/fornecedor/adicionar', 'fornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', 'fornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', 'fornecedorController@editar')->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}/{msg?}', 'fornecedorController@excluir')->name('app.fornecedor.excluir');
    
    Route::resource('produto', 'produtoController');
    Route::resource('produto-detalhe', 'produtoDetalheController');
    Route::resource('cliente', 'clienteController');
    Route::resource('pedido', 'pedidoController');
    //Route::resource('pedido-produto', 'pedidoProdutoController');
    Route::get('pedido-produto/create/{pedido}', 'pedidoProdutoController@create')->name('pedido-produto.create');
    Route::post('pedido-produto/store/{pedido}', 'pedidoProdutoController@store')->name('pedido-produto.store');
    Route::delete('pedido-produto.destroy/{pedido}/{produto}', 'pedidoProdutoController@destroy')->name('pedido-produto.destroy');
});


Route::fallback(function(){
    echo 'pagina nao encontrada. <a href="'.route('site.index').'">clique aqui</a> para ser direcionado a pagina principal.';
});