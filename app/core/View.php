<?php
namespace app\core;

class View
{

    function generate($content_view, $template_view, $data = null)
    {
        include_once ROOT . '\template\\'.$template_view;
    }

}