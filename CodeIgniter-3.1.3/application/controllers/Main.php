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
        $this->load->view('javascripts/leafLetJS');
        $this->load->view('javascripts/faqsJS');
        $this->load->view('javascripts/playerJS');
        $this->load->view('javascripts/UIeventsJS');
        $this->load->view('javascripts/accordionJS');
        $this->load->view('javascripts/show_hideJS');
        $this->load->view('javascripts/Comp01_LeafLetJS');
        $this->load->view('javascripts/Comp02_LeafLetJS');
        $this->load->view('javascripts/comparator_modal_loaderJS');
    }
}
