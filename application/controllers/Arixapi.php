<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Arixapi extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('serv_administracion_usuarios');
		$this->load->library('serv_cifrado');
		$this->load->library('serv_ejecucion_app');
	}
	public function arixapi_iniciar_sesion(){// ****** no requiere SESION pero si conexion POST y comporbar sesion ya abierta
		if (!$this->serv_administracion_usuarios->use_probar_session() && $this->input->is_ajax_request()) {
			$user = $this->input->post('user');
			$pass = $this->input->post('pass');
			$user = $this->serv_administracion_usuarios->use_abrir_session($user,$pass);//esto es booleano
			if ($user == true) {
				$this->serv_administracion_usuarios->use_autocargar_sucursal_session();//esta linea tuvo muchos problemas. este es la mejor manera hasta ahora
				echo json_encode(array('status' => true));
			}
			else{
				echo json_encode(array('status' => false));
			}
			
		}else{
			echo json_encode(array('status' => 403));//acceso denegado
		}
		
	}// OJO OJO COMO SABEN quien cierra la sesion
	////---------------------*****ARIXAPI_ARIXJOB****************-----------------
	public function arixapi_arixjob_mpsr(){
		$this->load->model('arixkernel');
		$data = array(
			'nombre' => date('Y-m-d H:i')
		);
		$data = $this->arixkernel->arixkernel_guargar_simple_data($data, 'arixjobs');	
	}
	public function arixapi_arixjob_mpsrautorizaciones(){
		$this->load->model('arixkernel');
		return;	
	}
	public function arixapi_arixjob_mpsrlicencias(){
		$this->load->model('arixkernel');
		return;	
	}
	public function arixapi_arixjob_mpsrcertificados(){
		$this->load->model('arixkernel');
		return;	
	}
	public function arixapi_arixjob_axconfigcontrato(){
		$this->load->model('arixkernel');
		return;	
	}



	//---------------------*****ARIX****************-----------------
	private function arixapi_cargar_botones(){
		//if ($this->serv_administracion_usuarios->use_probar_session() && $this->input->is_ajax_request()){
			$usuario_permiso = $this->serv_administracion_usuarios->use_mostrar_usuario_permiso();
			$usuario_permiso = $usuario_permiso->permiso;
			return $this->serv_ejecucion_app->exe_obtener_botones($usuario_permiso);
			//echo json_encode($this->serv_ejecucion_app->exe_obtener_botones($usuario_permiso));
		/*}
		else{
			//echo json_encode(array('status' => 403));
			show_404();
		}*/
	}
	public function arixapi_autoload_session_data(){
		if ($this->serv_administracion_usuarios->use_probar_session() && $this->input->is_ajax_request()) {
			$apps = $this->serv_administracion_usuarios->use_aplicaciones_usuario();
			$menu = $this->serv_administracion_usuarios->use_lista_menu_aplicaciones();
			$user = $this->serv_administracion_usuarios->use_cargar_sessiondata_usuario();
			$sucu_l = $this->serv_administracion_usuarios->use_obtener_sucursales();
			$btns = $this->arixapi_cargar_botones();
			for ($i=0; $i < count($sucu_l); $i++) { 
				$sucu_l[$i]->serial = $this->serv_cifrado->cod_cifrar_cadena($sucu_l[$i]->serial);
			}
			$temp = array();
			array_push($temp,$apps,$menu,$user,$sucu_l,$btns);
			unset($apps,$menu,$user,$sucu_l,$btns);
			echo json_encode($temp);
		}else{
			echo json_encode(array('status' => 403));//acceso denedo
		}		
	}
	public function arixapi_cerrar_sesion(){// ******requiere SESION y conexion POST
		if ($this->serv_administracion_usuarios->use_probar_session() && $this->input->is_ajax_request()) {
			echo json_encode(array('status' => $this->serv_administracion_usuarios->use_cerrar_session()));
		}else{
			echo json_encode(array('status' => 403));//acceso denedo
		}
	}
	/*public function arixapi_mostrar_apps_usuario(){
		if ($this->input->is_ajax_request() && $this->serv_administracion_usuarios->use_probar_session()) {
			$apps = $this->serv_administracion_usuarios->use_aplicaciones_usuario();
			print_r(json_encode($apps));
		}else{
			echo json_encode(array('status' => 403));//acceso denedo
		}
		
	}*/
	/*public function arixapi_mostrar_menu_aplicaciones(){//DELETE
		if ($this->input->is_ajax_request() && $this->serv_administracion_usuarios->use_probar_session()) {
			$lista_menu = $this->serv_administracion_usuarios->use_lista_menu_aplicaciones();
			echo json_encode($lista_menu);
		}else{
			echo json_encode(array('status' => 403));//acceso denedo
		}
	}*/
	/*public function arixapi_mostrar_usuario_actual(){//DELETE
		if ($this->input->is_ajax_request() && $this->serv_administracion_usuarios->use_probar_session()) {
			echo json_encode($this->serv_administracion_usuarios->use_cargar_sessiondata_usuario());
		}
		else{
			echo json_encode(array('status' => 403));//acceso denedo
		}
	}*/
	public function arixapi_mostrar_sucursal_actual(){
		if ($this->input->is_ajax_request() && $this->serv_administracion_usuarios->use_probar_session()) {
			$sucursal = $this->serv_administracion_usuarios->use_obtener_sucursal_actual();
			if (!is_null($sucursal)) {
				//$sucursal->sid = $this->serv_cifrado->cod_cifrar_cadena($sucursal->sid);
				echo json_encode($sucursal);
			}
			else{
				echo json_encode(array('status' => 403));
			}
		}
		else{
			echo json_encode(array('status' => 403));//acceso denedo
		}
	}
	public function arixapi_mostrar_sucursales(){
		if ($this->input->is_ajax_request() && $this->serv_administracion_usuarios->use_probar_session()) {
			$sucursal = $this->serv_administracion_usuarios->use_obtener_otros_sucursales();
			if (!is_null($sucursal)) {
				for ($i=0; $i < count($sucursal); $i++) { 
					$sucursal[$i]->serial = $this->serv_cifrado->cod_cifrar_cadena($sucursal[$i]->serial);
				}
				echo json_encode($sucursal);
			}
			else{
				echo json_encode(array('status' => 403));
			}
		}
		else{
			echo json_encode(array('status' => 403));//acceso denedo
		}
	}
	public function arixapi_change_sucursal(){
		if ($this->input->is_ajax_request() && $this->serv_administracion_usuarios->use_probar_session()) {	
			$new = $this->input->post('data');
			echo json_encode($this->serv_administracion_usuarios->cambiar_sucursal($new));
		}else{
			echo json_encode(array('status' => 403));//acceso denedo
		}
	}	
	public function arixapi_cargar_lista_card(){
		if ($this->serv_administracion_usuarios->use_probar_session() && $this->input->is_ajax_request() && $this->input->post('data')){
			$table = $this->input->post('data');
			$cant = $this->input->post('cant');
			$lista = $this->serv_ejecucion_app->cargar_lista_targetas($table,$cant);
			for ($i=0; $i < count($lista); $i++) { 
				$lista[$i]->uid = $this->serv_cifrado->cod_cifrar_cadena($lista[$i]->uid);
			}
			echo json_encode($lista);
		}else{
			echo json_encode(array('status' => 403));
		}
	}
	public function arixapi_save_person(){
		return;
	}
	public function arixapi_get_departamentos(){//get
		if ($this->input->is_ajax_request()){
			$this->load->library('serv_cifrado');
			$this->load->model('arixkernel');
			$consulta = $this->arixkernel->arixkernel_obtener_simple_data('departamento_id axuidob, departamento','private.departamentos');
			for ($i=0; $i < count($consulta); $i++) { 
				$consulta[$i]->axuidob= $this->serv_cifrado->cod_cifrar_cadena($consulta[$i]->axuidob);
			}
			echo json_encode($consulta);
		}else{
			show_404();
		}
	}
	public function arixapi_get_provincias(){//post
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$this->load->library('serv_cifrado');
			$this->load->model('arixkernel');
			$sucu = $this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtdata'));
			$consulta = $this->arixkernel->arixkernel_obtener_simple_data('provincia_id axuidob, provincia','private.provincias',0,array('departamento_id'=>$sucu));
			for ($i=0; $i < count($consulta); $i++) { 
				$consulta[$i]->axuidob= $this->serv_cifrado->cod_cifrar_cadena($consulta[$i]->axuidob);
			}
			echo json_encode($consulta);
		}else{
			show_404();
		}
	}
	public function arixapi_get_distritos(){//post
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$this->load->library('serv_cifrado');
			$this->load->model('arixkernel');
			$sucu = $this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtdata'));
			$consulta = $this->arixkernel->arixkernel_obtener_simple_data('distrito_id axuidob, distrito','private.distritos',0,array('provincia_id'=>$sucu));
			for ($i=0; $i < count($consulta); $i++) { 
				$consulta[$i]->axuidob= $this->serv_cifrado->cod_cifrar_cadena($consulta[$i]->axuidob);
			}
			echo json_encode($consulta);
		}else{
			show_404();
		}
	}
	public function arixapi_get_form_person(){
		if ($this->input->is_ajax_request() && $this->serv_administracion_usuarios->use_probar_session()) {
			$this->load->view('templates/person_add');
		}else{
			show_404();
		}
	}
	public function arixapi_check_duplicate_person(){
		if ($this->input->is_ajax_request() && $this->input->post('txtdata') && $this->serv_administracion_usuarios->use_probar_session()){
			//$this->load->library('serv_cifrado');
			//$this->load->model('arixkernel');
			/*$consulta = $this->arixkernel->arixkernel_obtener_data_by_id("persona_id axuid, concat(documento,' - ', nombres,', ', paterno,' ', materno) datas, concat(correo,'@',telefono) axextra", 'private.personas', false, array('documento'=>$this->input->post('txtdata')));
			if(!is_null($consulta)){
				echo json_encode(array('status'=>true,'id'=>$this->serv_cifrado->cod_cifrar_cadena($consulta->axuid),'data'=>$consulta->datas,'extra'=>$consulta->axextra));
			}else{
				echo json_encode(array('status'=>false));
			}*/
			echo json_encode($this->serv_ejecucion_app->exe_get_people_data($this->input->post('txtdata')));
		}else{
			show_404();
		}
	}
	public function arixapi_ger_vehicles(){
		if ($this->input->is_ajax_request() && $this->input->post('txtdata') && $this->serv_administracion_usuarios->use_probar_session()){	
			$vehicle = strrev($this->input->post('txtdata'));		
			$vehicle =  $this->arixkernel->arixkernel_obtener_simple_data('plac_ant,serie,motor,marca,modelo,color,asient,anio,peso,clase', 'mpsrvehicles',0, array('placa'=>$vehicle));
			if(!empty($vehicle)){
				echo json_encode(array_merge($vehicle,array('status'=>true)));
			}else{
				echo json_encode(array('status'=>false));
			}			
		}else{
			show_404();
		}
	}
	public function arixapi_post_personas(){//post
		if($this->input->is_ajax_request() && $this->input->post('txtperdni') && $this->serv_administracion_usuarios->use_probar_session()){
			$data = array(
				'documento'=>$this->input->post('txtperdni'),
				'nombres'=>$this->input->post('txtpername'),
				'paterno'=>$this->input->post('txtperlasname'),
				'materno'=>$this->input->post('txtfirstname'),
				'nacimiento'=>date("Y-m-d", strtotime(str_replace('/', '-',$this->input->post('txtborndate')))),
				'sexo'=>$this->input->post('txtpersexe'),
				'direccion'=>$this->input->post('txtperaddress'),
				'distrito_id'=>$this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtperdistrite')),
				'correo'=>$this->input->post('txtperemail'),
				'telefono'=>$this->input->post('txtperphone'),
				'fotografia'=>'public/images/users/tu39hnri84fhe2.png'
			);
			$data = $this->arixkernel->arixkernel_guargar_simple_data($data, 'private.personas');
			$data['id']=$this->serv_cifrado->cod_cifrar_cadena($data['id']);
			echo json_encode($data);
		}else{
			show_404();
		}
	}
	public function probar_arixapi($text){
		$this->load->library('serv_barcode');
        $this->serv_barcode->ax_barcode_c39($text,"170",false, 4);
	}
}