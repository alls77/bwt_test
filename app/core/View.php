<?php
namespace app\core;

class View
{
    function __construct()
    {
        //include_once('template/header.php');
    }

    function generate($content_view, $template_view, $data = null)
    {
        include_once ROOT . '\template\\'.$template_view;
    }

}