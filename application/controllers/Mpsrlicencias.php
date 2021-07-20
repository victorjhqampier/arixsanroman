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
		$this->load->library('serv_cifrado');
		$this->load->model('arixkernel');
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
	public function mayores(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/mayores');
		}else{
			show_404();
		}
	}
	public function mayores_add(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/mayores_add');
		}else{
			show_404();
		}
	}
	public function actvehiculos(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('templates/person_add');
		}else{
			show_404();
		}
	}
	public function acthehiculos(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('gen_user_new');
		}else{
			show_404();
		}
	}

	//FUNCIONES DE DATOS
	public function mpsr_get_activeemp(){
		if ($this->input->is_ajax_request()){
			//$this->load->library('serv_ejecucion_app');
			$this->load->library('serv_cifrado');
			$this->load->library('serv_administracion_usuarios');		 
			$this->load->model('arixkernel');
			//consulta construida por la funcion exe_construir_consultas
			$sucu = $this->serv_administracion_usuarios->use_obtener_sucursal_id_actual();
			/*$consulta=array(
				Array(
					'aut.nresolucion,aut.aufin,aut.factualizacion fecha',
					'emp.empresa_id axuidemp,emp.ruc,emp.nombre,emp.rsocial',
					'ser.descripcion'),
				Array(
					'public.autorizaciones aut','public.empresas emp','public.servicios ser'),
				Array(
					'NULL','aut.empresa_id = emp.empresa_id','aut.servicio_id = ser.servicio_id'));*/
			$consulta = array(
				Array (
					'aut.nresolucion,aut.aufin,aut.factualizacion fecha, aut.nvehiculos numv',
					'emp.empresa_id axuidemp,emp.ruc,emp.nombre,emp.rsocial',
					'cla.code'
				),
				Array (
					'public.autorizaciones aut',
					'public.empresas emp',
					'public.clasificaciones cla'
				),
				Array (
					'NULL',
					'aut.empresa_id = emp.empresa_id',
					'aut.clasificacion_id = cla.clasificacion_id'
				)
			);
			$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('emp.estado='=>true, 'aut.estadosan='=>false, 'aut.estado='=>true, 'cla.sucursal_id'=>$sucu));
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
		if($this->input->is_ajax_request()){
			$this->load->library('serv_cifrado');
			$this->load->model('arixkernel');
			$this->load->library('serv_administracion_usuarios');
			$sucu = $this->serv_administracion_usuarios->use_obtener_sucursal_id_actual();
			//$data = $this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtdata'));
			//$data = $this->serv_cifrado->cod_decifrar_cadena('5B956F5E2B3CCVzlyUmtpMWYwRWl5cDJ4OE10bWNPdz09');
			$consulta = $this->arixkernel->arixkernel_obtener_simple_data("clasificacion_id axuidemp, concat (code,' | ',substring(descripcion,0,16)) descripcion",'clasificaciones',0,array('sucursal_id'=>$sucu));
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
				array(//tabla empresa
					'ruc' => $this->input->post('txtruc'),
					'administrador_id' => intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtadminkey'))),
					'rsocial' => $this->input->post('txtrsocial'),
					'nombre' => $this->input->post('txtnombre'),
					'direccion' => $this->input->post('txtdireccion'),
					'telefono' => $this->input->post('txttelefonos')
				),array(//tabla autorizaciones
					//'empresa_id' => _Automaticamente_ creado y ejecutado por Arixkernel,
					'nresolucion' => $this->input->post('txtnresolucion'),
					'cautorizacion' => $this->input->post('txtcresolucion'),
					'servicio_id' => intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtmodalidad'))),//decifrar
					'clasificacion_id' => intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtunidad'))),//
					'horario' => $this->input->post('txthorarios'),
					'frecuencia' => $this->input->post('txtfrecuencia'),
					'nvehiculos' => intval($this->input->post('txtflota')),
					'auinicio' => date("Y-m-d", strtotime(str_replace('/', '-',$this->input->post('txtfinicio')))),//formatear YY/mm/dd
					'aufin' => $this->input->post('txtffinal'),
					'rutaini' => $this->input->post('txtrinicio'),
					'rutafin' => $this->input->post('txtrfinal')
				)
			);
			
			/*$datos = array(
				array(
					'ruc' => '20100070970',
					'administrador_id' => $this->serv_cifrado->cod_decifrar_cadena('50A8E49532917cWJ3SC82aVYrcGFqNHBtUzlhck1qQT09'),
					'rsocial' => "SUPERMERCADOS PERUANOS SOCIEDAD ANONIMA 'O' S.P.S.A.",//VER ESTO
					'nombre' => 'MI CASA',
					'direccion' => 'CAL. MORELLI NRO. 181 INT. P-2 LIMA LIMA SAN BORJA SAN BORJA LIMA LIMA',
					'telefono' => '48207109'
				),array(
					//'empresa_id' => _Automaticamente_ creado y ejecutado por Arixkernel,
					'nresolucion' => '855-2021-IROJF',
					'cautorizacion' => 'Resolucion de tipo -R1',
					'servicio_id' => intval($this->serv_cifrado->cod_decifrar_cadena('6ACA79F493CEEL1pkb1FBRHltbnFJclpFQjNGR2E1QT09')),//decifrar
					'clasificacion_id' => intval($this->serv_cifrado->cod_decifrar_cadena('78A8A91824B27TU5TVjVTOXBTMTZkLzZsSXlYRXhEUT09')),//
					'horario' => 'DESDE AQUI',
					'frecuencia' => 'HAST AQUI',
					'nvehiculos' => '10',
					'auinicio' => '2021/7/19',//formatear YY/mm/dd
					'aufin' => '2021/12/31',
					'rutaini' => 'DESDE AQUI',
					'rutafin' => 'HAST AQUI'
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
		/*$datas = array(
			array('nombre'=>'prueba_a 1'),
			array('nombre'=>'prueba_b 2'),
			array('nombre'=>'prueba_b 3')
		);		
		$tables = array('pruebas','bpruebas','cpruebas');
		print_r($this->arixkernel->arixkernel_guargar_sequencial_data($datas,$tables));*/
		
		/*$this->load->library('serv_administracion_usuarios');
		echo $this->serv_administracion_usuarios->use_obtener_sucursal_id_actual();*/
		/*$this->load->library('serv_ejecucion_app');
		$array_tabla_tupla = $this->serv_ejecucion_app->exe_contruir_consulta(array(
            'public.autorizaciones'=>'nresolucion,nvehiculos,aufin,factualizacion',
            'public.empresas'=>'empresa_id,ruc,nombre,rsocial',
            'public.clasificaciones'=>'code'
		), array(1,0,1));*/
		//$array_tabla_tupla  = $this->arixkernel->arixkernel_obtener_complex_data($array_tabla_tupla,0,array('emp.estado='=>true, 'aut.estado='=>true));
		//print_r($array_tabla_tupla);
		$this->load->library('serv_cifrado');		
		//print_r ($this->serv_cifrado->cod_cifrar_cadena('mi pene es grande'));
		//print_r ($this->serv_cifrado->cod_decifrar_cadena('CDC84DE2700EEOW5IOGdmUk5vTlY3WW9WVGZ2NjhJdkZHU08xa3ZWNG43YVc0WHhGWkJmND0='));

		echo (date("Y-m-d", strtotime(str_replace('/', '-','19/7/2021'))));
	}
}