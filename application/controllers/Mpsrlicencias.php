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
		$js = $this->serv_ejecucion_app->exe_cargar_js('mpsr-arixjs, Chart');
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
	public function compania_view(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/empresas_view');
		}else{
			show_404();
		}
	}

	//FUNCIONES DE DATOS
	public function mpsr_get_activeemp(){
		if ($this->input->is_ajax_request()){
			//$this->load->library('serv_ejecucion_app');
			$this->load->library('serv_cifrado');
			$this->load->model('arixkernel');
			//consulta construida por la funcion exe_construir_consultas
			$consulta=array(Array('aut.nresolucion,aut.aufin,aut.factualizacion fecha','emp.empresa_id axuidemp,emp.ruc,emp.nombre,emp.rsocial','ser.descripcion'),Array('public.autorizaciones aut','public.empresas emp','public.servicios ser'),Array('NULL','aut.empresa_id = emp.empresa_id','aut.servicio_id = ser.servicio_id'));	
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
	public function mpsr_post_emprmpsr(){
		if($this->input->is_ajax_request() && $this->input->post('txtruc')){
			$datos = array(
				array(
					'ruc' => $this->input->post('txtruc'),
					'rsocial' => $this->input->post('txtrsocial'),
					'nombre' => $this->input->post('txtnombre'),
					'direccion' => $this->input->post('txtdireccion'),
					'telefono' => $this->input->post('txttelefonos')
				),array(
					//'empresa_id' => _Automaticamente_ creado y ejecutado por Arixkernel,
					'nresolucion' => $this->input->post('txtnresolucion'),
					'cautorizacion' => $this->input->post('txtcresolucion'),
					'servicio_id' => $this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtmodalidad')),//decifrar
					'clasificacion_id' => $this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtunidad')),//
					'horario' => $this->input->post('txthorarios'),
					'frecuencia' => $this->input->post('txtfrecuencia'),
					'nvehiculos' => $this->input->post('txtflota'),
					'auinicio' => $this->input->post('txtfinicio'),//formatear YY/mm/dd
					'aufin' => $this->input->post('txtffinal'),
					'rutaini' => $this->input->post('txtrinicio'),
					'rutafin' => $this->input->post('txtrfinal')
				)
			);
			/*$datos = array(
				array(
					'ruc' => '48521065985',
					'rsocial' => 'ARIX TRERRA BUS SAC',
					'nombre' => 'ARIX INTERNACIONAL TRANSPORTE',
					'direccion' => 'Jr amazonasm123 Puno',
					'telefono' => '968991714'
				),array(
					//'empresa_id' => _Automaticamente_ creado y ejecutado por Arixkernel,
					'nresolucion' => '9856-MPSR/HGKRND',
					'cautorizacion' => 'Resolucion de tipo -R2',
					'servicio_id' => $this->serv_cifrado->cod_decifrar_cadena('248558E9F6C41L1VrTWRsdXBvRllQaFFNSG5EWWMzZz09'),//decifrar
					'clasificacion_id' => $this->serv_cifrado->cod_decifrar_cadena('DD2506F2D783FZGRvN2JmTjJpallUa0ZGcG9DVjlnQT09'),//
					'horario' => 'DESDE 5 HASTA LAS 20 HORAS',
					'frecuencia' => 'ENTRE 5-4 MINUTOS',
					'nvehiculos' => 15,
					'auinicio' => '6/7/21',//formatear YY/mm/dd
					'aufin' => '2021/12/31',
					'rutaini' => 'DESDE AQUI 1',
					'rutafin' => 'HASTA AQUI 2'
				)
			);*/
			$tables = array('empresas','autorizaciones');
			$tables = $this->arixkernel->arixkernel_guargar_sequencial_data($datos,$tables);
			echo json_encode(array('status'=>$tables['status']));
		}else{
			show_404();
		}			
	}
	public function mpsr_post_duplicateru(){
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$consulta = $this->arixkernel->arixkernel_obtener_data_by_id('ruc', 'empresas', false, array('ruc'=>$this->input->post('txtdata')));
			if(!is_null($consulta)){
				echo json_encode(array('status'=>true));
			}else{
				echo json_encode(array('status'=>false));
			}
		}else{
			show_404();
		}
	}
	public function mpsr_post_duplicateres(){
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$consulta = $this->arixkernel->arixkernel_obtener_data_by_id('nresolucion', 'autorizaciones', false, array('nresolucion'=>$this->input->post('txtdata')));
			if(!is_null($consulta)){
				echo json_encode(array('status'=>true));
			}else{
				echo json_encode(array('status'=>false));
			}
		}else{
			show_404();
		}
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