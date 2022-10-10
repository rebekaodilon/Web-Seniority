<?php

namespace App\Repositories\Interfaces\Admin;

interface LevelInterface
{
    public function SearchLevel($id);

    public function SaveLevel($usuario);

    public function DeleteLevel($id);

    public function RetrieveLevels($page, $size, $search);
    
    public function ListLevelTipo($page, $size, $search);
}
