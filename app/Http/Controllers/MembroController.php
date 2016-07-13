<?php namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Membro;
use Input, Redirect;

use Illuminate\Http\Request;



class MembroController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

	public function __construct(){
		$this->middleware('auth');
	}

	public function index()
	{
		$membros = Membro::orderBy('nome')->get();
		//$membros = Membro::all();
		$page_title = "Cadastro";
		$nivel_um 	= "Listagem";
		$nivel_dois	= "Membros";
		//dd($membros);
		//dd(Membro::find(2)->grupoCaseiro);

		return view('membro.index',compact('membros','page_title','nivel_um', 'nivel_dois'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$page_title = "Cadastro";
		$nivel_um 	= $page_title;
		$nivel_dois	= "Inclusão";
		$gruposCaseiros = \DB::table('grupos_caseiros')->lists('nome', 'id');
		return view('membro.create', compact('page_title', 'nivel_um', 'nivel_dois','gruposCaseiros'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$membro = Membro::create(Input::all());
		return Redirect::route('membro.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  Membro  $membro //alteraçao realizada na RouteServiceProvider - Ueslei
	 * @return Response
	 */
	public function edit(Membro $membro)
	{
		//$membro = Membro::find($id);
		$page_title = "Cadastro - " . $membro->nome;
		$nivel_um 	= "Cadastro";
		$nivel_dois	= "Edição";
		$gruposCaseiros = \DB::table('grupos_caseiros')->lists('nome', 'id');
		return view('membro.edit',compact('membro','page_title','nivel_um','nivel_dois','gruposCaseiros'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  Membro  $membro
	 * @return Response
	 */
	public function update(Membro $membro)
	{
		//$membro = Membro::findorfail($id);

		$membro->nome = Input::get('nome');
		$membro->email = Input::get('email');
		$membro->sexo = Input::get('sexo');
		$membro->id_grupo_caseiro = Input::get('id_grupo_caseiro');
		$membro->save();

		return Redirect::route('membro.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  Membro  $membro
	 * @return Response
	 */
	public function destroy(Membro $membro)
	{
		//
		//$membro = Membro::find($id);
		$membro->delete();

		return Redirect::route('membro.index')->with('mensagem','Membro excluído');
	}

}
