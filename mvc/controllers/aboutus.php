<?php
class aboutus extends Controller{
    function show(){
        $data = [];
        $this->ViewClient('aboutus', $data);
    }
}
?>