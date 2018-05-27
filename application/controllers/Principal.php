<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {
	public $user_taller;
	public $mensaje;

	function __construct() {
		parent::__construct();		
		
		$this->load->model('Principal_model');
		$this->user_taller = $this->session->userdata('user_session');	
	}
	public function index(){
		if(!$this->user_taller){ redirect('login'); }
		redirect('portada');
		
	}

	public function _remap($method, $params = array()){
        $param_offset = 2;	
        if ( !method_exists($this, $method)){
            $this->index();
        }else{
            // Dado que todo lo que tenemos es $ method, cargar todo lo demás en la URI
            $params = array_slice($this->uri->rsegment_array(), $param_offset);
            // llamamos al método determinado con todos sus parametros
            call_user_func_array(array($this, $method), $params);
        }
	}

	

	public function login() {
        if($this->user_taller){ redirect('portada'); }
        
        $data = array();                
        $data['error_mensaje']='';
        $this->form_validation->set_rules('usuario', 'usuario', 'required|trim|min_length[4]|max_length[150]');
        $this->form_validation->set_rules('contrasena', 'contraseña', 'required|trim|min_length[5]|max_length[50]');         
        $this->form_validation->set_message('required', '<b>%s</b> es necesario');
        $this->form_validation->set_message('min_length', '<b>%s</b> debe tener al menos <b>%s</b> carácteres');
        $this->form_validation->set_message('max_length', '<b>%s</b> debe tener solo <b>%s</b> carácteres');		
        $this->form_validation->set_error_delimiters('<span class="c-red">','</span>');

        if(!empty($_POST)) {            
            if ($this->form_validation->run() == TRUE) {                
                $usuario = htmlentities($this->input->post('usuario'));
                $contrasena = hash ( "sha256", htmlentities($this->input->post('contrasena')) );
                $user_session = $this->Principal_model->get($usuario, $contrasena);

                if($user_session) { 
                    if($user_session->estado === 'A' || $user_session->estado === NULL) {  
						$params['usuario'] = $usuario;
						$this->session->set_userdata('user_session', $params);
						redirect('portada'); 
                        //$this->session->set_userdata('user_session', $user_session);
                        
                    }else{
						$this->mensaje[0] = "El Usuario ha sido bloqueado";
						$this->mensaje[1] = "danger";
                        //$data['error_mensaje']='<br><div class="alert alert-danger" role="alert">El Usuario ha sido bloqueado</div>';
                    }
                }else{
					$this->mensaje[0] = "Algo salio mal, intente de nuevo";
					$this->mensaje[1] = "danger";
                    //$data['error_mensaje']='<br><div class="alert alert-danger" role="alert">No encontramos un usuario con la autirización para ingresar.</div>';
                }
            }
        }       
        $data['titulo'] = "Iniciar sesión";
		$this->load->view('Template/login', $data);
    }

    public function error(){
        if(!$this->user){ 
            $this->load->view('404_invitado');
        }else{
            $data['content'] = '404';
            $this->load->view('template', $data);
        }
    }

	
	public function portada(){
		if(!$this->user_taller){ redirect('login'); }

		$data['titulo'] = "Dashboard";
		$data['content'] = 'portada';
		$this->load->view('Template/template', $data);
	}

	public function cliente($id_cliente){
		if(!$this->user_taller){ redirect('login'); }
		$data['detalle_cliente'] = $this->Principal_model->listado_clientes($id_cliente);

		$data['titulo'] = "Clientes";
		$data['content'] = 'detalles_clientes';
		$this->load->view('Template/template', $data);
	}

	public function todos_los_vehiculos(){
		if(!$this->user_taller){ redirect('login'); }
		//SE RECIBE LOS DATOS POR LA API
		$data['titulo'] = "Todos los vehículos";
		$data['content'] = 'tabla_vehiculos';
		$this->load->view('Template/template', $data);
	}

	public function todos_los_mecanicos(){
		if(!$this->user_taller){ redirect('login'); }
		//SE RECIBE LOS DATOS POR LA API
		$data['titulo'] = "Todos los mecánicos";
		$data['content'] = 'tabla_mecanicos';
		$this->load->view('Template/template', $data);
	}

	public function todos_los_clientes(){
		if(!$this->user_taller){ redirect('login'); }
		//SE RECIBE LOS DATOS POR LA API
		$data['titulo'] = "Todos los clientes";
		$data['content'] = 'tabla_clientes';
		$this->load->view('Template/template', $data);
	}



	public function ver_vehiculo($id_vehiculo){
		if(!$this->user_taller){ redirect('login'); }
		
		$params['usuario'] = $this->user_taller['usuario'];
		//$data['cant_mis_indicadores'] = $this->Principal_model->cantidad_clientes($params);

		$data['detalle_vehiculo'] = $this->Principal_model->detalles_vehiculo($id_vehiculo);
		//$data['listado_evolucion'] = $this->Principal_model->listado_evolucion($id_indicador);
		
		$data['titulo'] = "Detalles vehículo";
		$data['content'] = 'detalles_vehiculo';
		$this->load->view('Template/template', $data);
	}
	
	public function agregar_cliente(){
		if(!$this->user_taller){ redirect('login'); }
		//$data['cant_total_clientes'] = $this->Principal_model->cantidad_clientes();
		$params['usuario'] = $this->user_taller['usuario'];
		//$data['cant_mis_indicadores'] = $this->Principal_model->cantidad_clientes($params);
		
		if(!empty($_POST)) {
			$this->form_validation->set_rules('dni', 'DNI', 'trim|required|strip_tags');
			$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|strip_tags');
			$this->form_validation->set_rules('apellido', 'Apellido', 'trim|required|strip_tags');
			$this->form_validation->set_message('required', '<b>%s</b> es obligatorio');     
			$this->form_validation->set_message('max_length', '<b>%s</b> solo puede tener menos de <b>%s</b> carácteres'); 
			
			$this->form_validation->set_error_delimiters('<h4 style="color:red">','</h4>');

			if ($this->form_validation->run() == TRUE) {

				
				$params['dni'] = $this->input->post('dni');
				$params['nombre'] = $this->input->post('nombre');
				$params['apellido'] = $this->input->post('apellido');
				$params['direccion'] = $this->input->post('direccion');
				$params['telefono'] = $this->input->post('telefono');
				
				$resultado = $this->Principal_model->agregar_cliente($params);
				 if ($resultado === TRUE){
					 $this->mensaje = "notify('Cambios guardados con éxito', 'success');";
					redirect('clientes');
				}else{
					//$this->mensaje = "notify('Algo salio mal, intente de nuevo', 'danger');"; 
					$this->mensaje[0] = "Algo salio mal, intente de nuevo";
					$this->mensaje[1] = "danger";
				}
			}
		}

		$data['titulo'] = "Agregar Cliente";
		$data['content'] = 'agregar_cliente';
		$this->load->view('Template/template', $data);
	}

	public function editar_cliente($id_cliente){
		if(!$this->user_taller){ redirect('login'); }
		//$data['cant_total_clientes'] = $this->Principal_model->cantidad_clientes();
		$params['usuario'] = $this->user_taller['usuario'];
		//$data['cant_mis_indicadores'] = $this->Principal_model->cantidad_clientes($params);
		
		$data['detalles_cliente'] = $this->Principal_model->detalles_cliente($id_cliente);
		if(!empty($_POST)) {
			$this->form_validation->set_rules('dni', 'DNI', 'trim|required|strip_tags');
			$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|strip_tags');
			$this->form_validation->set_rules('apellido', 'Apellido', 'trim|required|strip_tags');
			$this->form_validation->set_message('required', '<b>%s</b> es obligatorio');     
			$this->form_validation->set_message('max_length', '<b>%s</b> solo puede tener menos de <b>%s</b> carácteres'); 
			
			$this->form_validation->set_error_delimiters('<h4 style="color:red">','</h4>');

			if ($this->form_validation->run() == TRUE) {

				$params['id_cliente'] = $id_cliente;
				$params['dni'] = $this->input->post('dni');
				$params['nombre'] = $this->input->post('nombre');
				$params['apellido'] = $this->input->post('apellido');
				$params['direccion'] = $this->input->post('direccion');
				$params['telefono'] = $this->input->post('telefono');
				
				$resultado = $this->Principal_model->editar_cliente($params);
				 if ($resultado === TRUE){
					redirect('clientes/');
				}else{
					$this->mensaje = "notify('Algo salio mal, intente de nuevo', 'danger');"; 
				}
			}
		}



		$data['titulo'] = "Editar Cliente";
		$data['content'] = 'editar_cliente';
		$this->load->view('Template/template', $data);
	}



	public function agregar_vehiculo(){
		if(!$this->user_taller){ redirect('login'); }
		
		$params['usuario'] = $this->user_taller['usuario'];
		//$data['cant_mis_indicadores'] = $this->Principal_model->cantidad_clientes($params);
		
		//$data['detalles_cliente'] = $this->Principal_model->detalles_cliente($id_cliente);
		
		if(!empty($_POST)) {
			$this->form_validation->set_rules('marca', 'Marca', 'trim|required|strip_tags');
			$this->form_validation->set_rules('modelo', 'Modelo', 'trim|required|strip_tags');
			$this->form_validation->set_rules('matricula', 'Matricula', 'trim|required|strip_tags');
			$this->form_validation->set_message('required', '<b>%s</b> es obligatorio');     
			$this->form_validation->set_message('max_length', '<b>%s</b> solo puede tener menos de <b>%s</b> carácteres'); 
			
			$this->form_validation->set_error_delimiters('<h4 style="color:red">','</h4>');

			if ($this->form_validation->run() == TRUE) {
				//var_dump('llego');die;
				$params['id_cliente'] = $this->input->post('id_cliente');
				$params['marca'] = $this->input->post('marca');
				$params['modelo'] = $this->input->post('modelo');
				$params['matricula'] = $this->input->post('matricula');
				$params['color'] = $this->input->post('color');
				$params['anho'] = $this->input->post('anho');
				
				$resultado = $this->Principal_model->agregar_vehiculo($params);
				 if ($resultado === TRUE){
					redirect('vehiculos/');
				}else{
					$this->mensaje = "notify('Algo salio mal, intente de nuevo', 'danger');"; 
				}
			}
		}



		$data['titulo'] = "Agregar Vehículo";
		$data['content'] = 'agregar_vehiculo';
		$this->load->view('Template/template', $data);
	}

	public function editar_vehiculo($id_vehiculo){
		if(!$this->user_taller){ redirect('login'); }
		//$data['cant_total_clientes'] = $this->Principal_model->cantidad_clientes();
		$params['usuario'] = $this->user_taller['usuario'];
		//$data['cant_mis_indicadores'] = $this->Principal_model->cantidad_clientes($params);
		$data['detalles_vehiculo'] = $this->Principal_model->detalles_vehiculo($id_vehiculo);
		
		if(!empty($_POST)) {
			$this->form_validation->set_rules('marca', 'MARCA', 'trim|required|strip_tags');
			$this->form_validation->set_rules('modelo', 'Modelo', 'trim|required|strip_tags');
			$this->form_validation->set_rules('matricula', 'Matricula', 'trim|required|strip_tags');
			$this->form_validation->set_message('required', '<b>%s</b> es obligatorio');     
			$this->form_validation->set_message('max_length', '<b>%s</b> solo puede tener menos de <b>%s</b> carácteres');  
			
			$this->form_validation->set_error_delimiters('<h4 style="color:red">','</h4>');

			if ($this->form_validation->run() == TRUE) {

				$params['id_vehiculo'] = $this->input->post('id_vehiculo');
				$params['id_cliente'] = $this->input->post('id_cliente');
				$params['marca'] = $this->input->post('marca');
				$params['modelo'] = $this->input->post('modelo');
				$params['matricula'] = $this->input->post('matricula');
				$params['color'] = $this->input->post('color');
				$params['anho'] = $this->input->post('anho');
				
				$resultado = $this->Principal_model->editar_vehiculo($params);
				 if ($resultado === TRUE){
					redirect('vehiculo/'.$id_vehiculo);
				}else{
					$this->mensaje = "notify('Algo salio mal, intente de nuevo', 'danger');"; 
				}
			}
		}

		$data['titulo'] = "Editar Vehículo";
		$data['content'] = 'editar_vehiculo';
		$this->load->view('Template/template', $data);
	}

	public function eliminar_vehiculo($id_vehiculo){
		if(!$this->user_taller){ redirect('login'); }
		
		$resultado = $this->Principal_model->eliminar_vehiculo($id_vehiculo);
		if ($resultado === TRUE){
			redirect('vehiculos');
		}else{
			$this->mensaje = "notify('Algo salio mal, intente de nuevo', 'danger');"; 
		}
		//VERIFICAR
		$data['titulo'] = "Todos los vehículos";
		$data['content'] = 'tabla_vehiculos';
		$this->load->view('Template/template', $data);
	}

	public function eliminar_cliente($id_cliente){
		if(!$this->user_taller){ redirect('login'); }
		
		$resultado = $this->Principal_model->eliminar_cliente($id_cliente);
		if ($resultado === TRUE){
			redirect('clientes');
		}else{
			$this->mensaje = "notify('Algo salio mal, intente de nuevo', 'danger');"; 
		}
		//VERIFICAR
		$data['titulo'] = "Todos los Clientes";
		$data['content'] = 'tabla_clientes';
		$this->load->view('Template/template', $data);
	}

	public function eliminar_mecanico($id_mecanico){
		if(!$this->user_taller){ redirect('login'); }
		
		$resultado = $this->Principal_model->eliminar_mecanico($id_mecanico);
		if ($resultado === TRUE){
			redirect('mecanicos');
		}else{
			$this->mensaje = "notify('Algo salio mal, intente de nuevo', 'danger');"; 
		}
		//VERIFICAR
		$data['titulo'] = "Todos los Mecanicos";
		$data['content'] = 'tabla_mecanicos';
		$this->load->view('Template/template', $data);
	}

	public function mecanico($id_mecanico){
		if(!$this->user_taller){ redirect('login'); }
		$data['detalle_mecanico'] = $this->Principal_model->listado_mecanicos($id_mecanico);

		$data['titulo'] = "Mecanicos";
		$data['content'] = 'detalles_mecanico';
		$this->load->view('Template/template', $data);
	}

	public function agregar_mecanico(){
		if(!$this->user_taller){ redirect('login'); }
		
		if(!empty($_POST)) {
			$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|strip_tags');
			$this->form_validation->set_message('required', '<b>%s</b> es obligatorio');     
			$this->form_validation->set_message('max_length', '<b>%s</b> solo puede tener menos de <b>%s</b> carácteres'); 
			
			$this->form_validation->set_error_delimiters('<h4 style="color:red">','</h4>');

			if ($this->form_validation->run() == TRUE) {

				
			
				$params['nombre'] = $this->input->post('nombre');
				
				$resultado = $this->Principal_model->agregar_mecanico($params);
				 if ($resultado === TRUE){
					 $this->mensaje = "notify('Cambios guardados con éxito', 'success');";
					redirect('mecanicos');
				}else{
					//$this->mensaje = "notify('Algo salio mal, intente de nuevo', 'danger');"; 
					$this->mensaje[0] = "Algo salio mal, intente de nuevo";
					$this->mensaje[1] = "danger";
				}
			}
		}

		$data['titulo'] = "Agregar Mecánico";
		$data['content'] = 'agregar_mecanico';
		$this->load->view('Template/template', $data);
	}

	public function editar_mecanico($id_mecanico){
		if(!$this->user_taller){ redirect('login'); }
		$data['detalles_mecanico'] = $this->Principal_model->listado_mecanicos($id_mecanico);
		if(!empty($_POST)) {
			$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|strip_tags');
			$this->form_validation->set_message('required', '<b>%s</b> es obligatorio');     
			$this->form_validation->set_message('max_length', '<b>%s</b> solo puede tener menos de <b>%s</b> carácteres'); 
			
			$this->form_validation->set_error_delimiters('<h4 style="color:red">','</h4>');

			if ($this->form_validation->run() == TRUE) {
				$params['id_mecanico'] = $id_mecanico;
				$params['nombre'] = $this->input->post('nombre');
				$resultado = $this->Principal_model->editar_mecanico($params);
				 if ($resultado === TRUE){
					redirect('mecanicos/');
				}else{
					$this->mensaje = "notify('Algo salio mal, intente de nuevo', 'danger');"; 
				}
			}
		}



		$data['titulo'] = "Editar Mecánico";
		$data['content'] = 'editar_mecanico';
		$this->load->view('Template/template', $data);
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect('login');
	}
}
