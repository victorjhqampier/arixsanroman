<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mpsrlicencias extends CI_Controller {
	function __construct(){
		parent::__construct();		
		$controlador=explode("/",$_SERVER['PHP_SELF']);$this->load->library('serv_administracion_usuarios');if(!$this->serv_administracion_usuarios->use_cargar_app_session($controlador[3])){show_404();}
	}
	
	public function index(){
		$this->load->library('serv_ejecucion_app');
		$js = $this->serv_ejecucion_app->exe_cargar_js('mpsr-arixjs');
		$this->load->view('arixshellbase',compact('js'));
	}
	public function mpsrdashboard(){
		$this->load->view('app_mprslicencias/resumen');
    }
    public function compania(){
		$this->load->view('app_mprslicencias/empresas');
	}

	//FUNCIONES DE DATOS
	public function mpsr_get_activeemp(){
		if ($this->input->is_ajax_request()){
			$this->load->library('serv_ejecucion_app');
			$this->load->library('serv_cifrado');
			$this->load->model('arixkernel');
			//consulta construida por la funcion exe_construir_consultas
			$consulta=array(Array('aut.nresolucion,aut.aufin','emp.empresa_id axuidemp,emp.ruc,emp.nombre,emp.rsocial','ser.descripcion'),Array('public.autorizaciones aut','public.empresas emp','public.servicios ser'),Array('NULL','aut.empresa_id = emp.empresa_id','emp.servicio_id = ser.servicio_id'));	
			$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('emp.estado='=>true, 'aut.estado='=>true));
			for ($i=0; $i < count($consulta); $i++) { 
				$consulta[$i]->axuidemp= $this->serv_cifrado->cod_cifrar_cadena($consulta[$i]->axuidemp);
			}
			echo json_encode($consulta);
		}else{
			show_404();
		}
	}
}