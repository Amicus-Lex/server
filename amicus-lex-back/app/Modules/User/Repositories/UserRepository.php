<?php
/**
 * Created by PhpStorm.
 * User: fabricio
 * Date: 27/05/18
 * Time: 12:20
 */

namespace App\Modules\User\Repositories;


use App\Modules\User\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    private $model;
    public function __construct()
    {
        $this->model = new User();
    }


    public function add($input) {

        $this->model->email = $input['email'];
        $this->model->name = $input['name'];
        $this->model->password = Hash::make($input['password']);

        $this->model->save();
    }


    public function getById($id) {

        $result = User::query()->where('id', '=', $id)->first();
        return ($result === null) ? 404 : $result;
    }
}