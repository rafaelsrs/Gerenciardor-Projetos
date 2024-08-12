<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateProjectRequest;
use App\Services\ProjectService;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected $projectService;

    public function __construct(ProjectService $projectService)
    {
        $this->projectService = $projectService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projetos = $this->projectService->getAll();

        return $projetos;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateProjectRequest $request)
    {
        $projeto = $this->projectService->create($request->validated());


        return $projeto;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $projeto = $this->projectService->find($id);

        if(!$projeto){
            return response()->json(['error' => 'Not Found'], 404);
        }

        return $projeto;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateProjectRequest $request, string $id)
    {
        $projeto = $this->projectService->update($id, $request->validated());

        if(!$projeto){
            return response()->json(['error' => 'Not Found'], 404);
        }

        return $projeto;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $projeto = $this->projectService->find($id);

        if(!$projeto){
            return response()->json(['error' => 'Not Found'], 404);
        }

        $this->projectService->delete($id);

        return response()->json([], 204);
    }
}
