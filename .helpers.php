<?php

use database\Connect;
use routes\Route;

const __VIEW__ = __DIR__.'/views/';

if(!function_exists('global_connection')){
    function global_connection($connection_name)
    {
        $con = include 'config/.env.php';

        return (new Connect(
            $con[$connection_name]['user'],
            $con[$connection_name]['database'],
            $con[$connection_name]['password'],
            $con[$connection_name]['server']
        ))->getConnect();

    }
}

if(!function_exists('dd')){
    function dd(...$data)
    {
        echo '<pre>';
        print_r($data);die;
    }
}

if(!function_exists('view')) {
    function view($path, $child_datas, ...$datas) {
        if(!is_null($child_datas)){
            $child_data = $child_datas;
        }
        $data = $datas;
        $path = str_replace('.','/', $path);
        return include(__VIEW__.$path.'.php');
    }
}

if(!function_exists('url')){
    function url($url, $arg = null){
        if(!is_null($arg)){
            $url = $url.'/'.$arg;
        }
        return $url;
    }
}

//if(!function_exists('action')){
//    function action(){
//        Route::get($url);
//    };
//}

