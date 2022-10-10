<?php

namespace App\Http\Controllers\Admin;

use Laravel\Lumen\Routing\Controller as BaseController;
use App\Services\Admin\LevelService;
use Illuminate\Http\Request;

class LevelController extends BaseController
{
    private $service;

    public function __construct(LevelService $levelService)
    {
        $this->service = $levelService;
    }
    
    public function CreateOrUpdateUsuario($id = null, Request $request){
        return $this->service->CreateOrUpdateLevel($id, $request);
    }

    public function ListLevel(Request $request){
        return $this->service->ListLevel($request);
    }
}
