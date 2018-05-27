<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
* @autor Andrés Ortiz
*/
class Principal_model extends CI_Model {
	
    function __construct() {
        parent::__construct();
    }

    public function get($usuario, $contrasena) { 
        $this->db->select('*');
        $this->db->from('usuarios u');
        $this->db->where('u.usuario', $usuario);
        $this->db->where('u.contrasenha', $contrasena);
        return $this->db->get()->row();
	}

    public function cantidad_clientes() {  
        $this->db->select('*');
        $this->db->from('clientes');
        return $this->db->count_all_results();
    }

    public function listado_clientes($id_cliente=NULL) {  
        $this->db->select('*');
        $this->db->from('clientes');
        if(isset($id_cliente) && $id_cliente){
            $this->db->where('id_cliente',$id_cliente);
        }
        return $this->db->get()->result_array();
    }

    public function listado_vehiculos($id_cliente=NULL) {  
        $this->db->select('*');
        $this->db->from('vehiculos');
        if(isset($id_cliente) && $id_cliente){
            $this->db->where('id_cliente',$id_cliente);           
        }
        return $this->db->get()->result_array();
    }

    public function listado_mecanicos($id_mecanico=NULL) {  
        $this->db->select('*');
        $this->db->from('mecanicos');
        if(isset($id_mecanico) && $id_mecanico){
            $this->db->where('id_mecanico',$id_mecanico);
        }
        return $this->db->get()->result_array();
    }

    public function detalles_cliente($id_cliente) {  
        $this->db->select('*');
        $this->db->from('clientes');
        $this->db->where('id_cliente',$id_cliente);            
        return $this->db->get()->result_array();
    }

    public function detalles_vehiculo($id_vehiculo) {  
        $this->db->select('*');
        $this->db->from('vehiculos v');
        $this->db->join('clientes c','c.id_cliente = v.id_cliente');
        $this->db->where('id_vehiculo',$id_vehiculo);            
        return $this->db->get()->result_array();
    }
    
    public function agregar_cliente($params) {  
        $this->db->trans_start();
            $fields = array(
                
                'dni' => $params['dni'],
                'nombre' => $params['nombre'],
                'apellido' => $params['apellido'],
                'direccion' => $params['direccion'],
                'telefono' => $params['telefono']
            );                
            $this->db->insert('clientes', $fields);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function editar_cliente($params) {  
        $this->db->trans_start();
            $fields = array(
                'id_cliente' => $params['id_cliente'],
                'dni' => $params['dni'],
                'nombre' => $params['nombre'],
                'apellido' => $params['apellido'],
                'direccion' => $params['direccion'],
                'telefono' => $params['telefono']
            );                

            $this->db->where('id_cliente', $params['id_cliente'])->update('clientes', $fields);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function agregar_vehiculo($params) {  
        $this->db->trans_start();
            $fields = array(
                
                'id_cliente' => $params['id_cliente'],
                'marca' => $params['marca'],
                'modelo' => $params['modelo'],
                'matricula' => $params['matricula'],
                'color' => $params['color'],
                'anho' => $params['anho']
            );                
            $this->db->insert('vehiculos', $fields);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

     public function editar_vehiculo($params) {  
        $this->db->trans_start();
            $fields = array(
                'id_vehiculo' => $params['id_vehiculo'],
                'id_cliente' => $params['id_cliente'],
                'marca' => $params['marca'],
                'modelo' => $params['modelo'],
                'matricula' => $params['matricula'],
                'color' => $params['color'],
                'anho' => $params['anho']
            );                

            $this->db->where('id_vehiculo', $params['id_vehiculo'])->update('vehiculos', $fields);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function eliminar_vehiculo($id_vehiculo){
        $array = array('id_vehiculo' => $id_vehiculo);
        $this->db->trans_start();
        $this->db->delete('vehiculos', $array);
        $this->db->trans_complete();
        return $this->db->trans_status();   
    }

    public function eliminar_cliente($id_cliente){
        $array = array('id_cliente' => $id_cliente);
        $this->db->trans_start();
        $this->db->delete('vehiculos', $array);
        $this->db->delete('clientes', $array);
        $this->db->trans_complete();
        return $this->db->trans_status();   
    }

    public function agregar_mecanico($params) {  
        $this->db->trans_start();
            $fields = array(
                'nombre' => $params['nombre']
            );                
            $this->db->insert('mecanicos', $fields);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function editar_mecanico($params) {  
        $this->db->trans_start();
            $fields = array(
                'nombre' => $params['nombre'],
            );                

            $this->db->where('id_mecanico', $params['id_mecanico'])->update('mecanicos', $fields);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function eliminar_mecanico($id_mecanico){
        $array = array('id_mecanico' => $id_mecanico);
        $this->db->trans_start();
        $this->db->delete('mecanicos', $array);
        $this->db->trans_complete();
        return $this->db->trans_status();   
    }
}