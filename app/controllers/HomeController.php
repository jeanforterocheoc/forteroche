<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\manager\HomeManager;


class HomeController extends Controller
{
    private $homeManager;

    public function homepage()
    {
        // print_r($this->request);
        // var_dump($_SESSION);
        $this->homeManager = new HomeManager;
        // $homePost = $this->homeManager->homePost();

        // $this->render('Home', array('homePage' => $homePost));

        $nbChapters = $this->homeManager->countHomePost();
        $perPage = 1;
        $nbPages = $this->homeManager->countPages($nbChapters, $perPage);
            if(isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $nbPages)
            {
                $currentPage = $_GET['page'];
            }else {
                $currentPage = 1;
            }
        $homePost = $this->homeManager->homePost($currentPage, $perPage);
        $this->render('Home', array('homePage' => $homePost, 'currentPage' => $currentPage, 'nbPages' => $nbPages));

    }

}
