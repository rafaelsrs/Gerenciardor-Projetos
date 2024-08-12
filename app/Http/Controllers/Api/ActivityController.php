<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateActivityRequest;
use App\Services\ActivityService;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    protected $activityService;

    public function __construct(ActivityService $activityService)
    {
        $this->activityService = $activityService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $atividades = $this->activityService->getAll();

        return $atividades;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateActivityRequest $request)
    {
        $atividade = $this->activityService->create($request->validated());

        return $atividade;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $atividade = $this->activityService->find($id);

        if(!$atividade){
            return response()->json(['error' => 'Not Found'], 404);
        }

        return $atividade;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateActivityRequest $request, string $id)
    {
        $atividade = $this->activityService->update($id, $request->validated());

        if(!$atividade){
            return response()->json(['error' => 'Not Found'], 404);
        }

        return $atividade;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $atividade = $this->activityService->find($id);

        if(!$atividade){
            return response()->json(['error' => 'Not Found'], 404);
        }

        $this->activityService->delete($id);

        return response()->json([], 204);
    }
}
