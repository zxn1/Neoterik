<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var list<string>
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
        //--------------------------------------------------------------------
        // Set locale dari session, default 'ms'
        //--------------------------------------------------------------------
        $locale = session('lang') ?? 'ms';
        service('request')->setLocale($locale);
        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        $this->session = \Config\Services::session();
    }

    // public function render2($view, $data)
    // {
    //     $array = [
    //         'data'  => $data,
    //         'view'  => $view
    //     ];

    //     echo view('layout/main', $array);
    // }

    public function render_login()
    {
        $array = [];
        echo view('render/login/main', $array);
    }

    public function render_without_main($view)
    {
        $uri = service('uri');
        $modules = $uri->getSegment(1);
        $view_path = 'App\\Modules\\' . ucfirst($modules) . '\\Views\\' . $view . '.php';

        echo view($view_path);
    }

    public function render($view, $data)
    {
        $uri = service('uri');
        $modules = $uri->getSegment(1);
        $view_path = 'App\\Modules\\' . ucfirst($modules) . '\\Views\\';

        $array = [
            'data'  => $data,
            'view'  => $view_path . $view
        ];

        echo view('render/main/main', $array);
    }

    public function render_jscss($view, $data, $js = [], $css = [])
    {
        $uri = service('uri');
        $modules = $uri->getSegment(1);
        $view_path = 'App\\Modules\\' . ucfirst($modules) . '\\Views\\';

        $jsTemp = [];
        foreach ($js as $sc)
            $jsTemp[] = $modules . "\\" . $sc;

        $cssTemp = [];
        foreach ($css as $cs)
            $cssTemp[] = $modules . "\\" . $cs;

        $array = [
            'data'  => $data,
            'script' => $jsTemp,
            'style' => $cssTemp,
            'view'  => $view_path . $view
        ];

        echo view('render/main/main', $array);
    }
}
