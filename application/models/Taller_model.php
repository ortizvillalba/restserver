<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* @autor Andrés Ortiz
*/
class Taller_model extends CI_Model {
	
	function __construct() {
        parent::__construct();
        $this->load->database();
	}
    
    public function listar_clientes(){
        $this->db->select('*');
        $this->db->from('clientes c');
        //$this->db->order_by('c.nombre', 'ASC');
        return $this->db->get()->result_array();  
    }

    public function listar_vehiculos($id_cliente=NULL){
        $this->db->select('*');
        $this->db->from('vehiculos v');
        $this->db->join('clientes c','c.id_cliente = v.id_cliente');
        if(isset($id_cliente) && $id_cliente){
            $this->db->where('v.id_cliente',$id_cliente);           
        }
        return $this->db->get()->result_array();  
    }

    public function listar_mecanicos(){
        $this->db->select('*');
        $this->db->from('mecanicos c');
        return $this->db->get()->result_array();  
    }

    
     

}