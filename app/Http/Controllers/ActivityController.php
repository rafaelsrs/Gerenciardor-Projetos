<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Services\ActivityService;
use Illuminate\Http\Request;

class ActivityController extends Controller
{

    protected $acitivityService;

    public function __construct( ActivityService $acitivityService)
    {
        $this->acitivityService = $acitivityService;
    }
    public function delete(Request $request, $id)
    {
        $this->acitivityService->delete($id);

        return response()->json(['message' => 'Atividade deletada com sucesso']);
    }
}
