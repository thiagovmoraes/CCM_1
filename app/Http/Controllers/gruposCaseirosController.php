<?php namespace App\Http\Controllers;

use App\gruposCaseiros;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input, Redirect;

use Illuminate\Http\Request;

/**
 * Class gruposCaseirosController
 * @package App\Http\Controllers
 */
class gruposCaseirosController extends Controller {


	/**
	 * gruposCaseirosController constructor.
	 * Protege a área de ser acessada anonimamente
     */
	public function __construct(){
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$gruposcaseiros = gruposCaseiros::orderBy('nome')->get();
		$page_title = "Cadastro";
		$nivel_um 	= "Listagem";
		$nivel_dois	= "Grupos Caseiros";
		return view('gruposcaseiros.index',compact('gruposcaseiros','page_title','nivel_um', 'nivel_dois'));
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
		return view('gruposcaseiros.create', compact('page_title', 'nivel_um', 'nivel_dois'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$grupocaseiro = gruposCaseiros::create(Input::all());
		return Redirect::route('gruposCaseiros.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(gruposCaseiros $grupoCaseiro)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  gruposCaseiros  $grupoCaseiro
	 * @return Response
	 */
	public function edit(gruposCaseiros $grupoCaseiro)
	{
		//$membro = Membro::find($id);
		$page_title = "Cadastro - " . $grupoCaseiro->nome;
		$nivel_um 	= "Cadastro";
		$nivel_dois	= "Edição";
		return view('gruposcaseiros.edit',compact('grupoCaseiro','page_title','nivel_um','nivel_dois'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  gruposCaseiros  $grupoCaseiro
	 * @return Response
	 */
	public function update(gruposCaseiros $grupoCaseiro)
	{
		$grupoCaseiro->nome = Input::get('nome');
		$grupoCaseiro->save();

		return Redirect::route('gruposCaseiros.index');

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  gruposCaseiros  $grupoCaseiro
	 * @return Response
	 */
	public function destroy(gruposCaseiros $grupoCaseiro)
	{
		$grupoCaseiro->delete();

		return Redirect::route('gruposCaseiros.index')->with('mensagem','Grupo Caseiro excluído');

	}

}
