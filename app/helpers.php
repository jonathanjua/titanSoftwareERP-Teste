<?php
function view($viewName, $data = [])
{
    $path = dirname(__DIR__) . '/app/views/' . $viewName . '.php';
    
    if (file_exists($path)) {
        extract($data);
        require_once $path;
    }
}