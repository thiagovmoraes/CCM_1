<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; /*Para habilitar o delete l�gico*/

class Membro extends Model {

	//
    //protected $fillable = array('nome', 'sexo', 'email', '' ); alternativo
    protected  $fillable = [
        'nome',
        'sexo',
        'email',
        'id_grupo_caseiro',
        'dtNascimento',
        'enderecoPessoal',
        'cidadeEndPessoal',
        'ufEndPessoal',
        'cepEndPessoal',
        'nrEndPessoal',
        'complEndPessoal',
        'fonePessoal',
        'celPessoal',
        'dataEngresso'
    ];
    //protected $guarded = array('deleted_at');
    // habilitar o delete lógico
    use SoftDeletes;
    protected $dates = ['deleted_at'];


    public function aniversariantes ($squery,$data){

        $squery->where(DB::raw('MONTH(dtAniversario)'),'=', Carbon::now()->startOfMonth());
    }

    /**
     * Um membro possui muitos grupos caseiros
     * (no caso de quererem histórico de grupos que o membro passou)
     * @return mixed
     */
    public function grupoCaseiro ()
    {
        //return $this->belongsTo('App\gruposCaseiros');
          return $this->hasOne('App\gruposCaseiros',"id","id_grupo_caseiro");

    }
}
