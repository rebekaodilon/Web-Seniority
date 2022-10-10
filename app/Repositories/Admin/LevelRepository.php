<?php

namespace App\Repositories\Admin;

use App\Repositories\Interfaces\Admin\LevelInterface;
use App\Models\Admin\Level;
use App\Models\Admin\Token;
use App\Functions\Pagination;
use App\Models\Admin\LevelTipo;
use Illuminate\Support\Facades\DB;

use DateTime;

//Camada de repositório, unica que deverá fazer buscas e alterações no banco de dados
class LevelRepository implements LevelInterface
{
    protected $model;

    public function __construct(Level $level)
    {
        $this->model = $level;
    }

    /**
     * Busca um único usuário
     * 
     * @param Number $id Level id
     * 
     * @return Level
     */
    public function SearchLevel($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * Salva um level ou atualiza um existente
     * 
     * @param Level $level Level a ser salvo
     * 
     * @return Level
     */
    public function SaveLevel($level)
    {
        $level->save();
        return $level;
    }

    /**
     * Deleta um level lógicamente
     * 
     * @param Number $id Id do level a ser deletado
     * 
     * @return Level
     */
    public function DeleteLevel($id)
    {
        $level = $this->model->find($id);
        return $level->save();
    }

    /**
     * Recuperar Levels
     * 
     * @param int $page Qual página buscará
     * @param int $size Quantidade de registros por página
     * 
     * @return Array
     */
    public function RetrieveLevels($page, $size, $search)
    {
        // $data = Level::select('level.*', 'leveltipo.Descricao as TipoLevel');

        // $data = $data->where(function($q) use ($search) {
        //     $q->where('Nome', 'LIKE', "%{$search}%")
        //         ->orWhere('level.Description', 'LIKE', "%{$search}%");
        // })
        // ->join('leveltipo', 'leveltipo.IdLevelTipo', '=', 'level.IdTipoLevel')
        // ->orderBy('Login', 'ASC');
        
        // $count = $data->count();
        // $items = $data->skip(($page - 1) * $size)->take($size)->get();

        // return Pagination::Paginate($items, $count, $page, $size);
    }
}