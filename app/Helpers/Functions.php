<?php
    function getModulesArray(){
        $a = [
            '1'=>'Noticias',
            '2'=>'Documentos',
            '3'=>'Otros'
        ];
        return $a;
    }

    function setActive($view){
        return request()->routeIs($view) ? 'nav-active':'';
    }


?>
