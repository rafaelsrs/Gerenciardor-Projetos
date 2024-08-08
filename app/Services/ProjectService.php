<?php

namespace App\Services;

use App\Repositories\ProjectRepository;
use Illuminate\Support\Carbon;

class ProjectService extends AbstractService
{
    public function __construct(ProjectRepository $model)
    {
        parent::__construct($model);
    }

    public function gerarListagem($projetos, $atividades)
    {
        $atividadesAgrupadas = [];
        foreach ($atividades as $atividade) {
            $atividadesAgrupadas[$atividade->cd_projeto][] = $atividade;

            $atividade->data_ini_formatada = Carbon::parse($atividade->data_ini)->format('d/m/Y');
            $atividade->data_fim_formatada = Carbon::parse($atividade->data_fim)->format('d/m/Y');
        }

        // Combinar os projetos com suas respectivas atividades
        foreach ($projetos as &$projeto) {
            $projeto->atividades = $atividadesAgrupadas[$projeto->cd_projeto] ?? [];

            $projeto->data_ini_formatada = Carbon::parse($projeto->data_ini)->format('d/m/Y');
            $projeto->data_fim_formatada = Carbon::parse($projeto->data_fim)->format('d/m/Y');

            $projeto->percentual_andamento = $this->calcularPercentualAndamento($projeto->atividades);

            if(!empty($projeto->atividades)) {
                $projeto->atrasado = end($projeto->atividades)->data_fim > $projeto->data_fim;
            }else {
                $projeto->atrasado = false;
            }
        }

        return $projetos;
    }


    private function calcularPercentualAndamento($atividades)
    {
        $totalAtividades = count($atividades);
        if ($totalAtividades === 0) {
            return 0;
        }

        $atividadesFinalizadas = array_filter($atividades, function($atividade) {
            return $atividade->is_finalizada == true;
        });

        $totalFinalizadas = count($atividadesFinalizadas);
        return ($totalFinalizadas / $totalAtividades) * 100;
    }
}
