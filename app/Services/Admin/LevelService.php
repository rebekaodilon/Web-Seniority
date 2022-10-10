<?php

namespace App\Services\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Repositories\Interfaces\Admin\LevelInterface;

use App\Models\Admin\Level;

use DateTime;

use App\Functions\Log;
use App\functions\Crypt;
use App\Helpers\Helpers;

class LevelService
{
    protected $interface;
    protected $helpers;

    public function __construct(LevelInterface $levelInterface,
        Helpers $helpers)
    {
        $this->helpers = $helpers;
        $this->interface = $levelInterface;
    }

    public function CreateOrUpdateLevel($id = null, Request $request)
    {
        try {
            $data = new DateTime();
            $level = ($id != null) ? $this->interface->SearchLevel($id) : new Level;

            foreach ($request->all() as $key => $value) {
                if ($key != "CriadoEm" && $key != "AtualizadoEm" && $key != "Guid")
                    $level->$key = $value;
            }
            
            $result = $this->interface->SaveLevel($level);

            return response()->json($result, Response::HTTP_OK);
        } catch (\Exception $ex) {
            $exception = [
                'Message' => $ex->getMessage(),
                'Code' => $ex->getCode(),
                'Exception' => $ex->__toString()
            ];
            
        
            return response()->json($exception, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function GetLevel($id)
    {
        try {
            $level = $this->interface->SearchLevel($id);
            
            return response()->json($level, Response::HTTP_OK);
        } catch (\Exception $ex) {
            $exception = [
                'Message' => $ex->getMessage(),
                'Code' => $ex->getCode(),
                'Exception' => $ex->__toString()
            ];
            
            Log::Log("Sistema", "Service", "Level/GetLevel", "Exception", $exception);

            return response()->json($exception, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function ListLevels(Request $request)
    {
        try {
            $levels = $this->interface->RetrieveLevels($request->Page, $request->Size, $request->Search);

            return response()->json($levels, Response::HTTP_OK);
        } catch (\Exception $ex) {
            $exception = [
                'Message' => $ex->getMessage(),
                'Code' => $ex->getCode(),
                'Exception' => $ex->__toString()
            ];
            
            Log::Log("Sistema", "Service", "Level/ListLevels", "Exception", $exception);
            return response()->json($exception, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}