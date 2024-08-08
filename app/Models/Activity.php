<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class Activity extends Model
{
    protected $table = 'atividade';

    protected $cd_atividade = 0;

    protected $nm_atividade = '';

    protected $data_ini = '';

    protected $data_fim = '';

    protected $is_finalizada = false;

    protected $cd_projeto = 0;

    public function getCodigoAtividade()
    {
        return $this->cd_atividade;
    }

    public function setCodigoAtividade($cd_atividade)
    {
        $this->cd_atividade = $cd_atividade;
    }

    public function getNomeAtividade()
    {
        return $this->nm_atividade;
    }

    public function setNomeAtividade($nm_atividade)
    {
        $this->nm_atividade = $nm_atividade;
    }

    public function getDataIni()
    {
        return $this->data_ini;
    }

    public function setDataIni($data_ini)
    {
        $this->data_ini = $data_ini;
    }

    public function getDataFim()
    {
        return $this->data_fim;
    }

    public function setDataFim($data_fim)
    {
        $this->data_fim = $data_fim;
    }

    public function getCodigoFinalizada()
    {
        return $this->is_finalizada;
    }

    public function setCodigoFinalizada($is_finalizada)
    {
        $this->is_finalizada = $is_finalizada;
    }

    public function getCodigoProjeto()
    {
        return $this->cd_projeto;
    }

    public function setCodigoProjeto($cd_projeto)
    {
        $this->cd_projeto = $cd_projeto;
    }


    public function incluir()
    {
        $data = [
            'cd_projeto' => $this->getCodigoProjeto(),
            'nm_atividade' => $this->getNomeAtividade(),
            'data_ini' => $this->getDataIni(),
            'data_fim' => $this->getDataFim(),
            'is_finalizada' => $this->getCodigoFinalizada(),
        ];

        return DB::table($this->table)->insert($data);
    }

    public function editar(){

        $data = [
            'nm_atividade' => $this->getNomeAtividade(),
            'data_ini' => $this->getDataIni(),
            'data_fim' => $this->getDataFim(),
            'is_finalizada' => $this->getCodigoFinalizada(),
        ];

        return DB::table($this->table)->where('cd_atividade', $this->getCodigoAtividade())->update($data);
    }

    public function excluir($id)
    {
        return DB::table($this->table)->where('cd_atividade', $id)->delete();
    }

    public function listar()
    {
        $query = DB::table('atividade')->orderBy('data_fim', 'asc')->get();

        return $query;
    }

    public function setData($data)
    {
        $this->setCodigoAtividade(Arr::get($data, 'cd_atividade'));
        $this->setNomeAtividade(Arr::get($data, 'nm_atividade'));
        $this->setDataIni(Arr::get($data, 'data_ini'));
        $this->setDataFim(Arr::get($data, 'data_fim'));
        $this->setCodigoFinalizada(Arr::get($data, 'is_finalizada', false));
        $this->setCodigoProjeto(Arr::get($data, 'cd_projeto'));

    }

    public function find($id)
    {
        return DB::table($this->table)->where('cd_atividade', $id)->first();
    }
}
