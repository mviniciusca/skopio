<?php

namespace App\Services\Twig;

use Twig\Loader\FilesystemLoader as TwigFilesystemLoader;
use Twig\Environment as TwigEnvironment;
use App\Settings\Settings as TwigSettings;

class Twig
{
    protected $view;

    public function __construct()
    {
        $settings = new TwigSettings();
        $settings = $settings->appSettings('TWIG');
        $loader = new TwigFilesystemLoader($settings['TEMPLATES_DIR']);
        $twig = new TwigEnvironment($loader, [
            //'cache' => $settings['CACHE_DIR'],
            'cache' => $settings['CACHE_ENABLE'],
            //'cache' => $settings['CACHE_TIME'],
        ]);
        $this->view = $twig;
    }

    public function view($template, $data = [])
    {
        return $this->view->render($template, $data);
    }
}
