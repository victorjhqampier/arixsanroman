<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mpsrlicencias extends CI_Controller {
	function __construct(){
		parent::__construct();
		date_default_timezone_set("America/Lima");	
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
	public function compania_add(){
		$this->load->view('app_mprslicencias/empresas_add');
	}

	//FUNCIONES DE DATOS
	public function mpsr_get_activeemp(){
		if ($this->input->is_ajax_request()){
			//$this->load->library('serv_ejecucion_app');
			$this->load->library('serv_cifrado');
			$this->load->model('arixkernel');
			//consulta construida por la funcion exe_construir_consultas
			$consulta=array(Array('aut.nresolucion,aut.aufin','emp.empresa_id axuidemp,emp.ruc,emp.nombre,emp.rsocial','ser.descripcion'),Array('public.autorizaciones aut','public.empresas emp','public.servicios ser'),Array('NULL','aut.empresa_id = emp.empresa_id','aut.servicio_id = ser.servicio_id'));	
			$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('emp.estado='=>true, 'aut.estado='=>true));
			for ($i=0; $i < count($consulta); $i++) { 
				$consulta[$i]->axuidemp= $this->serv_cifrado->cod_cifrar_cadena($consulta[$i]->axuidemp);
			}
			echo json_encode($consulta);
		}else{
			show_404();
		}
	}
	public function mpsr_get_modalidad(){
		$this->load->library('serv_cifrado');
		$this->load->model('arixkernel');
		$consulta = $this->arixkernel->arixkernel_obtener_simple_data('servicio_id axuidemp, descripcion ','servicios');
		for ($i=0; $i < count($consulta); $i++) { 
			$consulta[$i]->axuidemp= $this->serv_cifrado->cod_cifrar_cadena($consulta[$i]->axuidemp);
		}
		echo json_encode($consulta);
	}
	public function mpsr_get_categoria(){
		$this->load->library('serv_cifrado');
		$this->load->model('arixkernel');
		$consulta = $this->arixkernel->arixkernel_obtener_simple_data("categoria_id axuidemp, concat (code,' ',descripcion) descripcion",'categorias');
		for ($i=0; $i < count($consulta); $i++) { 
			$consulta[$i]->axuidemp= $this->serv_cifrado->cod_cifrar_cadena($consulta[$i]->axuidemp);
		}
		echo json_encode($consulta);
	}
	public function mpsr_get_tipounidad(){//requiere si o si una peticion post
		if($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$this->load->library('serv_cifrado');
			$this->load->model('arixkernel');
			$data = $this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtdata'));
			//$data = $this->serv_cifrado->cod_decifrar_cadena('5B956F5E2B3CCVzlyUmtpMWYwRWl5cDJ4OE10bWNPdz09');
			$consulta = $this->arixkernel->arixkernel_obtener_simple_data("clasificacion_id axuidemp, concat (code,' | ',substring(descripcion,0,16)) descripcion",'clasificaciones',0,array('categoria_id'=>$data));
			for ($i=0; $i < count($consulta); $i++) { 
				$consulta[$i]->axuidemp= $this->serv_cifrado->cod_cifrar_cadena($consulta[$i]->axuidemp);
			}
			echo json_encode($consulta);
		}else{
			show_404();
		}
	}
	public function mpsr_post_activeemp(){
		$tabla1 = array(
			'arry' => $this->input->post('txtruc'),
			'arry' => $this->input->post('txtrsocial'),
			'arry' => $this->input->post('txtnombre'),
			'arry' => $this->input->post('txtdireccion'),
			'arry' => $this->input->post('txttelefonos')
		);
		$tabla2 = array(
			'arry' => $this->input->post('txtnresolucion'),
			'arry' => $this->input->post('txtcresolucion'),
			'arry' => $this->input->post('txtmodalidad'),
			'arry' => $this->input->post('txtcategoria'),
			'arry' => $this->input->post('txtunidad'),
			'arry' => $this->input->post('txthorarios'),
			'arry' => $this->input->post('txtfrecuencia'),
			'arry' => $this->input->post('txtflota'),
			'arry' => $this->input->post('txtfinicio'),
			'arry' => $this->input->post('txtffinal'),
			'arry' => $this->input->post('txtrinicio'),
			'arry' => $this->input->post('txtrfinal')
		);
	}
	public function mpsr_pruebas(){
		//$data = array('nombre' => 'My title 47');
		//echo $this->arixkernel->arixkernel_guargar_simple_data($data,'pruebas');
		$datas = array(
			array('nombre'=>'prueba_a 1'),
			array('nombre'=>'prueba_b 2'),
			array('nombre'=>'prueba_b 3')
		);		
		$tables = array('pruebas','bpruebas','cpruebas');
		print_r($this->arixkernel->arixkernel_guargar_sequencial_data($datas,$tables));
	}
}