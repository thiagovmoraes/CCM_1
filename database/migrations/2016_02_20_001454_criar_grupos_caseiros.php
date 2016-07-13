<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarGruposCaseiros extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('grupos_caseiros', function(Blueprint $table)
		{
			//todo Pode ser incrementado com nomes Facilitador e Auxiliar
			$table->increments('id');
			$table->string('nome');
			$table->timestamps();
			$table->softDeletes(); //habilita o delete lógico
		});

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('grupos_caseiros', function(Blueprint $table)
		{
			$table->dropForeign('membros_id_grupo_caseiro_foreign');
			Schema::drop('grupos_caseiros');
		});

	}

}
