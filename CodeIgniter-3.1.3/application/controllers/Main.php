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
        $this->load->view('mainView');
        $this->parser->parse('javascripts/leafLetJS');
        $this->parser->parse('javascripts/refreshJS');
    }
}
