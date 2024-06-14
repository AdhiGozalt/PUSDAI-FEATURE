<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\M_Base;

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
abstract class BaseController extends Controller {

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
     * @var array
     */
    protected $helpers = ['utility'];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger) {

        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
        $this->agent = $this->request->getUserAgent();

        $this->M_Base = new M_Base;

        if (preg_match("/webzip|httrack|wget|FlickBot|downloader|production
        bot|superbot|PersonaPilot|NPBot|WebCopier|vayala|imagefetch|
        Microsoft URL Control|mac finder|
        emailreaper|emailsiphon|emailwolf|emailmagnet|emailsweeper|
        Indy Library|FrontPage|cherry picker|WebCopier|netzip|
        Share Program|TurnitinBot|full web bot|zeus/i", $this->agent->getAgentString())) {
            die('- Sttt...');
        }
        
        $this->admin = false;
        
        if ($this->session->get('admin')) {
            $admin = $this->M_Base->data_where('admin', 'username', $this->session->get('admin'));
            
            if (count($admin) == 1) {
                $this->admin = $admin[0];
            }
        }
        
        $this->base_data = [];
        
    }
}
