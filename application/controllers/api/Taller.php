<?php
/*
* @autor Andrés Ortiz
*/

defined('BASEPATH') OR exit('No direct script access allowed');

/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php'; // LIBRERIA REQUERIDA PARA UTILIZAR LAS FUNCIONES DEL REST

class Taller extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        
        $this->load->model('Taller_model');
       
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
       
        $this->methods['clientes_get']['limit'] = 500; // 500 requests per hour per user/key
        $this->methods['clientes_post']['limit'] = 100; // 100 requests per hour per user/key
        $this->methods['clientes_delete']['limit'] = 50; // 50 requests per hour per user/key
        
        
    }
    
    public function clientes_get()
    {
        $clientes = $this->Taller_model->listar_clientes();
        
        $id = $this->get('id');
        
        // If the id parameter doesn't exist return all the users

        if ($id === NULL)
        {
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($clientes)
            {
                // Set the response and exit
                $this->response($clientes, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No encontramos ningún Cliente'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        // Find and return a single record for a particular user.

        $id = (int) $id;

        // Validate the id.
        if ($id <= 0)
        {
            // Invalid id, set the response and exit.
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

        // Get the user from the array, using the id as key for retrieval.
        // Usually a model is to be used for this.

        $cliente = NULL; //en singular para verificar un cliente específico

        if (!empty($clientes))
        {
            foreach ($clientes as $key => $value)
            {
                if (isset($value['id_cliente']) && $value['id_cliente'] == $id)
                {
                    $cliente = $value;
                }
            }
        }

        if (!empty($cliente))
        {
            $this->set_response($cliente, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'Cliente no encontrado'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }


    }

     public function misvehiculos_get()
    {
        
        $id = $this->get('id');
        //var_dump($id);die;
        
        $vehiculos = $this->Taller_model->listar_vehiculos();
        // If the id parameter doesn't exist return all the users

        if ($id === NULL)
        {
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($vehiculos)
            {
                // Set the response and exit
                $this->response($vehiculos, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => FALSE,
                    'message' => 'No encontramos ningún vehiculos'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        // Find and return a single record for a particular user.

        $id = (int) $id;

        // Validate the id.
        if ($id <= 0)
        {
            // Invalid id, set the response and exit.
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

        // Get the user from the array, using the id as key for retrieval.
        // Usually a model is to be used for this.

        $vehiculo = NULL; //en singular para verificar un cliente específico

        if (!empty($vehiculos))
        {
            $vehiculo = $this->Taller_model->listar_vehiculos($id);
        }

        if (!empty($vehiculo))
        {
            $this->set_response($vehiculo, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'Vehiculo no encontrado'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }


    }

    public function vehiculos_get()
    {
        $vehiculos = $this->Taller_model->listar_vehiculos();
        $id = $this->get('id');

        // SI EL PARÁMETRO NO EXISTE, RETORNAMOS TODOS LOS VEHÍCULOS
        if ($id === NULL){
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($vehiculos)
            {
                $this->response($vehiculos, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }else{
                $this->response([
                    'status' => FALSE,
                    'message' => 'No encontramos ningún Vehículo'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        //BUSCAR Y RETORNAR UN VEHÍCULO ESPECÍFICO
        $id = (int) $id;
        //VALIDAMOS EL ID QUE RECIBIMOS
        if ($id <= 0){ 
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

        $vehiculo = NULL; // para verificar un vehiculo específico
        if (!empty($vehiculos)){
            foreach ($vehiculos as $key => $value){
                if (isset($value['id_vehiculo']) && $value['id_vehiculo'] == $id){
                    $vehiculo = $value;
                }
            }
        }

        if (!empty($vehiculo))
        {
            $this->set_response($vehiculo, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'Vehículo no encontrado'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

   public function mecanicos_get()
    {   
       // $this->load->view('mecanicos');
        $mecanicos = $this->Taller_model->listar_mecanicos();
        
        $id = $this->get('id');

        // SI EL PARÁMETRO NO EXISTE, RETORNAMOS TODOS LOS VEHÍCULOS
        if ($id === NULL){
            // Check if the users data store contains users (in case the database result returns NULL)
            if ($mecanicos)
            {
                $this->response($mecanicos, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
            }else{
                $this->response([
                    'status' => FALSE,
                    'message' => 'No encontramos ningún mecanicos'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
            }
        }

        //BUSCAR Y RETORNAR UN VEHÍCULO ESPECÍFICO
        $id = (int) $id;
        //VALIDAMOS EL ID QUE RECIBIMOS
        if ($id <= 0){ 
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

        $mecanico = NULL; // para verificar un vehiculo específico
        if (!empty($mecanicos)){
            foreach ($mecanicos as $key => $value){
                if (isset($value['id_mecanico']) && $value['id_mecanico'] == $id){
                    $mecanico = $value;
                }
            }
        }

        if (!empty($mecanico))
        {
            $this->set_response($mecanico, REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status' => FALSE,
                'message' => 'Mecanico no encontrado'
            ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }
   
}
