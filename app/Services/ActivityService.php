<?php

namespace App\Services;

use App\Repositories\ActivityRepository;

class ActivityService extends AbstractService
{
    public function __construct(ActivityRepository $model)
    {
        parent::__construct($model);
    }

    public function tratarInclusaoAtividade(array $data, $cd_projeto)
    {
        foreach($data as $atividade){
            $atividade['cd_projeto'] = $cd_projeto;
            $this->repository->create($atividade);
        }
    }

    public function tratarEdicaoAtividades(array $data, $cd_projeto)
    {
        foreach($data as $atividade){
            if(array_key_exists('deleted', $atividade)){
                $this->repository->delete($atividade['cd_atividade']);
            }elseif(array_key_exists('cd_atividade', $atividade)){
                $this->repository->update($atividade, $atividade['cd_atividade']);
            }else{
                $atividade['cd_projeto'] = $cd_projeto;
                $this->repository->create($atividade);
            }
        }
    }
}
