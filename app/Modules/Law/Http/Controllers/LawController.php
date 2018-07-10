<?php
/**
* Created by PhpStorm.
* User: fabricio
* Date: 27/05/18
* Time: 11:47
*/

namespace App\Modules\Law\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use willvincent\Feeds\Facades\FeedsFacade;
use willvincent\Feeds\FeedsServiceProvider;

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
    private $_number = array(

            'dispositions generales',
            'preliminaire',
            'Ier',
            'II',
            'III',
            'IV',
            'V',
            'VI',
            'VII',
            'VIII',
            'IX',
            'X',
            'XI',
            'XII',
            'XIII',
            'XIV',
            'XV',
            'XVI',
            'XVII',
            'XVIII',
            'XIX',
            'XX',
            'XXI',

    );


    public function themes()
    {
        $data =  array(
            'personnes' => 'Livre Ier',
            'proprietes' => 'Livre II',
            'acquisition de biens' => 'Livre III',
            'suretes' => 'Livre IV',
            'disposition pour la mayotte' => 'Livre V',
        );
        return json_encode($data);
    }
    public function getTheme(Request $request)
     {
         $theme = $request->input('theme');
         return ['data' => $this->_books[$theme]];
     }

    public function get() {
        $booksDir = scandir('../app/Modules/Law/data/new_laws');
        $booksResult = array_values(array_diff($booksDir, ['.', '..']));
        return json_encode(['data' => $booksResult]);
    }

    public function find(Request $request) {
        $params = $request->input();
        $bodyPath = '../app/Modules/Law/data/new_laws';
        $bookTitle = $this->_books[$params['book']];
        $fullPath = $bodyPath .  '/'. $bookTitle;
        $titlePath = '';
        if (array_key_exists('title', $params) === true) {
            $title = intval($params['title']);
            if ($title >= 1) {
                $titlePath = 'Titre ' . $this->_number[$title];
            } else {
                $titlePath = $this->_number[$title];
            }
        }
        $mdFile  = $this->findFile($params['article'], $params['notArticle'],$titlePath ,$fullPath);
        return json_encode(['data'=> $mdFile]);
    }

    private function findFile($article = '', $notArticle = '', $title = '', $fullPath)
    {
        $files =[];
        $data = glob($fullPath.  '/'.$title.'/*');
        foreach ($data as $datum) {
            preg_match("/[^\/]+$/", $datum   , $matches);

            $files[$datum] = $matches[0];

        }
        return $files;
    }
    public function openFile(Request $request)
    {
        $file = $request->input('filename');
        return response()->file($file);
    }
    public function feed() {

    }

}