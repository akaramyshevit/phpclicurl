<?php

function customAutoload($class) {
    $file = __DIR__. DIRECTORY_SEPARATOR. $class. '.php';

    if (file_exists($file)) {
        require_once($file);
    }
}

spl_autoload_register('customAutoload');
