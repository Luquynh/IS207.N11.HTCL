<?php
class App{
    protected $controller="home";
    protected $action="show";
    protected $params=[];

    function __construct()
    {
        $arr= $this->UrlProcess();
        //tranh chuoi rong ban dau 
        if(isset($arr[0])==0){
            $arr[0]="home";
        }
        //xu li controller cho du nguoi dung co go bay ba thi van quay ve home
        if( file_exists("./mvc/Controllers/".$arr[0].".php")){
            $this->controller=$arr[0];
            unset($arr[0]);
        }
        //go bay ba van ra controller 
        require_once "./mvc/Controllers/".$this->controller.".php";
        
        $this->controller = new $this->controller;
        
        //Xu li action 
        if(isset($arr[1])){
            if(method_exists($this->controller,$arr[1])){
                $this->action=$arr[1];
            }
            unset($arr[1]);
        }
        //Xu li param 
        $this->params=$arr?array_values($arr):[];
        
        
        
        //chay ham trong Home
        call_user_func_array([$this->controller, $this->action], $this->params );
    
    }
    function UrlProcess(){
        if( isset($_GET["url"]) ){
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    }
}
?>