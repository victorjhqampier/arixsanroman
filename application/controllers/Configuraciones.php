<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Configuraciones extends CI_Controller {
	function __construct(){
		parent::__construct();
		$controlador=explode("/",$_SERVER['PHP_SELF']);
		$this->load->library('serv_administracion_usuarios');
		$this->load->library('serv_ejecucion_app');
		$this->load->library('serv_cifrado');
		/*se debe denegar el acceso a ARIX CORE desde aquí*/
		//Controlador[3][2] depende de la carpeta en el que está
		//if(!$this->serv_administracion_usuarios->use_cargar_app_session($controlador[3])){redirect(base_url());}
		if(!$this->serv_administracion_usuarios->use_cargar_app_session($controlador[3])){show_404();}
		//comprueba la sesion
		//ademas puede trabajar con muchas ventanas a la vez, actualiza por cada consulta
	}
	public function index(){
		$this->load->library('serv_ejecucion_app');
		$this->load->library('serv_cifrado');
		$this->load->model('arixkernel');
		$this->load->library('serv_administracion_usuarios');
		$css = $this->serv_ejecucion_app->exe_cargar_axcss(array('axcss-dataTables'));
		$js = $this->serv_ejecucion_app->exe_cargar_axjs(array('axjs-dataTables','axjs-validate-p1','axjs-validate-p2','axjs-mask','configuraciones-arixjs'));
		$js = array($js,$css);
		$this->load->view('arixshellbase',compact('js'));
	}
	public function sucursales(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_configuraciones/sucursales');
		}
		else{
			show_404();
		}
	}
	public function sucursales_detail(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_configuraciones/sucursales_detalles');
		}
		else{
			show_404();
		}
	}
	public function empleados(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_configuraciones/empleados');
		}
		else{
			show_404();
		}
	}
	public function areas(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_configuraciones/areas');
		}
		else{
			show_404();
		}
	}
	public function usuarios(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_configuraciones/usuarios');
		}
		else{
			show_404();
		}
	}
	public function arixcontrata(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_configuraciones/axcontrata');
		}
		else{
			show_404();
		}
	}
	public function reportes(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('gen_user_new');
		}
		else{
			show_404();
		}
	}
	public function usuarios_nuevo(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_configuraciones/usuarios_nuevo');
		}
		else{
			show_404();
		}
	}

	//SELECCIONAR LOS SUCURSALES 
	public function axconfig_get_sucursales_simple(){
		// con afan de optimizar el rendimiento [$array_tabla_tupla] DEBE SER UN ARRAY FIJO 
		$array_tabla_tupla = $this->serv_ejecucion_app->exe_contruir_consulta(array(
            'config.sucursales'=>'sucursal_id,numero,nombre,direccion,estado',
            'config.subcategorias'=>'subcategoria',
            'config.categorias'=>'categoria',
            'private.distritos'=>'distrito'
        ), array(1,0,0,1));
        echo json_encode($this->serv_ejecucion_app->exe_obtener_complex_data($array_tabla_tupla, 0,'', array('sucursal_id','ASC')));
	}
	public function axconfig_get_sucursales(){
		if ($this->input->is_ajax_request()){
			$consulta = $this->arixkernel->arixkernel_obtener_simple_data("sucursal_id axuidemp,concat(numero,' - ',nombre) datas", 'config.sucursales',0,array('estado'=>true));
			for ($i=0; $i < count($consulta); $i++) { 
				$consulta[$i]->axuidemp= $this->serv_cifrado->cod_cifrar_cadena($consulta[$i]->axuidemp);
			}
			echo json_encode($consulta);
		}else{
			show_404();
		}
	}
	public function axconfig_get_areas_bysuc(){
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$sucu = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtdata')));
			$consulta = array(
				array(
				   "are.area_id axuidemp, concat(substring(dep.departamento,0,25),'... - ',substring(are.descripcion,0,15)) departamento"
				),
				array(
				   'config.areas are',
				   'config.departamentos dep'
				),
				array(
				   'NULL',
				   'are.departamento_id = dep.departamento_id'
				)
			 );
			$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('are.estado'=>true, 'are.sucursal_id'=>$sucu));
			for ($i=0; $i < count($consulta); $i++) { 
				$consulta[$i]->axuidemp= $this->serv_cifrado->cod_cifrar_cadena($consulta[$i]->axuidemp);
			}
			echo json_encode($consulta);
		}else{
			show_404();
		}
	}
	public function axconfig_get_puestos(){
		if ($this->input->is_ajax_request()){
			$consulta = $this->arixkernel->arixkernel_obtener_simple_data("puesto_id axuidemp, puesto", 'config.puestos');
			for ($i=0; $i < count($consulta); $i++) { 
				$consulta[$i]->axuidemp= $this->serv_cifrado->cod_cifrar_cadena($consulta[$i]->axuidemp);
			}
			echo json_encode($consulta);
		}else{
			show_404();
		}
	}

	public function axconfig_get_areas(){
		if ($this->input->is_ajax_request()){
			//$sucu = $this->serv_administracion_usuarios->use_obtener_sucursal_id_actual();			
			$consulta = array(
				array(
				   'are.area_id axuid,substring(are.descripcion,0,35) descrt',
				   'dep.departamento, are.fregistro fecha',
				   "concat(suc.numero,' - ',substring(suc.nombre,0,35)) oficina"
				),
				array(
				   'config.areas are',
				   'config.departamentos dep',
				   'config.sucursales suc'
				),
				array(
				   'NULL',
				   'are.departamento_id = dep.departamento_id',
				   'are.sucursal_id= suc.sucursal_id'
				)
			 );
			$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('are.estado'=>true/*, 'are.sucursal_id'=>$sucu*/));
			for ($i=0; $i < count($consulta); $i++) { 
				$consulta[$i]->axuid= $this->serv_cifrado->cod_cifrar_cadena($consulta[$i]->axuid);
			}
			echo json_encode($consulta);
		}else{
			show_404();
		}
	}
	public function axconfig_duplicate_employee(){
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$doc = strrev($this->input->post('txtdata'));			
			$consulta = array(
				array(
				   "per.persona_id"
				),
				array(
				   'config.contratos con',
				   'private.personas per'
				),
				array(
				   'NULL',
				   'con.persona_id = per.persona_id'
				)
			 );
			$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('con.estado'=>true, 'per.documento'=>$doc));
			//print_r($consulta);
			if(!empty($consulta)){
				echo json_encode(array('status'=>true));
			}else{
				echo json_encode(array('status'=>false));
			}
		}else{
			show_404();
		}
	}
	public function axconfig_get_empleados(){
		if ($this->input->is_ajax_request()){
			//$sucu = $this->serv_administracion_usuarios->use_obtener_sucursal_id_actual();			
			$consulta = array(
				array(
				   'con.contrato_id axuid,con.numero contrato, con.fregistro fecha',
				   "concat(per.documento,' - ',per.nombres,' ',per.paterno,' ',per.materno) persona, concat('De ',to_char(con.cinicio, 'DD-MM-YYYY'),' a ',to_char(cfinal, 'DD-MM-YYYY')) fecha",
				   "concat('(',suc.numero,' ',substring(suc.nombre,0,11),') ',substring(dep.departamento,0,30)) departamento, pue.puesto cargo"
				),
				array(
				   'config.contratos con',
				   'private.personas per',
				   'config.areas are',
				   'config.departamentos dep',
				   'config.puestos pue',
				   'config.sucursales suc'
				),
				array(
				   'NULL',
				   'con.persona_id = per.persona_id',
				   'con.area_id = are.area_id',
				   'are.departamento_id = dep.departamento_id',
				   'con.puesto_id = pue.puesto_id',
				   'are.sucursal_id = suc.sucursal_id'
				)
			 );
			$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('con.estado'=>true, 'con.contrato_id>'=>1,'are.estado'=>true/*, 'are.sucursal_id'=>$sucu*/));
			//print_r($consulta);
			for ($i=0; $i < count($consulta); $i++) { 
				$consulta[$i]->axuid= $this->serv_cifrado->cod_cifrar_cadena($consulta[$i]->axuid);
			}
			echo json_encode($consulta);
		}else{
			show_404();
		}
	}
	public function axconfig_get_usuarios(){
		if ($this->input->is_ajax_request()){
			//$sucu = $this->serv_administracion_usuarios->use_obtener_sucursal_id_actual();			
			$consulta = array(
				array(
					"cue.cuenta_id axuid, concat('*',substring(cue.correo,2,5),'*@***') cuenta, cue.fmodificacion fecha",
					'con.numero',
					"concat(per.documento,' - ',per.nombres,', ',per.paterno,' ',per.materno) persona, concat('Desde ',to_char(con.cinicio, 'DD-MM-YYYY'),' hasta ',to_char(cfinal, 'DD-MM-YYYY')) vigencia"
				),
				array(
					'config.cuentas cue',
					'config.contratos con',
					'private.personas per'
				),
				array(
					'NULL',
					'cue.contrato_id = con.contrato_id',
					'con.persona_id = per.persona_id'
				)
			);
			$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('cue.estado'=>true, 'con.estado'=>true, 'cue.cuenta_id>'=>1));
			//print_r($consulta);
			for ($i=0; $i < count($consulta); $i++) { 
				$consulta[$i]->axuid= $this->serv_cifrado->cod_cifrar_cadena($consulta[$i]->axuid);
			}
			echo json_encode($consulta);
		}else{
			show_404();
		}
	}
	public function axconfig_check_duplicate_cont(){
		if ($this->input->is_ajax_request()){
			$consulta = $this->arixkernel->arixkernel_obtener_data_by_id('numero', 'config.contratos', false, array('numero'=>$this->input->post('txtdata')));
			if(!is_null($consulta)){
				echo json_encode(array('status'=>true));
			}else{
				echo json_encode(array('status'=>false));
			}
		}else{
			show_404();
		}
	}
	/*++++++++++++++++++POS_AREA++++++++++++++++++++++++++*/
	public function axconfig_post_employee(){
		if($this->input->is_ajax_request() && $this->input->post('txtcontnumber')){			
			$datos = array(
				'numero'=>$this->input->post('txtcontnumber'),
				'persona_id'=>intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtcontemployeeid'))),
				'cinicio'=>date("Y-m-d", strtotime(str_replace('/', '-',$this->input->post('txtcontfinicio')))),
				'cfinal'=>date("Y-m-d", strtotime(str_replace('/', '-',$this->input->post('txtcontfin')))),
				'area_id'=>intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtcontarea'))),
				'puesto_id'=>intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtcontcargo')))
			);
			$tables = $this->arixkernel->arixkernel_guargar_simple_data($datos, 'config.contratos');
			echo json_encode(array('status'=>$tables['status']));
		}else{
			show_404();
		}
	}
	

	#REHACER TODO DESQUE AQUI CON EL NUEVO KERNEL Y SERVICIO DE EJECUCIÓN
	public function axconfiguraciones_cargar_lista_sucursales(){
		if ($this->input->is_ajax_request() && $this->input->post('type')){
			$tipo = $this->input->post('type'); // variable para cargar datos como iconos o lista datatables
			$lista = $this->serv_ejecucion_app->exe_obtener_lista_ordenado('imagen, sucursal_id uid, nombre, direccion, fregistro', 'config.sucursales', 'fregistro, ASC',20);
			for ($i=0; $i < count($lista); $i++) { 
				$lista[$i]->uid = $this->serv_cifrado->cod_cifrar_cadena($lista[$i]->uid);
			}
			echo json_encode($lista);
		}else{
			echo json_encode(array('status' => 403));
		}
	}
	public function axconfiguraciones_cargar_lista_usuarios(){
		if ($this->input->is_ajax_request() && $this->input->post('type')){
			$tipo = $this->input->post('type'); // variable para cargar datos como iconos o lista datatables
			$lista = $this->serv_ejecucion_app->exe_obtener_lista_ordenado('fotografia, cuenta_id uid, nombres, paterno, materno, documento, codigo, fmodificacion, estado, correo', 'config.v_persona_empleado_cuenta', 'fmodificacion, ASC',20);
			for ($i=0; $i < count($lista); $i++) { 
				$lista[$i]->uid = $this->serv_cifrado->cod_cifrar_cadena($lista[$i]->uid);
			}
			echo json_encode($lista);
		}else{
			echo json_encode(array('status' => 403));
		}
	}
	public function axconfiguraciones_cargar_datos_sucursal(){
		if ($this->input->is_ajax_request() && $this->input->post('data')){			
			$dato = $this->serv_ejecucion_app->exe_obtener_dato_unico($this->input->post('data'),'nombre', 'config.sucursales');
			return json_encode(array('neme'=>'error'));
		}else{
			echo json_encode(array('status' => 403));
		}
	}

	public function axconfiguraciones_pruebas(){		
		//$lista = $this->serv_ejecucion_app->exe_obtener_lista_ordenado('*', 'private.traductores', 'sal, ASC',20);
		/*$this->serv_ejecucion_app->arixkernel_obtener_datos('submenu_id, submenu', 'config.v_menu_subapp', 100, 0,'app_id = 1002 AND rol >= 4','',array('submenu_id','submenu'));
		$lista = $this->serv_cifrado->cod_cifrar_ids_matrices($lista);*/
		$lista = $this->serv_ejecucion_app->arixkernel_obtener_datos_xxx3();
		print_r($lista);		
	}
	public function employees_add(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_configuraciones/empleados_add');
		}
		else{
			show_404();
		}
	}
	public function sucursales_sub2(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_configuraciones/sucursales_sub2');
		}
		else{
			show_404();
		}
	}
	public function sucursales_sub3(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_configuraciones/sucursales_sub3');
		}
		else{
			show_404();
		}
	}
	public function config_pruebas(){
		$this->load->library('serv_ejecucion_app');
		$array_tabla_tupla = $this->serv_ejecucion_app->exe_contruir_consulta(array(
            'config.sucursales'=>'sucursal_id,numero,nombre,direccion,estado',
            'config.subcategorias'=>'subcategoria',
            'config.categorias'=>'categoria',
            'private.distritos'=>'distrito'
        ), array(1,0,0,1));
		print_r($array_tabla_tupla);	
		/*$js = $this->serv_ejecucion_app->exe_cargar_axjs(array('axjs-validate-p1','axjs-validate-p2'));
		print_r($js);	*/	
	}
}