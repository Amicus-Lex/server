<?php
/**
 * Created by PhpStorm.
 * User: fabricio
 * Date: 27/05/18
 * Time: 11:48
 */

namespace App\Modules\Law\Repository;

use App\Modules\Law\Models\Law;

class LawRepository
{
    public $lawModel;

    public function __construct()
    {
        $this->lawModel = new Law();
    }

    public function add() {
        $this->lawModel;

    }
}