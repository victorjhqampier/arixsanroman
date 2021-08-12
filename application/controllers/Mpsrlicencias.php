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
		$this->load->library('serv_administracion_usuarios');
		$css = $this->serv_ejecucion_app->exe_cargar_axcss(array('axcss-dataTables','axcss-timepicker'));		
		$js = $this->serv_ejecucion_app->exe_cargar_axjs(array('axjs-dataTables','axjs-validate-p1','axjs-validate-p2','axjs-mask','axjs-timepicker','mpsr-arixjs', 'axjs-chart'));
		$js = array($js,$css);
		$this->load->view('arixshellbase',compact('js'));
	}

	//---------------------*****LOAD PAGE SECTION****************-----------------
	public function mpsrdashboard(){
		$this->load->view('app_mprslicencias/resumen');
    }
    public function compania(){
		$this->load->view('app_mprslicencias/empresas');
	}
	public function vehicles(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/vehiculos');
		}else{
			show_404();
		}
	}
	public function responsability(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/responsabilidad');
		}else{
			show_404();
		}
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
	public function licencias(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/licencias');
		}else{
			show_404();
		}
	}
	public function licpendientes(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/licpendientes');
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
	public function temp_vehicleadd(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/templates/vehicle_add');
		}else{
			show_404();
		}
	}
	public function temp_driveradd(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/templates/driver_add');
		}else{
			show_404();
		}
	}	
	public function acthehiculos(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/templates/driver_add');
		}else{
			show_404();
		}
	}
	public function actvehiculos(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/templates/vehicle_add');
		}else{
			show_404();
		}
	}
	public function evaluations(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/evaluaciones');
		}else{
			show_404();
		}
	}
	public function evaluations_show(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/evaluaciones_show');
		}else{
			show_404();
		}
	}
	public function vehicles_search(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/vehiculos_bysearch');
		}else{
			show_404();
		}
	}
	public function vehicles_add(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/vehiculos_add');
		}else{
			show_404();
		}
	}
	public function vehicles_add_show(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/vehiculos_add_show');
		}else{
			show_404();
		}
	}
	public function vehicles_add_form(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/vehiculos_add_form');
		}else{
			show_404();
		}
	}
	//---------------------*****PRIVATE SECTION****************-----------------
	//1=placa, 2=dni, 3=ruc
	private function mpsr_post_check_byplaca($placa){//verifica si un vehiculo(placa) tiene una asociacion vigente a alguna empresa
		$consulta = array(
				array(
					'cer.ncertificado,cer.certificado_id, cer.empresa_id,cer.vehiculo_id,emp.ruc'
				),			
				array(
					'public.certificados cer',
					'public.vehiculos veh',
					'public.empresas emp'
				),			
				array(
					'NULL',
					'cer.vehiculo_id = veh.vehiculo_id',
					'cer.empresa_id = emp.empresa_id'
				)			
		);
		$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('cer.estado'=>true, 'expirated'=>false,'veh.placa'=>$placa),array('cer.fregistro','DESC'));
		if(!empty($consulta)){
				$consulta = $consulta[0];
				return array('status'=>true,'certificado'=>$consulta->certificado_id,'empresa'=>$consulta->empresa_id,'vehiculo'=>$consulta->vehiculo_id,'data'=>$consulta->ncertificado,'ruc'=>$consulta->ruc);
		}else{
				return array('status'=>false);
		}
	}
	
	//---------------------*****GET - SELECT* SECTION****************-----------------

	public function mpsr_get_activeemp(){
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){			
			//$this->load->library('serv_cifrado');
			//$this->load->library('serv_administracion_usuarios');		 
			//$this->load->model('arixkernel');
			$print = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtdata')));
			$print = $print == 77? false : true;
			//consulta construida por la funcion exe_construir_consultas
			$sucu = $this->serv_administracion_usuarios->use_obtener_sucursal_id_actual();			
			$consulta = array(
				array (
					'aut.nresolucion,aut.aufin,aut.factualizacion fecha, aut.nvehiculos numv',
					'emp.empresa_id axuidemp,emp.ruc,emp.nombre,emp.rsocial',
					'cla.code'
				),
				array (
					'public.autorizaciones aut',
					'public.empresas emp',
					'public.clasificaciones cla'
				),
				array (
					'NULL',
					'aut.empresa_id = emp.empresa_id',
					'aut.clasificacion_id = cla.clasificacion_id'
				)
			);
			$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('emp.estado'=>true, 'aut.estado'=>true, 'aut.expirated'=>$print,'cla.sucursal_id'=>$sucu));
			for ($i=0; $i < count($consulta); $i++) { 
				$consulta[$i]->axuidemp= $this->serv_cifrado->cod_cifrar_cadena($consulta[$i]->axuidemp);
				$consulta[$i]->aufin = date("d-m-Y", strtotime($consulta[$i]->aufin));
			}
			echo json_encode($consulta);
		}else{
			show_404();
		}
	}
	public function mpsr_get_imp_licencias(){
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$print = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtdata')));
			$sucu = $this->serv_administracion_usuarios->use_obtener_sucursal_id_actual();
			$print = $print == 77? false : true;		
			$consulta = array(
				array(
					'mps.mpsrlicencia_id axlicid,mps.fregistro,mps.nmpsrlicencias licencia,cer.ncertificado certificado',
					'veh.placa,hma.hmarca,veh.modelo',
					"concat ('(',veh.fanio,') ',veh.color,', ',veh.nasientos,' As. - ',veh.clase) descript",
					"concat(emp.ruc,' - ',emp.nombre) emp"
				),
				array(
					'public.mpsrlicencias mps',
					'public.certificados cer',
					'public.vehiculos veh',
					'private.hmarcas hma',
					'public.empresas emp'
				),
				array(
					'NULL',
					'mps.certificado_id = cer.certificado_id',
					'cer.vehiculo_id = veh.vehiculo_id',
					'veh.hmarca_id = hma.hmarca_id',
					'cer.empresa_id = emp.empresa_id'
				)
			);
			$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('mps.estado'=>$print, 'mps.expirated'=>false, 'mps.sucursal_id'=>$sucu));
			for ($i=0; $i < count($consulta); $i++) { 
				$consulta[$i]->axuidemp= $this->serv_cifrado->cod_cifrar_cadena($consulta[$i]->axlicid);
			}
			echo json_encode($consulta);
		}else{
			show_404();
		}
	}
	public function mpsr_get_activeemp_byruc(){
		if ($this->input->is_ajax_request() && $this->input->post('txtdataruc')){
			$ruc = strrev($this->input->post('txtdataruc'));
			$sucu = $this->serv_administracion_usuarios->use_obtener_sucursal_id_actual();			
			$consulta = array(
				array (
					'aut.nresolucion,aut.aufin,aut.nvehiculos numv,aut.servicio_id servicio',
					'emp.empresa_id axuidemp,emp.ruc,emp.nombre,emp.rsocial,emp.telefono,emp.direccion',
					'cla.code'
				),
				array (
					'public.autorizaciones aut',
					'public.empresas emp',
					'public.clasificaciones cla'
				),
				array (
					'NULL',
					'aut.empresa_id = emp.empresa_id',
					'aut.clasificacion_id = cla.clasificacion_id'
				)
			);
			$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('aut.estado'=>true, 'aut.expirated'=>false,'emp.ruc'=>$ruc, 'emp.estado'=>true, 'cla.sucursal_id'=>$sucu),array('aut.aufin','DESC'));
			if(!empty($consulta)){//empty porque es un array
				$consulta = $consulta[0];
				$consulta->axuidemp = $this->serv_cifrado->cod_cifrar_cadena($consulta->axuidemp);
				$consulta->aufin = date("d-m-Y", strtotime($consulta->aufin));
				$sucu = $this->arixkernel->arixkernel_obtener_data_by_id('descripcion', 'servicios', $consulta->servicio);
				$consulta->servicio = $sucu->descripcion;
				echo json_encode($consulta);
			}else{
				echo json_encode(array('status'=>false));//sin resultados
			}
		}else{
			show_404();
		}
	}
	public function mpsr_get_activeemp_byplaca(){
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$ruc = $this->mpsr_post_check_byplaca(strrev($this->input->post('txtdata')));
			//$ruc = $this->mpsr_post_check_byplaca('X2H449');
			$sucu = $this->serv_administracion_usuarios->use_obtener_sucursal_id_actual();			
			$consulta = array(
				array (
					'aut.nresolucion,aut.aufin,aut.nvehiculos numv,aut.servicio_id servicio',
					'emp.empresa_id axuidemp,emp.ruc,emp.nombre,emp.rsocial,emp.telefono,emp.direccion',
					'cla.code'
				),
				array (
					'public.autorizaciones aut',
					'public.empresas emp',
					'public.clasificaciones cla'
				),
				array (
					'NULL',
					'aut.empresa_id = emp.empresa_id',
					'aut.clasificacion_id = cla.clasificacion_id'
				)
			);
			if($ruc['status']==true){
				$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('aut.estado'=>true, 'aut.expirated'=>false,'emp.ruc'=>$ruc['ruc'], 'emp.estado'=>true, 'cla.sucursal_id'=>$sucu),array('aut.aufin','DESC'));
				if(!empty($consulta)){//empty porque es un array
					$consulta = $consulta[0];
					$consulta->axuidemp = $this->serv_cifrado->cod_cifrar_cadena($consulta->axuidemp);
					$consulta->aufin = date("d-m-Y", strtotime($consulta->aufin));
					$sucu = $this->arixkernel->arixkernel_obtener_data_by_id('descripcion', 'servicios', $consulta->servicio);
					$consulta->servicio = $sucu->descripcion;
					echo json_encode($consulta);
				}else{
					echo json_encode(array('status'=>false));//sin resultados
				}
			}else{
				echo json_encode(array('status'=>'pene'));//sin resultados
			}
		}else{
			show_404();
		}
	}
	public function mpsr_get_vehicle_bycertif(){
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$certif = strrev($this->input->post('txtdata'));			
			$consulta = array(
				array(
					'cer.certificado_id axidcert,cer.ncertificado,veh.placa,emp.ruc',
					"concat(hma.hmarca,' ',veh.modelo) marca",
					"concat('(',veh.fanio,') - ',veh.color,' - ',veh.nasientos,' Asientos') descripcion",
					"concat(emp.nombre,' - ',emp.rsocial) emp"
				),
				array(
					'public.certificados cer',
					'public.vehiculos veh',
					'private.hmarcas hma',
					'public.empresas emp'
				),
				array(
					'NULL',
					'cer.vehiculo_id = veh.vehiculo_id',
					'veh.hmarca_id = hma.hmarca_id',
					'cer.empresa_id = emp.empresa_id'
				)
			);
			$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('cer.supdate'=>true, 'cer.estado'=>true, 'cer.expirated'=>false,'cer.ncertificado'=>$certif),array('cer.fregistro','ASC'));
			if(!empty($consulta)){//empty porque es un array
				$consulta = $consulta[0];
				$consulta->axidcert = $this->serv_cifrado->cod_cifrar_cadena($consulta->axidcert);
				echo json_encode($consulta);
			}else{
				echo json_encode(array('status'=>false));//sin resultados
			}
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
			$sucu = $this->serv_administracion_usuarios->use_obtener_sucursal_id_actual();
			$consulta = $this->arixkernel->arixkernel_obtener_simple_data("clasificacion_id axuidemp, concat (code,' | ',substring(descripcion,0,25)) descripcion",'clasificaciones',0,array('sucursal_id'=>$sucu));
			for ($i=0; $i < count($consulta); $i++) { 
				$consulta[$i]->axuidemp= $this->serv_cifrado->cod_cifrar_cadena($consulta[$i]->axuidemp);
			}
			echo json_encode($consulta);
		}else{
			show_404();
		}
	}
	public function mpsr_get_class_licencia(){
		if($this->input->is_ajax_request()){
			$sucu = $this->serv_administracion_usuarios->use_obtener_sucursal_id_actual();
			$consulta = $this->arixkernel->arixkernel_obtener_simple_data("lclasecategoria_id axuidemp, concat (lclasecategoria,' | (',substring(descripcion,0,55),'...)') descripcion",'lclasecategorias',0,array('sucursal_id'=>$sucu));
			for ($i=0; $i < count($consulta); $i++) { 
				$consulta[$i]->axuidemp= $this->serv_cifrado->cod_cifrar_cadena($consulta[$i]->axuidemp);
			}
			echo json_encode($consulta);
		}else{
			show_404();
		}
	}
	public function mpsr_get_eval_options(){
		if($this->input->is_ajax_request()){
			$sucu = $this->serv_administracion_usuarios->use_obtener_sucursal_id_actual();
			$consulta = $this->arixkernel->arixkernel_obtener_simple_data("ccondicion_id axuidemp,ccondicion",'ccondiciones',0,array('ccondicion_id>'=>2));
			for ($i=0; $i < count($consulta); $i++) { 
				$consulta[$i]->axuidemp= $this->serv_cifrado->cod_cifrar_cadena($consulta[$i]->axuidemp);
			}
			echo json_encode($consulta);
		}else{
			show_404();
		}
	}
	public function mpsr_get_hbrands(){
		if($this->input->is_ajax_request()){
			$consulta = $this->arixkernel->arixkernel_obtener_simple_data("hmarca_id axuidemp, hmarca",'private.hmarcas');
			for ($i=0; $i < count($consulta); $i++) { 
				$consulta[$i]->axuidemp= $this->serv_cifrado->cod_cifrar_cadena($consulta[$i]->axuidemp);
			}
			echo json_encode($consulta);
		}else{
			show_404();
		}
	}
	public function mpsr_get_vehicle_byemp(){
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$emp_id = $this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtdata'));
			$consulta = array(
				array(
					'cer.certificado_id axuidemp,cer.ccondicion_id cert_status,cer.ncertificado cert_num',
					"veh.placa,veh.modelo,concat('(',veh.fanio,') - ',veh.color,' - ',veh.nasientos,' Asientos') descripcion",
					'hma.hmarca',
					'con.nlicencia driv_licen,con.estado driv_status',
					"concat(per.documento,' - ',per.nombres,', ',per.paterno,' ',per.materno) driv_data"
				 ),
				array(
					'public.x_conductores x_c',
					'public.certificados cer',
					'public.vehiculos veh',
					'private.hmarcas hma',
					'public.conductores con',
					'private.personas per'
				 ),
				array(
					'NULL',
					'x_c.certificado_id = cer.certificado_id',
					'cer.vehiculo_id = veh.vehiculo_id',
					'veh.hmarca_id = hma.hmarca_id',
					'x_c.conductor_id = con.conductor_id',
					'con.persona_id = per.persona_id'
				 )
			);
			$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('x_c.estado'=>true,'cer.estado'=>true,'cer.empresa_id'=>$emp_id),array('cer.certificado_id','ASC'));			
			if(!empty($consulta)){
				for ($i=0; $i < count($consulta); $i++) { 
					$consulta[$i]->axuidemp= $this->serv_cifrado->cod_cifrar_cadena($consulta[$i]->axuidemp);
					$consulta[$i]->cert_status = $consulta[$i]->cert_status == 3? true : false;
				}
				echo json_encode($consulta);
			}else{
				echo json_encode(array('status'=>false));
			}				
		}else{
			show_404();
		}
	}
	//---------------------*****POST - DUPLICATE_CHECK SECTION****************-----------------

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
	public function mpsr_post_duplicatevehi(){
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$consulta = $this->arixkernel->arixkernel_obtener_data_by_id('vehiculo_id', 'vehiculos', false, array('placa'=>$this->input->post('txtdata')));
			if(!is_null($consulta)){
				echo json_encode(array('status'=>true));
			}else{
				echo json_encode(array('status'=>false));
			}
		}else{
			show_404();
		}
	}	
	public function mpsr_post_duplicate_certifvehi(){//verifica si está registrado correctamnet(vehiculo y propietario)
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$placa = $this->input->post('txtdata');
			$dupdate = $this->mpsr_post_check_byplaca($placa);//la placa está asociado a una empresa actualmente??
			if($dupdate['status']==false){//no está asociado
				$consulta = array(
					array(
						"veh.vehiculo_id axuidvehi,concat(veh.placa,' - [',cla.code,'] ',hma.hmarca,' ',veh.modelo,' (',veh.fanio,', ',veh.color,', ',veh.nasientos,' As.)') descripcion",
						"concat ('(',per.documento,' - ',per.nombres,', ',per.paterno,' ',per.materno,')') ownere",
						'cla.code'
					),
					array(
						'public.x_propietarios x_p',
						'private.personas per',
						'public.vehiculos veh',
						'private.hmarcas hma',
						'public.clasificaciones cla'
					),			
					array(
						'NULL',
						'x_p.persona_id = per.persona_id',
						'x_p.vehiculo_id = veh.vehiculo_id',
						'veh.hmarca_id = hma.hmarca_id',
						'veh.clasificacion_id = cla.clasificacion_id'
					)			
				);
				$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('x_p.estado'=>true,'veh.placa'=>$placa),array('x_p.fregistro','DESC'));
				if(!empty($consulta)){//empty porque es un array
					$consulta = $consulta[0];
					echo json_encode(array('status'=>true,'id'=>$this->serv_cifrado->cod_cifrar_cadena($consulta->axuidvehi),'data'=>$consulta->descripcion.' '.$consulta->ownere,'code'=>$consulta->code));
				}else{
					echo json_encode(array('status'=>false));//disponible para registrarlo
				}
			}else{
				echo json_encode(array('status'=>null,'data'=>'El vehiculo se encuentra asociado a una empresa actualmente...'));
			}			
		}else{
			show_404();
		}
	}
	public function mpsr_post_duplicate_certifdriver(){//verifica si está registrado correctamnet(vehiculo y propietario)
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$consulta = array(
				array(
					'con.conductor_id axuiddriver',
					"concat (per.documento,' - ',per.nombres,', ',per.paterno,' ',per.materno) driver",
					"concat ('(',lcl.lclasecategoria,'-',con.nlicencia,')') license"
				),
				array(
					'public.conductores con',
					'private.personas per',
					'public.lclasecategorias lcl'
				),
				array(
					'NULL',
					'con.persona_id = per.persona_id',
					'con.lclasecategoria_id = lcl.lclasecategoria_id'
				)
			);
			$sucu = $this->serv_administracion_usuarios->use_obtener_sucursal_id_actual();
			$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('con.estado'=>true,'per.documento'=>$this->input->post('txtdata'),'lcl.sucursal_id'=>$sucu),array('con.fregistro','DESC'));
			if(!empty($consulta)){//empty porque es un array
				$consulta = $consulta[0];
				echo json_encode(array('status'=>true,'id'=>$this->serv_cifrado->cod_cifrar_cadena($consulta->axuiddriver),'data'=>$consulta->license.' '.$consulta->driver));
			}else{
				echo json_encode(array('status'=>false));//disponible para registrarlo
			}
		}else{
			show_404();
		}
	}
	public function mpsr_post_duplicatedriver(){
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$consulta = $this->arixkernel->arixkernel_obtener_data_by_id('conductor_id', 'conductores', false, array('nlicencia'=>$this->input->post('txtdata')));
			if(!is_null($consulta)){
				echo json_encode(array('status'=>true));
			}else{
				echo json_encode(array('status'=>false));
			}
		}else{
			show_404();
		}
	}


	//---------------------*****POST - SAVE SECTION****************-----------------
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
			$tables = array('empresas','autorizaciones');
			$tables = $this->arixkernel->arixkernel_guargar_sequencial_data($datos,$tables);
			echo json_encode(array('status'=>$tables['status']));
		}else{
			show_404();
		}	
	}
	public function mpsr_post_save_eval(){
		if($this->input->is_ajax_request() && $this->input->post('txtcertifid')){
			$eval = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtevalclase')));
			//$eval = 3;
			$cert_id = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtcertifid')));
			//$cert_id = 8;	
			$datos = array(
				array(
					'ccondicion_id'=>$eval,
					'supdate'=>false,					
					'descripcion'=>$this->input->post('txtevalobserbations'),
					'factualizacion'=>date('Y-m-d H:i')
				),array(
					'certificado_id'=>$cert_id,
					'nmpsrlicencias'=>substr(date('Y'),2,2).random_int(10, 99).strtoupper(substr(uniqid(),-11)),
					'sucursal_id'=>$this->serv_administracion_usuarios->use_obtener_sucursal_id_actual()
				)
			);
			if($eval==3){//actualiza y guarda
				$tables = array('certificados','mpsrlicencias');//array('tabla_actualizar','tabla insertar');
				$tables = $this->arixkernel->arixkernel_actualizar_guardar_data($datos,$tables,array('certificado_id'=>$cert_id,'supdate'=>true));
				echo json_encode(array('status'=>$tables['status']));
			}else{//solo actualiza
				$datos[0] = array_merge($datos[0], array('estado'=>false,'expirated'=>true));
				$tables = $this->arixkernel->arixkernel_actualizar_simple_data($datos[0],'certificados',array('certificado_id'=>$cert_id,'supdate'=>true));
				echo json_encode(array('status'=>$tables['status']));
			}			
		}else{
			show_404();
		}
	}
	public function mpsr_post_vehicleadd(){
		if($this->input->is_ajax_request() && $this->input->post('txtvehireal')){
			$datos = array(
				array(
					'placa' => $this->input->post('txtvehireal'),
					'antplaca' => $this->input->post('txtvehipre'),				
					'serie' => $this->input->post('txtvehiserial'),
					'nmotor' => $this->input->post('txtvehiengine'),
					'hmarca_id' => intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtvehibrand'))),
					'modelo' => $this->input->post('txtvehimodel'),
					'color' => $this->input->post('txtvehicolor'),
					'fanio' => intval($this->input->post('txtvehiyear')),
					'peso' => intval($this->input->post('txtvehiweigth')),
					'nasientos' => intval($this->input->post('txtvehiseats')),
					'clasificacion_id' => intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtvehiclass'))),
					'clase' => $this->input->post('txtvehidescript')
				),
				array(
					//'vehiculo_id' => $this->input->post('txtvehiownerid') -- EL KERNEL LO SOBRE ENTIENDE Y LO DEDUCE DEL PRIMER array
					'persona_id' => intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtvehiownerid')))
				)			
			);
			$tables = array('vehiculos','x_propietarios');
			$tables = $this->arixkernel->arixkernel_guargar_sequencial_data($datos,$tables);
			echo json_encode(array('status'=>$tables['status'],'id'=>$this->serv_cifrado->cod_cifrar_cadena($tables['ids'][0])));
		}else{
			show_404();
		}
	}
	//agregar conductores
	public function mpsr_post_driveradd(){
		if($this->input->is_ajax_request() && $this->input->post('txtdriverownerid')){
			$data = array(
				'nlicencia' => $this->input->post('txtdriverlicense'),
				'persona_id' => intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtdriverownerid'))),
				'lclasecategoria_id' => intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtdrivercatclass'))),
				'vigentefin' => date("Y-m-d", strtotime(str_replace('/', '-',$this->input->post('txtdrivervigencia'))))
			);
			$data = $this->arixkernel->arixkernel_guargar_simple_data($data, 'conductores');
			$data['id']=$this->serv_cifrado->cod_cifrar_cadena($data['id']);
			echo json_encode($data);
		}else{
			show_404();
		}
	}
	//para agregar certificados
	public function mpsr_post_certificado_add(){
		if($this->input->is_ajax_request() && $this->input->post('txtcertifempid')){
			//antes debes comparar cantidad de vehiculos autorizados para guardar
			$datos = array(
				array(
					'vehiculo_id' => intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtcertifvehiplacaid'))),
					'empresa_id' => intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtcertifempid'))),					
					'lugarisp' => $this->input->post('txtcertifplace'),
					'fechaisp' => date("Y-m-d H:i", strtotime(str_replace('/', '-',$this->input->post('txtcertifdate')))),
					'ncertificado'=>substr(date('Y'),2,2).strtoupper(substr($this->input->post('txtcertifvehiplacadoc'),0,2).substr(uniqid(), -11))
				),
				array(
					//'certificado_id' => es proporcionado por arixkernel
					'conductor_id' => intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtcertifdriverid')))
				)			
			);
			$tables = array('certificados','x_conductores');
			$tables = $this->arixkernel->arixkernel_guargar_sequencial_data($datos,$tables);
			echo json_encode(array('status'=>$tables['status']));
		}else{
			show_404();
		}
	}
	
	//---------------------*****TEST SECTION****************-----------------
	public function mpsr_pruebas(){
		//$data = array('nombre' => 'My title 47');
		//echo $this->arixkernel->arixkernel_guargar_simple_data($data,'pruebas');
		/*$datas = array(
			array('nombre'=>'extoy actua_7'),
			array(
				'nombre'=>'prueba_b 7',
				'prueba_id'=>1
				)
		);		
		$tables = array('pruebas','bpruebas');
		print_r($this->arixkernel->arixkernel_actualizar_guardar_data($datas,$tables,array('prueba_id'=>11)));*/
		
		/*$this->load->library('serv_administracion_usuarios');
		echo $this->serv_administracion_usuarios->use_obtener_sucursal_id_actual();*/
		/*$this->load->library('serv_ejecucion_app');
		$array_tabla_tupla = $this->serv_ejecucion_app->exe_contruir_consulta(array(
            'public.autorizaciones'=>'nresolucion,nvehiculos,aufin,factualizacion',
            'public.empresas'=>'empresa_id,ruc,nombre,rsocial',
            'public.clasificaciones'=>'code'
		), array(1,0,1));*/
		//$array_tabla_tupla  = $this->arixkernel->arixkernel_obtener_complex_data($array_tabla_tupla,0,array('emp.estado'=>true, 'aut.estado'=>true));
		//print_r($array_tabla_tupla);
		//$this->load->library('serv_cifrado');		
		print_r ($this->serv_cifrado->cod_cifrar_cadena(78));
		//echo ($this->serv_cifrado->cod_decifrar_cadena('54F747562B763dDV1YkVMQ3dDUy8rVEtNRHNZM01sdz09'));
		//echo(strtoupper(uniqid('ABC')));
		//echo json_encode(array('status'=>true));
		//echo(substr('123abc',-3).substr(uniqid(), 1)); // devuelve "de"
		
		//print_r($this->mpsr_post_check_byplaca('Z3Z071'));

		//echo (substr(date('Y'),2).random_int(10, 99).substr(uniqid()));
		//echo (strtoupper(substr($this->input->post('txtcertifvehiplacadoc'),-3).substr(uniqid(), 1)));
		//echo (date("Y-m-d", strtotime(str_replace('/', '-','19/7/2021'))));
		/*$this->load->library('serv_ejecucion_app');
		$array_tabla_tupla = $this->serv_ejecucion_app->exe_contruir_consulta(array(			
			'public.mpsrlicencias'=>'mpsrlicencia_id,nmpsrlicencias,fregistro',
			'public.certificados'=>'ncertificado',
			'public.vehiculos'=>'placa,modelo,color,nasientos,fanio,clase',
			'private.hmarcas'=>'hmarca',
			'public.empresas'=>'empresa_id	ruc	nombre'
			
		), array(1,0,0,0,1));
		print_r($array_tabla_tupla);*/

	}
}