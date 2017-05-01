<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Aires
 * Date: 29-04-2017
 * Time: 14:35
 */

class Main extends CI_Controller {

    public function index()
    {
        $this->load->model('zonaModel');
        $zonas = $this->zonaModel->getFrames();
      print_r(json_encode($zonas));
        $this->load->view('mainView');
 //       $this->parser->parse('javascripts/leafLetJS', array('layersJson' => json_encode($zonas)));
    }
}
