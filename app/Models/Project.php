<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    protected $table = 'projeto';

    protected $cd_projeto = 0;

    protected $nm_projeto = '';

    protected $data_ini = '';

    protected $data_fim = '';

    public function getCodigoProjeto()
    {
        return $this->cd_projeto;
    }

    public function setCodigoProjeto($cd_projeto)
    {
        $this->cd_projeto = $cd_projeto;
    }

    public function getNomeProjeto()
    {
        return $this->nm_projeto;
    }

    public function setNomeProjeto($nm_projeto)
    {
        $this->nm_projeto = $nm_projeto;
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

    public function incluir()
    {
        $data = [
            'nm_projeto' => $this->getNomeProjeto(),
            'data_ini'     => $this->getDataIni(),
            'data_fim'     => $this->getDataFim(),
        ];

        $query = DB::table($this->table)->insertGetId($data);

        return $query;
    }

    public function editar()
    {

        $data = [
            'nm_projeto' => $this->getNomeProjeto(),
            'data_ini'     => $this->getDataIni(),
            'data_fim'     => $this->getDataFim(),
        ];

        $query = DB::table($this->table)->where('cd_projeto', $this->getCodigoProjeto())->update($data);

        if($query) {
            return true;
        } else {
            return false;
        }

    }

    public function excluir($id)
    {
        $query = DB::table($this->table)->where('cd_projeto', $id)->delete();

        if($query) {
            return true;
        } else {
            return false;
        }
    }

    public function listar()
    {
        $query = DB::select('select * from projeto');

        return $query;
    }

    public function getAllProjects(){
        $query = DB::select('select * from projeto');

        return $query;
    }

    public function setData($data)
    {
        $this->setCodigoProjeto(Arr::get($data, 'cd_projeto'));
        $this->setNomeProjeto(Arr::get($data, 'nm_projeto'));
        $this->setDataIni(Arr::get($data, 'data_ini'));
        $this->setDataFim(Arr::get($data, 'data_fim'));

    }

    public function find($id)
    {
        $query = DB::table($this->table)->where('cd_projeto', $id)->first();

        return $query;
    }

}
