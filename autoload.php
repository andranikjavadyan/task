<?php

include ('public/phpQuery/phpQuery-onefile.php');
include ('.helpers.php');

spl_autoload_register(function ($class_name) {
    include str_replace('\\', '/',$class_name . '.php');
});
