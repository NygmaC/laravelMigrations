<?php

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
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categorias', function() {
	$categorias = DB::table('categorias')->get();
	foreach ($categorias as $cat) {
		echo "Id: " . $cat->id . "<br>";
		echo "Nome: " . $cat->nome. "<br>"; 
	}

	echo "<hr";

	$nomescategorias = DB::table('categorias')->pluck('nome');
	foreach ($nomescategorias as $cat) {
		echo "Nome: " . $cat; 
	}
});

Route::get('/categoriaswhere', function() {
	$categoria = DB::table('categorias')->where('id', 1)->first();
	echo "Nome: " . $categoria->nome;
});

Route::get('/categoriaswherecomlike', function() {
	$categoria = DB::table('categorias')->where('nome', 'like', '%m%')->get();
	foreach ($categoria as $categoria) {
		echo "Nome: " . $categoria->nome;
	}
});

Route::get('/categoriaswheres', function() {
	$categoria = DB::table('categorias')->where('id', 1)->orWhere('id', 2)->get();
	foreach ($categoria as $categoria) {
		echo "Nome: " . $categoria->nome;
	}
});

Route::get('/categoriaswherebetween', function() {
	$categoria = DB::table('categorias')->whereBetween('id', [1,3])->get();
	foreach ($categoria as $categoria) {
		echo "Nome: " . $categoria->nome;
	}
});

Route::get('/categoriaswheresentencaslogicas', function() {
	$categoria = DB::table('categorias')->where(['id',1],
	['nome','perfume'])
	->get();
	foreach ($categoria as $categoria) {
		echo "Nome: " . $categoria->nome;
	}
});

Route::get('/categoriasorderby', function() {
	$categoria = DB::table('categorias')->orderBy('nome', 'desc')
	->get();
	foreach ($categoria as $categoria) {
		echo "Nome: " . $categoria->nome . "<br>";
	}
});

//Insert 
Route::get('/insertcategorias', function() {
	DB::table('categorias')->insert(['nome' => 'alimentos']);
	//Retorna o id que inseriu
	$id = DB::table('categorias')->insertGetId(['nome' => 'veiculos']);
});

//Update
Route::get('/atualizarcategorias', function() {
	DB::table('categorias')->where('id', 1)->update(['nome' => 'bgfsdgfdgf']);
});

//Delete
Route::get('/deletarcategorias', function() {
	DB::table('categorias')->where('id', 4)->delete();
	$categorias = DB::table('categorias')->get();
	foreach ($categorias as $cat) {
		echo "Id: " . $cat->id . "<br>";
		echo "Nome: " . $cat->nome. "<br>"; 
	}
});



