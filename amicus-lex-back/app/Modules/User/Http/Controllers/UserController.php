<?php
/**
 * Created by PhpStorm.
 * User: fabricio
 * Date: 27/05/18
 * Time: 11:18
 */

namespace App\Modules\User\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Modules\User\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }

    public function index()
    {
        echo "this is a new controller inside " . __FUNCTION__;
    }

    public function find(Request $request)
    {
        echo "inside  " . __FUNCTION__;
        $id = $request->route('id');
        $user = $this->userRepository->getById($id);

        return $user;

    }

    public function store()
    {

    }
}