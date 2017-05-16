<?php
    class zonaModel extends CI_Model {
        function __construct() { 
         parent::__construct(); 
      }

      
      private function getMaxTime($date = '2000-01-01 00:00:00'){
          $dt=$this->db->select_max('TimeStamp')
                       ->from('superficie')
                       ->where('TimeStamp <=', $date)
                       ->get();
          
          return $dt->result()[0]->TimeStamp;
      }
      
      private function getMinTime($date){
          $dt=$this->db->select_min('TimeStamp')
                       ->from('superficie')
                       ->where('TimeStamp >=', $date)
                       ->get();
          
          return $dt->result()[0]->TimeStamp;
      }
      
      private function getTimeIntrevale($t1, $t2){
        //$this->load->database();
        $dt=$this->db->select('TimeStamp as time')
                     ->distinct()
                     ->from('superficie')
                     ->where('TimeStamp >=', $t1)
                     ->where('TimeStamp <=', $t2)
                     ->get();
        //$this->db->close();
        $p=0;
        foreach ($dt->result() as $row){
             //echo $row->time;
            $result[$p] = $row->time;
            $p++;
        }
        return $result;
      }
      
      public function getPlayerframes($t1, $t2){
          $this->load->database();
          //echo $t1;
          //echo " | ";
          //echo $t2;
          $queryT= $this->getTimeIntrevale($t1, $t2);
          //print_r($queryT);
          $result['datahora']= $queryT;
          $comp = count($queryT);
          for($i=0; $i<$comp; $i++){
              $t = $queryT[$i];
              $frames[$i]= $this->getPframe($t);
          }
          
          $result['frames'] = $frames;
          //print_r($result);
          $this->db->close();
          //echo json_encode($result);
          return json_encode($result);
      }
      
      
      private function getPframe($t){
          $dt=$this->db->select('superficie.url as url , zona.NomeZona as zona, Zona.Bounds as bounds, superficie.tipo as tipo')
                       ->from('superficie')
                       ->join('zona', 'zona.NomeZona = superficie.Zona')
                       ->where('superficie.TimeStamp =', $t)
                       ->where('tipo', 'map')
                       ->get();
          return $dt->result();
      }
      
      
      public function isLastframe($date){
          $this->load->database();
          $dt=$this->db->select_max('TimeStamp')
                       ->from('superficie')
                       ->where('TimeStamp >', $date)
                       ->get();
          $this->db->close();
          $d = $dt->result()[0]->TimeStamp;
          if ($d=="")
              $result = TRUE;
          else 
              $result = FALSE;
          //echo $result;
          return $result;
      }
      
      public function getLastDate(){
          $this->load->database();
          $dt=$this->db->select_max('TimeStamp')
                       ->from('superficie')
                       ->get();
          $this->db->close();
          return $dt->result()[0]->TimeStamp;
      }
      
      
      public function getFrames($date = '2017-01-01 00:00:00'){
          $this->load->database();
          
          
          //$this->db->select('url')->from('superficie');
          //$this->db->from('superficie');
          //$this->db->where('superficie.TimeStamp' , '2000-01-01 00:00:00');
          //$this->db->where('zona.NomeZona ' , 'superficie.Zona');
          
          $time = $this->getMaxTime($date);
          
          //echo '<br />';
          //echo $sql;
           $query=$this->db->select('superficie.url as url , zona.NomeZona as zona, Zona.Bounds as bounds, superficie.tipo as tipo')
                           ->from('superficie')
                           ->join('zona', 'zona.NomeZona = superficie.Zona')
                           ->where('superficie.TimeStamp', $time) 
                           ->get();
                            
                            
          
          //echo $this->db->get_compiled_select();
          
          //$query = $this->db->get();
          //echo $this->getMaxTime($date);
          $this->db->close();
          return $query->result();
          
      }
      
      public function getShips($date = '2000-01-01 00:00:00'){
          $this->load->database();
          $query=$this->db->select('barcos.ID_barco as ID, barcos.Nome, embarcaoes_subreficie.localizacao, embarcaoes_subreficie.Velocidade')
                         ->from('embarcaoes_subreficie')
                         ->join('barcos', 'barcos.ID_barco = embarcaoes_subreficie.ID_barco')
                         ->join('superficie', 'superficie.ID_superficie = embarcaoes_subreficie.IDSubreficie')
                         ->where('superficie.TimeStamp', $date)
                         ->get();
                         
          //echo $this->db->get_compiled_select();
          $this->db->close();
          return $query->result();
                         
      }
      
      
    }

?>

