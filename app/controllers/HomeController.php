<?php
namespace app\controllers;
use app\views\Viewer;

class HomeController {
    public function index()
    {
        $title = 'Teachsha.ir';
//        $_SESSION["success"] = "Success Message"
        $viewer = new Viewer();
        $viewer->render('/home/index.php',['title'=>$title]);

    }
}