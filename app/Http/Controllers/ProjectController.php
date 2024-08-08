<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Project;
use App\Services\ActivityService;
use App\Services\ProjectService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;

class ProjectController extends Controller
{

    protected $projectService;
    protected $acitivityService;

    public function __construct(ProjectService $projectService, ActivityService $acitivityService)
    {
        $this->projectService = $projectService;
        $this->acitivityService = $acitivityService;
    }

    public function index()
    {
        $projetosService = $this->projectService->getAll();
        $atividadesService = $this->acitivityService->getAll();

        $listagem = $this->projectService->gerarListagem($projetosService, $atividadesService);

        return view('projeto/index', ['projetos' => $listagem]);
    }


    public function create(Request $request)
    {
        try {
            $cd_projeto = $this->projectService->create($request->input("projeto", []));
            $this->acitivityService->tratarInclusaoAtividade($request->input("atividades", []), $cd_projeto);

            $response['status']  = true;

        } catch (\Exception $e) {
            $response['status']  = false;
            $response['message'] = "Deu bigode2!";
            $response['error']   = $e->getMessage();
        }

        return response()->json($response);
    }

    public function update(Request $request, $id)
    {
        $this->projectService->update($id, $request->input("projeto", []));
        $this->acitivityService->tratarEdicaoAtividades($request->input("atividades", []), $id);

        return response()->json(['message' => 'Deu boa!!!']);
    }

    public function delete(Request $request, $id)
    {
        $this->projectService->delete($id);

        return response()->json(['message' => 'Deu boa!!!']);
    }
}
