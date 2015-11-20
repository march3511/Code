<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        //$this->load->model('Articulos_model');
    }

    public function index() {
        //$this->load->view('welcome_message');
        /*$datos['articulos'] = $this->Articulos_model->lista_articulos();
        $datos['titulo'] = 'Plantilla con CI';
        $datos['contenido'] = 'index';*/
        $this->load->view('plantillas/plantilla');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */