<?php

if (!function_exists('menus'))
{
    function getMenu()
    {
        return config('menu');
    }
}

if (!function_exists('menus'))
{
    function checkSubmenu($route,  $subMenu)
    {
        $check =  array_search($route, array_column($subMenu, 'slug'));
        return  $check !== false ? true  : false;
    }
}
