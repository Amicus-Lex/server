<?php
/**
* Created by PhpStorm.
* User: fabricio
* Date: 27/05/18
* Time: 11:47
*/

namespace App\Modules\Law\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Illuminate\Http\Request;

class LawController extends Controller
{
    
    public function __construct()
    {
        
    }
    private $_books = array(
        'personnes' => 'Livre Ier',
        'proprietes' => 'Livre II',
        'acquisition de biens' => 'Livre III',
        'suretes' => 'Livre IV',
        'disposition pour la mayotte' => 'Livre V',
    );
    
    public function themes()
    {
        $data =  array(
            'personnes' => 'Livre Ier',
            'propriétés' => 'Livre II',
            'acquisition de biens' => 'Livre III',
            'suretes' => 'Livre IV',
            'disposition pour la mayotte' => 'Livre V',
        );
        return json_encode($data);
    }
    
    public function get() {
        $booksDir = scandir('../app/Modules/Law/data/new_laws');
        $booksResult = array_values(array_diff($booksDir, ['.', '..']));
        return json_encode(['data' => $booksResult]);
    }

    public function find(Request $request) {
        dd($request);
    }
    
}