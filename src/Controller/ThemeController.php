<?php

namespace App\Controller;

use App\Controller\AppController;

use Cake\Routing\Router;

class ThemeController extends AppController{

    public $base_url;

    public function initialize(){
        parent :: initialize();
        $this->base_url=Router::url("/", true);
        $this->viewBuilder()->setLayout("Themelayout");
    }


    public function index(){
    $this->base_url=Router::url("/", true);
    // echo $this->base_url;die;
     $this->set("title", "Upasana");
     $this->set("baseurl",$this->base_url);
}
}
?>

