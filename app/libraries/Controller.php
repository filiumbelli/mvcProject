<?php
/*
Model loader
View loader
*/
include_once __DIR__. '/../helpers/url_helper.php';
class Controller
{
    public function model(string $model)
    {
        require_once MODEL_ROOT  . "$model.php";
        return new $model();
    }


    public function view(string $view,$data=[]){
        if(file_exists(VIEW_ROOT . "$view.html.php")){
            require_once VIEW_ROOT ."$view.html.php";
        }else{
            http_response_code(301);
            redirect('index');
        }
    }
}
