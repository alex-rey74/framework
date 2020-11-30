<?php


namespace App\Frontend\Module\News;

use TheFramework\Application;
use TheFramework\BackController;
use TheFramework\HTTPRequest;

class NewsController extends BackController{
    public function executeIndex(HTTPRequest $request){
        $manager = $this->managers->getManagerOf('News');

        $newsList = $manager->getAll(5,0);

        $this->page->addVar('news', $newsList);
    }

    public function executeShow(HTTPRequest $request)
    {
        $id = $request->getQuery('id');
        $manager = $this->managers->getManagerOf('News');

        $actu = $manager->getById($id);

        $this->page->addVar('actu', $actu);
    }
}