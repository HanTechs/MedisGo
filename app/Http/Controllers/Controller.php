<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected string $appName = 'MedisGo';
    protected function renderView($view, $data = [], $pageTitle = null)
    {
        $finalTitle = $pageTitle ? $pageTitle . ' | ' . $this->appName : $this->appName;

        return view($view, array_merge($data, ['title' => $finalTitle]));
    }
}
