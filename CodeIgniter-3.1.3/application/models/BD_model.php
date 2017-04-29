<?php 

    class BD_model extends CI_Model {
        function __construct() { 
         parent::__construct(); 
      }

      
   
      public function getFrames($date = '2000-01-01 00:00:00'){
          $this->load->database();
          //$this->db->select('url')->from('superficie');
          //$this->db->from('superficie');
          //$this->db->where('superficie.TimeStamp' , '2000-01-01 00:00:00');
          //$this->db->where('zona.NomeZona ' , 'superficie.Zona');
          
         
          //echo $sql;
           $query=$this->db->select('superficie.url , zona.NomeZona, Zona.Coordenadas_Canto_inferior, Zona.Coordenadas_Canto_superior')
                           ->from('superficie')
                           ->join('zona', 'zona.NomeZona = superficie.Zona')
                           ->where('superficie.TimeStamp', $date) 
                           ->get();
                            
                            
          
          //echo $this->db->get_compiled_select();
          
          //$query = $this->db->get();
          $this->db->close();
          return $query->result();
          
      }
      
      
    }

?>

