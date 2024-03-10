<?php

namespace App\Controllers;

use App\Models\Theme;
use App\Request;
use App\Response;

class ThemeController
{
    private Theme $theme;
    public function __construct()
    {
        $this->theme = new Theme();
    }

    public function index(Request $request): Response
    {
        return new Response($this->theme->getAll());
    }

    public function show(Request $request): Response
    {
        $id = explode('/', $request->name)[2];
        return new Response($this->theme->getThemeWithMessages($id), 200);
    }
}