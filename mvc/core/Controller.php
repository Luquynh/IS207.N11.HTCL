<?php
class Controller{
    
    function ModelClient($model){
        require_once "./mvc/models/client/".$model.".php";
        return new $model;
    }

    function ViewClient($view, $data = []){
        require_once "./mvc/views/client/cpanel/".$view.".php";
    }


}
?>