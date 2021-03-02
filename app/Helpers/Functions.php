<?php
    function getModulesArray(){
        $a = [
            '1'=>'Noticias',
            '2'=>'Documentos'
            //'3'=>'Otros'
        ];
        return $a;
    }

    function getEstadoCivil(){
        $a =[
            '1'=>'Soltero (a)',
            '2'=>'Casado (a)',
            '3'=>'Viudo (a)',
            '4'=>'Divorsiado (a)'
        ];
        return $a;
    }

    function setActive($view){
        return request()->routeIs($view) ? 'nav-active':'';
    }


?>
