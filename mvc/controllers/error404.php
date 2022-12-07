<?php
    class error404 extends Controller{
        function error404(){
            $data = [];
            $this->ViewAdmin("error404",$data);
        }
    }
?>