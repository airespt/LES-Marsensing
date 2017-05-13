<?php
    // este controlador respondo aos pedidos ajax
    class Respondao extends CI_Controller {
        // este metudo recebe um datestamp por 'GET' e compara-o com o utimo datastamp na BD, se for igual apenas devolve o dastamp,
        //senão devolve os barcos e camadas correspondente ao datastamp mais recente.
        // a resposta vai num json com a 'datahora', 'camadas' tabela das camadas e 'barcos' tabela com os barcos
        public function index()
        {
            $datestamp = $this->input->get('dt');
            
            $this->load->model('zonaModel');
            $corrent = $this->zonaModel->getLastDate();
            $jquery['datahora']= $corrent;
            if ($datestamp!= $corrent){
                $queryf = $this->zonaModel->getFrames();
                $queryb = $this->zonaModel->getShips();
                //$jquery['datahora']= $corrent;
                $jquery['camadas'] =$queryf;
                $jquery['barcos'] =$queryb;
            }
            echo json_encode($jquery);
        }
    }
    
?>