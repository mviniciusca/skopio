<?php

namespace Src\Controllers;

use App\Services\Twig\Twig as Twig;

class Controller
{
    /**
     * Render View
     * template => string | data => array
     */
    public function __construct()
    {
        $this->twig = new Twig();
    }
}
