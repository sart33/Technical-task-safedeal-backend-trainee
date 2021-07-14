<?php


namespace controller;


class View
{
    function renderView($layoutFile, $file, $vars = null, $id = null)
    {
        ob_start();
        include $layoutFile;

        $layoutContent = ob_get_clean();
        if (!empty($vars) && is_array($vars)) {
            extract($vars);
        }
        ob_start();
        include $file;

        $content = ob_get_clean();

        return str_replace('%content%', $content, $layoutContent);
    }
}