<?php
/**
 * Created by PhpStorm.
 * User: fabricio
 * Date: 27/05/18
 * Time: 11:47
 */

namespace App\Modules\Law\Http\Controllers;


use App\Http\Controllers\Controller;

class LawController extends Controller
{
    public function __construct()
    {

    }

    public function themes()
    {
      $data =   array('themes' => array (
            'personnes' => 'Livre Ier',
            'propriétés' => 'Livre II',
            'acquisition de biens' => 'Livre III',
            'suretes' => 'Livre IV',
            'disposition pour la mayotte' => 'Livre V',
        ));
        return json_encode($data);
    }

}