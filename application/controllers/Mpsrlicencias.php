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
	public function mpsrhistoriales(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/axhistoriales');
		}else{
			show_404();
		}
	}
    public function compania(){
		$this->load->view('app_mprslicencias/axempresas');
	}
	public function mpsrchangeautorization(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/axrenovaciones');
		}else{
			show_404();
		}
	}
	public function mpsrgeneralchange(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/axmodificaciones');
		}else{
			show_404();
		}
	}
	public function mpsrdoaction(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/axinhahilitar');
		}else{
			show_404();
		}
	}
	public function vehicles(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/axvehiculos');
		}else{
			show_404();
		}
	}
	public function mpsrcanceljoin(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/axdesligarvehicle');
		}else{
			show_404();
		}
	}
	public function mpsrchangevehicle(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/axmodificacionesvehiculos');
		}else{
			show_404();
		}
	}
	public function mpsrputdownvehicle(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/axdardebaja');
		}else{
			show_404();
		}
	}
	public function responsability(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/axhabilitarconductor');
		}else{
			show_404();
		}
	}
	public function mpsrputdowndriver(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/axinhabilitardriver');
		}else{
			show_404();
		}
	}
	public function mpsrcertreals(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/axcertificacionactual');
		}else{
			show_404();
		}
	}
	public function mpsrcertrenew(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/axrenovarcertificado');
		}else{
			show_404();
		}
	}
	public function mpsrcronogram(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/axcronograma');
		}else{
			show_404();
		}
	}
	public function mpsrprograme(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/axprogramar');
		}else{
			show_404();
		}
	}
	public function mpsrrepogram(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/axreprogramar');
		}else{
			show_404();
		}
	}
	public function evaluations(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/axevaluaciones');
		}else{
			show_404();
		}
	}
	public function licencias(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/axlicencias');
		}else{
			show_404();
		}
	}
	public function licpendientes(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/axlicpendientes');
		}else{
			show_404();
		}
	}
	public function mpsrduplicate(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/axduplicatetuc');
		}else{
			show_404();
		}
	}
	public function mpsrsuspend(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/axsuspendertuc');
		}else{
			show_404();
		}
	}
	/*---------------- INICIA LA LOGICA DEL SISTEMA --------------------*/
	public function compania_add(){//OK
		$this->load->view('app_mprslicencias/empresas_add');
	}	
	public function compania_view(){//OK
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/empresas_view');
		}else{
			show_404();
		}
	}
	public function renovacion_add(){//OK
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/renovacion_add');
		}else{
			show_404();
		}
	}
	public function renovacion_add_form(){//OK
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/renovacion_add_form');
		}else{
			show_404();
		}
	}
	public function certificados_add_show(){//ok
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/certificacion_add');
		}else{
			show_404();
		}
	}
	public function recertificados_add_show(){//ok
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/recertificacion_add');
		}else{
			show_404();
		}
	}
	public function temp_certification_eval(){//OK
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/templates/certifi_add');
		}else{
			show_404();
		}
	}
	public function temp_programe_certif(){//OK
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/templates/certif_programe');
		}else{
			show_404();
		}
	}
	public function temp_vehicleadd(){//OK
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
	public function temp_historial_certif(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_mprslicencias/templates/certif_history');
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
	private function mpsr_private_check_placa($placa){//OK verifica si un vehiculo(placa) tiene una asociacion vigente a alguna empresa
		$consulta = array(
				array(
					'cer.asociacion_id,cer.empresa_id,cer.vehiculo_id'
				),			
				array(
					'public.asociaciones cer',
					'public.vehiculos veh'
					//'public.empresas emp'
				),			
				array(
					'NULL',
					'cer.vehiculo_id = veh.vehiculo_id'
					//'cer.empresa_id = emp.empresa_id'
				)			
		);	
		$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('cer.estado'=>true, 'veh.placa'=>$placa)/*,array('cer.fregistro','DESC')*/);
		if(!empty($consulta)){
				$consulta = $consulta[0];
				return array('status'=>true, 'data'=>$consulta);//esta asociado a empresa
		}else{
				return array('status'=>false);//no esta asociado
		}
	}
	private function mpsr_private_check_driver($empresa_id,$dni){//OK verifica si un vehiculo(placa) tiene una asociacion vigente a alguna empresa
		$consulta = array(
				array(
					'con.conductor_id,con.estado'
				),			
				array(
					'public.asociaciones aso',
					'public.conductores con',
					'private.personas per'
				),			
				array(
					'NULL',
					'aso.conductor_id = con.conductor_id',
					'con.persona_id = per.persona_id'
				)			
		);	
		$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('aso.estado'=>true,'aso.empresa_id'=>$empresa_id,'per.documento'=>$dni));
		if(!empty($consulta)){
				$consulta = $consulta[0];
				return array('status'=>true, 'data'=>$consulta);//esta asociado a empresa
		}else{
				return array('status'=>false);//no esta asociado
		}
	}

	private function mpsr_get_cronograme_details($array_to_add){
		//1: Conductor dni
		$conductor = array(
			array(
				"concat(per.nombres,', ',per.paterno,' ',per.materno) con_persona",
				'per.documento con_dni,con.nlicencia con_licencia,lcl.lclasecategoria con_categoria'					
			),
			array('public.conductores con','private.personas per','public.lclasecategorias lcl'),
			array('NULL','con.persona_id = per.persona_id','con.lclasecategoria_id = lcl.lclasecategoria_id')
		);
		//2: Propietario dni
		$propietario = array(
			array(
				'per.documento prop_dni, per.telefono prop_telefono',
				"concat(per.nombres,', ',per.paterno,' ',per.materno) prop_persona",
				"concat(per.direccion,' - ',dis.distrito) prop_direccion"								
			),
			array('public.x_propietarios xpr','private.personas per','private.distritos dis'),
			array('NULL','xpr.persona_id = per.persona_id','per.distrito_id = dis.distrito_id')
		);
		//4: Servicio
		$servicio = array(
			array('ser.descripcion serv_servicio'),
			array('public.autorizaciones aut','public.servicios ser'),
			array('NULL','aut.servicio_id = ser.servicio_id')
		);

		$servicio = $this->arixkernel->arixkernel_obtener_complex_data($servicio,0,array('aut.expirated'=>false,'aut.estado'=>true,'aut.empresa_id'=>$array_to_add[0]->empresa_id));
		$representante = $this->arixkernel->arixkernel_obtener_data_by_id("documento repre_dni,concat(nombres,', ',paterno,' ',materno) repre_persona", 'private.personas', false, array('persona_id'=>$array_to_add[0]->administrador_id));
		
		$servicio = (array)$servicio[0];
		$representante = (array)$representante;

		for($i=0;$i<count($array_to_add);$i++){
			$temp1 = $this->arixkernel->arixkernel_obtener_complex_data($conductor,0,array('con.conductor_id'=>$array_to_add[$i]->conductor_id));
			$temp2 = $this->arixkernel->arixkernel_obtener_complex_data($propietario,0,array('xpr.estado'=>true,'xpr.vehiculo_id'=>$array_to_add[$i]->vehiculo_id));
			$array_to_add[$i]=array_merge((array)$array_to_add[$i],(array)$temp1[0],(array)$temp2[0],$servicio, $representante);
		}
		return $array_to_add;
	}
	/*private function mpsr_private_check_ruc($ruc, $year){//OK verifica si un vehiculo(placa) tiene una asociacion vigente a alguna empresa
		$consulta = array(
			array (
				'aut.autorizacion_id,emp.empresa_id,aut.auinicio,aut.aufin'
			),
			array (				
				'public.empresas emp',
				'public.autorizaciones aut'
			),
			array (
				'NULL',
				'emp.empresa_id = aut.empresa_id'
			)
		);
		$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('emp.ruc'=>$ruc, 'emp.estado'=>true, 'aut.estado'=>true,"date_part('year', aut.auinicio) <= "=>$year,"date_part('year', aut.aufin) >= "=>$year));
		//$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('aso.estado'=>true,'aso.empresa_id'=>$empresa_id,'per.documento'=>$dni));
		if(!empty($consulta)){
				$consulta = $consulta[0];
				return array('status'=>true, 'data'=>$consulta);//esta asociado a empresa
		}else{
				return array('status'=>false);//no esta asociado
		}
	}*/
	private function mpsr_private_check_rucToId($ruc){//OK verifica si un vehiculo(placa) tiene una asociacion vigente a alguna empresa
		$consulta = array(
			array (
				'aut.autorizacion_id,emp.empresa_id'
			),
			array (				
				'public.empresas emp',
				'public.autorizaciones aut'
			),
			array (
				'NULL',
				'emp.empresa_id = aut.empresa_id'
			)
		);
		$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('emp.ruc'=>$ruc, 'emp.estado'=>true, 'aut.estado'=>true));
		//$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('aso.estado'=>true,'aso.empresa_id'=>$empresa_id,'per.documento'=>$dni));
		if(!empty($consulta)){
				$consulta = $consulta[0];
				return array('status'=>true, 'data'=>$consulta);//esta asociado a empresa
		}else{
				return array('status'=>false);//no esta asociado
		}
	}
	
	//---------------------*****GET - SELECT* SECTION****************-----------------

	public function mpsr_get_activeemp(){// OK
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){			
			$print = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtdata')));
			$print = $print == 77? false : true;
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
			$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('emp.estado'=>true, 'aut.estado'=>true, 'aut.advanced'=>false,'aut.expirated'=>$print,'cla.sucursal_id'=>$sucu));
			for ($i=0; $i < count($consulta); $i++) { 
				$consulta[$i]->axuidemp= $this->serv_cifrado->cod_cifrar_cadena($consulta[$i]->axuidemp);
				$consulta[$i]->aufin = date("d/m/Y", strtotime($consulta[$i]->aufin));
			}
			echo json_encode($consulta);
		}else{
			show_404();
		}
	}
	public function mpsr_get_active_renovacion(){// OK
		if ($this->input->is_ajax_request()){		
			$sucu = $this->serv_administracion_usuarios->use_obtener_sucursal_id_actual();			
			$consulta = array(
				array (
					"aut.nresolucion,to_char(aut.auinicio, 'DD/MM/YYYY') inicio, to_char(aut.aufin, 'DD/MM/YYYY') final,aut.factualizacion fecha, aut.nvehiculos numv",
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
			$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('emp.estado'=>true, 'aut.estado'=>true, 'aut.advanced'=>true,'aut.expirated'=>false,'cla.sucursal_id'=>$sucu));
			for ($i=0; $i < count($consulta); $i++) { 
				$consulta[$i]->axuidemp= $this->serv_cifrado->cod_cifrar_cadena($consulta[$i]->axuidemp);
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
					'public.asociaciones aso',
					'public.vehiculos veh',
					'public.hmarcas hma',
					'public.empresas emp'
				),
				array(
					'NULL',
					'mps.certificado_id = cer.certificado_id',					
					'cer.asociacion_id = aso.asociacion_id',
					'aso.vehiculo_id = veh.vehiculo_id',
					'veh.hmarca_id = hma.hmarca_id',
					'aso.empresa_id = emp.empresa_id'
				)
			);
			$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('mps.estado'=>$print, 'mps.expirated'=>false, 'mps.sucursal_id'=>$sucu));
			for ($i=0; $i < count($consulta); $i++) { 
				$consulta[$i]->axlicid= $this->serv_cifrado->cod_cifrar_cadena($consulta[$i]->axlicid);
			}
			echo json_encode($consulta);
		}else{
			show_404();
		}
	}

	public function mpsr_get_activeemp_byruc(){//OK
		if ($this->input->is_ajax_request() && $this->input->post('txtdataruc')){
			$ruc = strrev($this->input->post('txtdataruc'));
			$sucu = $this->serv_administracion_usuarios->use_obtener_sucursal_id_actual();			
			$consulta = array(
				array (
					'aut.autorizacion_id axuiaut,aut.nresolucion,aut.aufin,aut.nvehiculos numv,aut.servicio_id servicio,aut.estado status',
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
			$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('aut.estado'=>true, 'aut.expirated'=>false,'emp.ruc'=>$ruc, 'emp.estado'=>true, 'cla.sucursal_id'=>$sucu)/*,array('aut.aufin','ASC')*/);
			if(!empty($consulta)){//empty porque es un array
				$consulta = $consulta[0];
				$consulta->axuidemp = $this->serv_cifrado->cod_cifrar_cadena($consulta->axuidemp);
				$consulta->axuiaut = $this->serv_cifrado->cod_cifrar_cadena($consulta->axuiaut);
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
	public function mpsr_get_certification_byruc(){//OK repe
		if ($this->input->is_ajax_request() && $this->input->post('txtdataruc')){
			$ruc = strrev($this->input->post('txtdataruc'));
			$year = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtdata')));
			$year = $year == 1? date("Y") + 1: date("Y");
			//$ruc = '20387739417';
			$sucu = $this->serv_administracion_usuarios->use_obtener_sucursal_id_actual();			
			$consulta = array(
				array (
					'aut.nresolucion,aut.aufin,aut.nvehiculos numv,aut.servicio_id servicio,aut.estado status',
					'emp.empresa_id axuidemp,emp.ruc,emp.nombre,emp.rsocial,emp.telefono,emp.direccion',
					'cla.code,cla.clasificacion_id anio'
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
			$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('aut.estado'=>true, 'aut.expirated'=>false,"date_part('year', aut.auinicio) <="=>$year,"date_part('year', aut.aufin) >="=>$year,'emp.ruc'=>$ruc, 'emp.estado'=>true,'cla.sucursal_id'=>$sucu/*,"date_part('year', aut.aufin) >= "=>date('Y')*/));
			if(!empty($consulta)){//empty porque es un array
				$consulta = $consulta[0];
				$consulta->axuidemp = $this->serv_cifrado->cod_cifrar_cadena($consulta->axuidemp);
				//$consulta->axuiaut = $this->serv_cifrado->cod_cifrar_cadena($consulta->axuiaut);
				$consulta->aufin = date("d-m-Y", strtotime($consulta->aufin));
				$consulta->anio = $year;
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
	public function mpsr_get_certifiction_real(){//OK
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$empresa_id = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtdata')));	
			$advanced = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtdataextra')));
			$advanced = $advanced==1?false:true;		
			$consulta = $consulta = array(
				array (
					'cer.certificado_id axuid,cer.ncertificado,cer.fregistro fecha',
					'cco.ccondicion condicion, cer.ccondicion_id stcond',
					"concat('[',veh.placa,'] ',hma.hmarca,' ',veh.modelo) vehicle, concat('(',veh.fanio,') - ',veh.color,' - ',veh.nasientos,' Asientos') descripcion",
					"concat(to_char(cer.vigenciaini, 'DD/MM/YYYY'),' a ', to_char(cer.vigenciafin, 'DD/MM/YYYY')) vigencia"
				),
				array (					
					'public.certificados cer',
					'public.asociaciones aso',
					'public.ccondiciones cco',
					'public.vehiculos veh',
					'public.hmarcas hma'
				),
				array (
					'NULL',
					'cer.asociacion_id = aso.asociacion_id',
					'cer.ccondicion_id = cco.ccondicion_id',
					'aso.vehiculo_id = veh.vehiculo_id',
					'veh.hmarca_id = hma.hmarca_id'
				)
			);
			$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('cer.estado'=>true, 'cer.advanced'=>$advanced, 'aso.estado'=>true,'aso.empresa_id'=>$empresa_id));
			for ($i=0; $i < count($consulta); $i++) { 
				$consulta[$i]->axuid= $this->serv_cifrado->cod_cifrar_cadena($consulta[$i]->axuid);
			}
			echo json_encode($consulta);
		}else{
			show_404();
		}
	}
	/*public function mpsr_get_certificaction(){//OK
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$empresa = $this->arixkernel->arixkernel_obtener_data_by_id('empresa_id', 'empresas', false, array('ruc'=>strrev($this->input->post('txtdata'))));//obect
			$sucu = $this->serv_administracion_usuarios->use_obtener_sucursal_id_actual();			
			$consulta = array(
				array (
					'cer.certificado_id'
				),
				array (					
					'public.certificados cer',
					'public.asociaciones aso'
				),
				array (
					'NULL',
					'cer.asociacion_id = aso.asociacion_id'
				)
			);
			$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('aut.estado'=>true, 'aut.expirated'=>false,'emp.ruc'=>$ruc, 'emp.estado'=>true, 'cla.sucursal_id'=>$sucu));
			if(!empty($consulta)){//empty porque es un array
				$consulta = $consulta[0];
				$consulta->axuidemp = $this->serv_cifrado->cod_cifrar_cadena($consulta->axuidemp);
				$consulta->axuiaut = $this->serv_cifrado->cod_cifrar_cadena($consulta->axuiaut);
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
	}*/
	public function mpsr_get_activeemp_byplaca(){//ok
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$placa = $this->mpsr_private_check_placa(strrev($this->input->post('txtdata')));		
			if($placa['status']==true){
				$sucu = $this->serv_administracion_usuarios->use_obtener_sucursal_id_actual();			
				$consulta = array(
					array (
						'aut.autorizacion_id axuiaut,aut.nresolucion,aut.aufin,aut.nvehiculos numv,aut.servicio_id servicio,aut.estado status',
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
				$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('aut.estado'=>true, 'aut.expirated'=>false,'emp.empresa_id'=>$placa['data']->empresa_id, 'emp.estado'=>true, 'cla.sucursal_id'=>$sucu)/*,array('aut.aufin','DESC')*/);
				if(!empty($consulta)){//empty porque es un array
					$consulta = $consulta[0];
					$consulta->axuidemp = $this->serv_cifrado->cod_cifrar_cadena($consulta->axuidemp);
					$consulta->axuiaut = $this->serv_cifrado->cod_cifrar_cadena($consulta->axuiaut);
					$consulta->aufin = date("d-m-Y", strtotime($consulta->aufin));
					$sucu = $this->arixkernel->arixkernel_obtener_data_by_id('descripcion', 'servicios', $consulta->servicio);
					$consulta->servicio = $sucu->descripcion;
					echo json_encode($consulta);
				}else{
					echo json_encode(array('status'=>false));//sin resultados
				}
			}else{
				echo json_encode(array('status'=>false));//sin resultados
			}
		}else{
			show_404();
		}
	}




	public function mpsr_get_vehicle_bycertif(){//OK
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$certif = strrev($this->input->post('txtdata'));
			//$certif = '21A2299A8B473F1';			
			$consulta = array(
				array(
					'cer.certificado_id axidcert,cer.ncertificado,veh.placa,emp.ruc',
					"concat(hma.hmarca,' ',veh.modelo) marca",
					"concat('(',veh.fanio,') - ',veh.color,' - ',veh.nasientos,' Asientos') descripcion",
					"concat(emp.nombre,' - ',emp.rsocial) emp"
				),
				array(
					'public.certificados cer',
					'public.asociaciones aso',
					'public.vehiculos veh',
					'public.hmarcas hma',
					'public.empresas emp'
				),
				array(
					'NULL',
					'cer.asociacion_id = aso.asociacion_id',
					'aso.vehiculo_id = veh.vehiculo_id',
					'veh.hmarca_id = hma.hmarca_id',
					'aso.empresa_id = emp.empresa_id'
				)
			);
			$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('cer.ccondicion_id'=>3, 'cer.estado'=>true, 'cer.expired'=>false,'cer.ncertificado'=>$certif),array('cer.fregistro','ASC'));
			if(!empty($consulta)){//empty porque es un array
				$consulta = $consulta[0];
				$consulta->axidcert = $this->serv_cifrado->cod_cifrar_cadena($consulta->axidcert);
				echo json_encode(array_merge((array)$consulta,array('status'=>true)));
			}else{
				echo json_encode(array('status'=>false));//sin resultados
			}
		}else{
			show_404();
		}
	}
	public function mpsr_get_modalidad(){// OK
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
	public function mpsr_get_tipounidad(){// OK
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
			$consulta = $this->arixkernel->arixkernel_obtener_simple_data("ccondicion_id axuidemp,ccondicion",'ccondiciones',0,array('ccondicion_id>'=>3,'ccondicion_id<'=>7),array("ccondicion_id","asc"));
			for ($i=0; $i < count($consulta); $i++) { 
				$consulta[$i]->axuidemp= $this->serv_cifrado->cod_cifrar_cadena($consulta[$i]->axuidemp);
			}
			echo json_encode($consulta);
		}else{
			show_404();
		}
	}
	public function mpsr_get_hbrands(){//OK
		if($this->input->is_ajax_request()){
			$consulta = $this->arixkernel->arixkernel_obtener_simple_data("hmarca_id axuidemp, hmarca",'public.hmarcas');
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
			//1662C0C584302clpZS3FFWDUwaENkYys5RGxDUEplUT09
			$emp_id = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtdata')));
			//$emp_id = 3;
			$consulta = array(
				array(
					'aso.asociacion_id axuidemp,aso.estado status',
					"veh.placa,veh.modelo,concat(veh.clase,' (Año ',veh.fanio,') - ',veh.color,' - ',veh.nasientos,' Asientos') descripcion",
					'hma.hmarca',
					'con.estado driv_status',
					"concat(per.documento,' (',con.nlicencia,') - ',per.nombres,', ',per.paterno,' ',per.materno) driv_data"
				 ),
				array(
					'public.asociaciones aso',
					'public.vehiculos veh',
					'public.hmarcas hma',
					'public.conductores con',
					'private.personas per'
				 ),
				array(
					'NULL',
					'aso.vehiculo_id = veh.vehiculo_id',
					'veh.hmarca_id = hma.hmarca_id',
					'aso.conductor_id = con.conductor_id',
					'con.persona_id = per.persona_id'
				 )
			);
			$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('aso.estado'=>true,'aso.empresa_id'=>$emp_id),array('aso.asociacion_id','ASC'));			
			if(!empty($consulta)){
				for ($i=0; $i < count($consulta); $i++) { 
					$consulta[$i]->axuidemp= $this->serv_cifrado->cod_cifrar_cadena($consulta[$i]->axuidemp);
					//$consulta[$i]->cert_status = $consulta[$i]->cert_status == 3? true : false;
				}
				echo json_encode(array_merge($consulta,array('status'=>true)));
			}else{
				echo json_encode(array('status'=>false));
			}				
		}else{
			show_404();
		}
	}
	public function mpsr_get_programe_inspect(){
		if ($this->input->is_ajax_request()){
			$consulta = array(
				array(
					'emp.empresa_id axuidemp, emp.ruc, emp.direccion',
					"concat (emp.nombre,', ',substring(emp.rsocial,0,30),'...') empresa"
				 ),
				array(
					'public.certificados cer',
					'public.asociaciones aso',
					'public.empresas emp'
				 ),
				array(
					'NULL',
					'cer.asociacion_id = aso.asociacion_id',
					'aso.empresa_id = emp.empresa_id',
				 )
			);
			$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('cer.ccondicion_id'=>2,'cer.estado'=>true,'cer.fechaisp is null'=>null),'',array('emp.empresa_id'));			
			for ($i=0; $i < count($consulta); $i++) { 
				$consulta[$i]->axuidemp= $this->serv_cifrado->cod_cifrar_cadena($consulta[$i]->axuidemp);
			}
			echo json_encode($consulta);
							
		}else{
			show_404();
		}
	}
	public function mpsr_get_cronograme_inspect(){
		if ($this->input->is_ajax_request()){
			$empresa_id ='';
			$temp=[];
			$consulta = array(
				array(
					'emp.empresa_id axuidemp, emp.ruc',
					"concat (emp.nombre,', ',substring(emp.rsocial,0,30),'...') empresa",
					"to_char(cer.fechaisp, 'DD/MM/YYYY') inicio , cer.lugarisp"//problemas con order by
				),
				array(
					'public.certificados cer',
					'public.asociaciones aso',
					'public.empresas emp'
				),
				array(
					'NULL',
					'cer.asociacion_id = aso.asociacion_id',
					'aso.empresa_id = emp.empresa_id'
				)
			);
			$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('cer.ccondicion_id'=>3,'cer.estado'=>true,'cer.fechaisp is not null'=>null),array('cer.fechaisp','desc'));			
			for ($i=0; $i < count($consulta); $i++) {
				if($consulta[$i]->axuidemp != $empresa_id){
					$empresa_id = $consulta[$i]->axuidemp;
					$consulta[$i]->axuidemp= $this->serv_cifrado->cod_cifrar_cadena($consulta[$i]->axuidemp);
					array_push($temp,$consulta[$i]);
				}				
			}
			unset($consulta);
			echo json_encode($temp);
										
		}else{
			show_404();
		}
	}
	public function dQSmo1c2RoUFhzMXE3SHVhdz(){
		if ($this->input->post()){
			$empresa_id = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtdata')));
			$fecha = date("Y-m-d", strtotime(str_replace('/', '-',$this->input->post('txtdate'))));	
			$consulta = array(
				array(
					'cer.ncertificado,cer.lugarisp,cer.fechaisp',
					'aso.conductor_id',
					'veh.vehiculo_id,veh.placa',
					'emp.empresa_id,emp.administrador_id,emp.ruc,emp.nombre,emp.rsocial',
					"substring(concat(hma.hmarca,' ',veh.modelo,' ',veh.fanio,', ',veh.color),0,40) vehiculo"				
				),
				array('public.certificados cer','public.asociaciones aso','public.vehiculos veh','public.hmarcas hma','public.empresas emp'),
				array('NULL','cer.asociacion_id = aso.asociacion_id','aso.vehiculo_id = veh.vehiculo_id','veh.hmarca_id = hma.hmarca_id','aso.empresa_id = emp.empresa_id')
			);
			$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('cer.ccondicion_id'=>3,'cer.estado'=>true,'cer.fechaisp'=>$fecha,'aso.empresa_id'=>$empresa_id));
			if (!empty($consulta)){			
				$consulta = $this->mpsr_get_cronograme_details($consulta);
				//print_r($consulta);

				$this->load->library('serv_pdf_certification');
				$this->serv_pdf_certification->SetTitle("TUC San Roman Juliaca AxCorp");
				$this->serv_pdf_certification->AliasNbPages();

				for ($i=0; $i <count($consulta) ; $i++) {
					$this->serv_pdf_certification->AddPage(); 
					$this->serv_pdf_certification->tableDatos($consulta[$i]);
				}
				$this->serv_pdf_certification->Output("TUC-SanRoman-at_".date('d-m-Y H:i:s'), 'I');
			}else{
				show_404();
			}
		}else{
			show_404();
		}		
	}
	//---------------------*****POST - DUPLICATE_CHECK SECTION****************-----------------
	
	public function mpsr_post_renovacion(){// OK
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){
			//probar si la autorizacion actual vence, si: retornar info de todo: no:retornar status.false
			//probar si no tiene ya una renovacion de autorizacion -DEJA PASA --ERROR
			//concat(aut.aufin,'@',aut.autorizacion_id) extra
			$ruc= strrev($this->input->post('txtdata'));
			$sucu = $this->serv_administracion_usuarios->use_obtener_sucursal_id_actual();			
			$consulta = array(
				array (
					'emp.empresa_id axuidemp,emp.ruc,emp.nombre,emp.rsocial,emp.direccion,emp.telefono',
					'aut.nvehiculos,aut.horario,aut.frecuencia,aut.rutaini,aut.rutafin,aut.aufin,aut.estado status,aut.nresolucion',
					"concat(per.documento,' - ',per.nombres,', ',per.paterno,' ',per.materno) admindata, aut.autorizacion_id extra",
					"concat (cla.code,' | ',substring(cla.descripcion,0,25)) clasificacion, ser.descripcion servicio"
				),
				array ('public.autorizaciones aut','public.empresas emp','private.personas per','public.clasificaciones cla','public.servicios ser'),
				array ('NULL','aut.empresa_id = emp.empresa_id','emp.administrador_id = per.persona_id','aut.clasificacion_id = cla.clasificacion_id','aut.servicio_id = ser.servicio_id')
			);
			$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('aut.estado'=>true /*,'aut.advanced'=>false*/,"date_part('year', aut.aufin) <= "=>date('Y'),'emp.ruc'=>$ruc,'emp.estado'=>true,'cla.sucursal_id'=>$sucu));
			if(count($consulta)==1){
				$consulta=$consulta[0];
				$consulta->axuidemp = $this->serv_cifrado->cod_cifrar_cadena($consulta->axuidemp);
				$consulta->extra = $this->serv_cifrado->cod_cifrar_cadena($consulta->extra);
				$consulta->aufin = date('d/m/Y',strtotime($consulta->aufin));
				echo json_encode($consulta);
			}else{
				echo json_encode(array('status'=>false));
			}
		}else{
			show_404();
		}
	}
	public function mpsr_post_duplicateru(){// OK
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
	public function mpsr_post_duplicateres(){// OK
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
	public function mpsr_post_duplicate_asociation(){//OK
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$placa = strrev($this->input->post('txtdata'));
			//$placa = 'B1T269';
			$dupdate = $this->mpsr_private_check_placa($placa);//la placa está asociado a una empresa actualmente??
			if($dupdate['status']==false){//no está asociado
				$consulta = array(
                    array(
                        "veh.vehiculo_id axuidvehi,concat(veh.placa,' - [',cla.code,'] ',hma.hmarca,' ',veh.modelo,' (',veh.fanio,', ',veh.color,', ',veh.nasientos,' As.)') descripcion",
                        "concat ('(',per.documento,' - ',per.nombres,', ',per.paterno,' ',per.materno,')') ownere",
                        'cla.code'
                    ),
                    array(
                        'public.x_propietarios xpr',
                        'private.personas per',
                        'public.vehiculos veh',
                        'public.hmarcas hma',
                        'public.clasificaciones cla'
                    ),          
                    array(
                        'NULL',
                        'xpr.persona_id = per.persona_id',
                        'xpr.vehiculo_id = veh.vehiculo_id',
                        'veh.hmarca_id = hma.hmarca_id',
                        'veh.clasificacion_id = cla.clasificacion_id'
                    )           
                );
				$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('xpr.estado'=>true,'veh.estado'=>true,'veh.placa'=>$placa),array('xpr.fregistro','DESC'));
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
	public function mpsr_post_duplicate_driver(){//OK verifica si está registrado correctamnet(vehiculo y propietario)
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$dni = strrev($this->input->post('txtdata'));
			//$dni ='76265787';
			$emp_id = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtextra')));
			//$emp_id = intval($this->serv_cifrado->cod_decifrar_cadena('EED2ACD308FC7UnBvaUlCeDR2NWlHYTJ1V2VsYTFrQT09'));
			
			//primnero debe probar si ya trabaja para la empresa
			//tiene que estar activo/habilitado
			$consulta = $this->mpsr_private_check_driver($emp_id ,$dni);
			if($consulta['status']==false){//esta asociado a esta empresa
				$sucu = $this->serv_administracion_usuarios->use_obtener_sucursal_id_actual();
				$consulta = array(
					array(
						'con.conductor_id axuiddriver',
						"concat (per.documento,' (',lcl.lclasecategoria,' - ',con.nlicencia,') - ',per.nombres,', ',per.paterno,' ',per.materno) driver"
						//"concat ('(',lcl.lclasecategoria,'-',con.nlicencia,')') license"
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
				
				$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('con.estado'=>true,'per.documento'=>$dni,'lcl.sucursal_id'=>$sucu),array('con.fregistro','DESC'));
				if(!empty($consulta)){//empty porque es un array
					$consulta = $consulta[0];
					echo json_encode(array('status'=>true,'id'=>$this->serv_cifrado->cod_cifrar_cadena($consulta->axuiddriver),'data'=>$consulta->driver));
				}else{
					echo json_encode(array('status'=>false));//disponible para registrarlo
				}
			}else{
				echo json_encode(array('status'=>null,'data'=>'La persona ya conduce un vehículo de la empresa actualmente'));
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
	public function mpsr_post_certification_create_real(){//OK
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$empresa_id = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtdata')));	
			//$empresa_id = 3;
			//esto ya esta validado asi normal procede
			$consulta = array(array('aso.asociacion_id, veh.placa'),array('public.asociaciones aso','public.vehiculos veh'),array('NULL','aso.vehiculo_id = veh.vehiculo_id'));
			$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0, array('aso.estado'=>true,'aso.empresa_id'=>$empresa_id));
			if(!empty($consulta)){
				for($i=0;$i<count($consulta);$i++){//EL COSTRO ES MUY ALTO REDUCIR
					//si tiene historial, no hacer nada
					$certificados = $this->arixkernel->arixkernel_obtener_data_by_id('asociacion_id', 'certificados', false, array('estado'=>false,'expired'=>false/* para mostrat lod dos'advanced'=>false*/,'asociacion_id'=>$consulta[$i]->asociacion_id));
					if(is_null($certificados)){
						$data=array(
							'asociacion_id'=>$consulta[$i]->asociacion_id,
							'ncertificado'=>substr(date('Y'),2,2).substr($consulta[$i]->placa,0,2).strtoupper(substr(uniqid(), -11)),							
							'vigenciaini'=>date("Y")."-01-01",
							'vigenciafin'=>date("Y")."-12-31",
							'axlog'=>$this->serv_administracion_usuarios->use_obtener_actual_usuario().' -> CREADO -> EL '.date('d-m-Y H:i')
						);
						$this->arixkernel->arixkernel_guargar_simple_data($data, 'certificados');//se supone sin errores
					}
				}
				echo json_encode(array('status'=>true));
			}else{
				echo json_encode(array('status'=>false));//Asocia vehiculos a la empresa
			}
		}else{
			show_404();
		}
	}
	public function mpsr_post_certification_create_renove(){//OK
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$empresa_id = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtdata')));			
			$consulta = array(array('aso.asociacion_id, veh.placa'),array('public.asociaciones aso','public.vehiculos veh'),array('NULL','aso.vehiculo_id = veh.vehiculo_id'));
			$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0, array('aso.estado'=>true,'aso.empresa_id'=>$empresa_id));
			$year = date("Y")+1;
			if(!empty($consulta)){
				//actualizar el anterior registro al historial				
				for($i=0;$i<count($consulta);$i++){//EL COSTRO ES MUY ALTO REDUCIR
					$this->arixkernel->arixkernel_update_data_noanswer(array('estado'=>false,'supdate'=>false),'certificados',array('asociacion_id'=>$consulta[$i]->asociacion_id,'estado'=>true,'advanced'=>false));
					$certificados = $this->arixkernel->arixkernel_obtener_data_by_id('asociacion_id', 'certificados', false, array('estado'=>true,'advanced'=>true,'asociacion_id'=>$consulta[$i]->asociacion_id));
					if(is_null($certificados)){
						$data=array(
							'asociacion_id'=>$consulta[$i]->asociacion_id,
							'ncertificado'=>substr($year,2,2).substr($consulta[$i]->placa,0,2).strtoupper(substr(uniqid(), -11)),							
							'vigenciaini'=>$year."-01-01",
							'vigenciafin'=>$year."-12-31",
							'advanced'=>true,
							'axlog'=>$this->serv_administracion_usuarios->use_obtener_actual_usuario().' -> CREADO -> EL '.date('d-m-Y H:i')
						);
						$this->arixkernel->arixkernel_guargar_simple_data($data, 'certificados');//se supone sin errores
					}
				}
				echo json_encode(array('status'=>true));
			}else{
				echo json_encode(array('status'=>false));//Asocia vehiculos a la empresa
			}
		}else{
			show_404();
		}
	}


	//---------------------*****POST - SAVE SECTION****************-----------------
	public function mpsr_post_emprmpsr(){// OK
		if($this->input->is_ajax_request() && $this->input->post('txtruc')){			
			$datos = array(
				array(//tabla empresa
					'ruc' => $this->input->post('txtruc'),
					'administrador_id' => intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtpeopleid'))),
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
	public function mpsr_post_renovaciones(){// OK
		if($this->input->is_ajax_request() && $this->input->post('txtempid')){
			//recibee datos de: mpsr_post_renovacion
			$caducado = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtautid')));
			//$caducado = $this->serv_cifrado->cod_decifrar_cadena('54F747562B763SDR5Tmp0MHM1bTM1UTltaDVrcmtUUT09');
			//$caducado = explode('@',$caducado);
			$data = array(//tabla autorizaciones
				'empresa_id' => intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtempid'))),
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
				'rutafin' => $this->input->post('txtrfinal'),
				'advanced'=>true,
				'axlog'=>$this->serv_administracion_usuarios->use_obtener_actual_usuario().' -> CREADO -> EL '.date('d-m-Y H:i')
			);
			$data = $this->arixkernel->arixkernel_actualizar_guardar_data(array(array('estado'=>false),$data), array('autorizaciones','autorizaciones'),array('autorizacion_id'=>$caducado,'estado'=>true));				
			echo json_encode(array('status'=>$data['status']));
			
			//solo puede exisitr una aautorizacion activa por empresa: cuando renovas, la anterior se va al historial pero no expira
			/*if(date("Y", strtotime($caducado[0])) < date('Y')){//si ya expiro la autorizacion
				$data = $this->arixkernel->arixkernel_actualizar_guardar_data(array(array('estado'=>false),$data), array('autorizaciones','autorizaciones'),array('autorizacion_id'=>intval($caducado[1])));				
				echo json_encode(array('status'=>$data['status']));
			}else{
				$data = $this->arixkernel->arixkernel_guargar_simple_data($data, 'autorizaciones');
				echo json_encode(array('status'=>$data['status']));
			}*/
		}else{
			show_404();
		}
	}
	public function mpsr_post_certification_eval(){//OK
		if($this->input->is_ajax_request() && $this->input->post('txtcertifid')){
			$ccon = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtevalclase')));
			//$ccon = intval($this->serv_cifrado->cod_decifrar_cadena('E2F9DEA02F443NWNRUVVmWGphRWZuRUVmNmhEc3VsUT09'));
			$datos = $this->arixkernel->arixkernel_obtener_data_by_id('status', 'ccondiciones',$ccon);
			$update = $ccon==3?false:true;
			$cert_id = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtcertifid')));
			//$cert_id = intval($this->serv_cifrado->cod_decifrar_cadena('E2F9DEA02F443Y21zUkRZcTZMaDZFVlZvN0MrMHFhdz09'));
			$datos = array(
				array(
					'ccondicion_id'=>$ccon,
					'supdate'=>$update,
					'factualizacion'=>date('Y-m-d H:i:s')
				),array(
					'certificado_id'=>$cert_id,
					'affectedrow'=>'Certificación Vehicular',
					'rowafter'=>$datos->status,
					'axdescribe'=>$this->input->post('txtevalobserbations'),
					'axlog'=>$this->serv_administracion_usuarios->use_obtener_actual_usuario().' -> CREADO -> EL '.date('d-m-Y H:i'),
					'fregistro'=>date("Y-m-d H:i:s")			
				)
			);
			$tables = array('certificados','his_certificados');//array('tabla_actualizar','tabla insertar');
			$tables = $this->arixkernel->arixkernel_actualizar_guardar_data($datos,$tables,array('certificado_id'=>$cert_id,'supdate'=>true));
			echo json_encode(array('status'=>$tables['status']));						
		}else{
			show_404();
		}
	}
	//array('cer.ccondicion_id'=>2,'cer.estado'=>true,'cer.fechaisp is null'=>null),'',array('emp.empresa_id')
	public function mpsr_post_certification_programe(){//OK
		if($this->input->is_ajax_request() && $this->input->post('txtinspectempid')){
			
			//$empresa_id = intval($this->serv_cifrado->cod_decifrar_cadena('42B1F54D1306Dc085c3Bna2loNmFWY2RWTGtrcjEwUT09'));
			//$lugar=$this->input->post('txtinspectplace');
			//$fecha=date('Y-m-d', strtotime('31/08/2021'));
			
			$empresa_id = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtinspectempid')));
			$lugar=$this->input->post('txtinspectplace');
			$fecha=date('Y-m-d', strtotime(str_replace('/', '-',$this->input->post('txtinspectdate'))));
			$condicion = $this->arixkernel->arixkernel_obtener_data_by_id('status', 'ccondiciones',3);
			//RECUPERAMOS LOS REGISTROS QUE SE MUESTRA
			//consulta repetida al de mostrar lista para programacion
			$consulta = array(
				array(
					'cer.certificado_id',
				 ),
				array(
					'public.certificados cer',
					'public.asociaciones aso',
					'public.empresas emp'
				 ),
				array(
					'NULL',
					'cer.asociacion_id = aso.asociacion_id',
					'aso.empresa_id = emp.empresa_id',
				 )
			);
			$consulta = $this->arixkernel->arixkernel_obtener_complex_data($consulta,0,array('cer.ccondicion_id'=>2,'cer.estado'=>true,'cer.fechaisp is null'=>null,'emp.empresa_id'=>$empresa_id));			
			for($i=0;$i<count($consulta);$i++){
				$datos = array(
					array(
						'ccondicion_id'=>3,
						'lugarisp'=>$lugar,
						'fechaisp'=>$fecha,				
						'factualizacion'=>date('Y-m-d H:i:s')
					),array(
						'certificado_id'=>$consulta[$i]->certificado_id,
						'affectedrow'=>'Programación de inspección',
						'rowafter'=>$condicion->status,
						'axdescribe'=>'Fecha y lugar: '.$fecha.' '.$lugar,
						'axlog'=>$this->serv_administracion_usuarios->use_obtener_actual_usuario().' -> EL '.date('d-m-Y H:i'),
						'fregistro'=>date("Y-m-d H:i:s")			
					)
				);
				$tables = array('certificados','his_certificados');//array('tabla_actualizar','tabla insertar');
				$tables = $this->arixkernel->arixkernel_actualizar_guardar_data($datos,$tables,array('certificado_id'=>$consulta[$i]->certificado_id));			
			}
			echo json_encode(array('status'=>true));					
		}else{
			show_404();
		}
	}
	public function mpsr_get_certification_history(){//OK
		if($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$certif_id = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtdata')));
			//$certif_id = 35;		
			$datos = $this->arixkernel->arixkernel_obtener_simple_data('fregistro,affectedrow,rowafter,axdescribe', 'his_certificados', 0, array('certificado_id'=>$certif_id), array('his_certificado_id','desc'));
			//$datos->fregistro = date('d/m/Y H:i:s', strtotime($datos->fregistro));
			for ($i=0; $i < count($datos); $i++) { 
				$datos[$i]->fregistro = date('d/m/Y H:i:s', strtotime($datos[$i]->fregistro));
			}
			echo json_encode(array_merge($datos,array('status'=>true)));							
		}else{
			show_404();
		}
	}



	public function mpsr_post_save_eval(){//OK
		if($this->input->is_ajax_request() && $this->input->post('txtcertifid')){
			$eval = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtevalclase')));			
			$cert_id = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtcertifid')));
			$datos = $this->arixkernel->arixkernel_obtener_data_by_id('status', 'ccondiciones',$eval);
			$obs = $this->input->post('txtevalobserbations');
			//$eval = 3;
			//$cert_id = 8;	
			$datos = array(
				array(//update = certificado
					'ccondicion_id'=>$eval,
					'supdate'=>false,
					'factualizacion'=>date('Y-m-d H:i')
				),array(//insert = his_certificado
					'certificado_id'=>$cert_id,
					'affectedrow'=>'Inspección Vehicular',
					'rowafter'=>$datos->status,
					'axdescribe'=>$obs,
					'axlog'=>$this->serv_administracion_usuarios->use_obtener_actual_usuario().' -> CREADO -> EL '.date('d-m-Y H:i'),
					'fregistro'=>date("Y-m-d H:i:s")
				),array(//insert  = mpsrLicencias TUC
					'certificado_id'=>$cert_id,
					'nmpsrlicencias'=>substr(date('Y'),2,2).random_int(10, 99).strtoupper(substr(uniqid(),-11)),
					'sucursal_id'=>$this->serv_administracion_usuarios->use_obtener_sucursal_id_actual()
				)
			);
			$tables = array('certificados','his_certificados','mpsrlicencias');//array('tabla_actualizar','tabla insertar');
			if($eval==4){// APROBADO - actualiza CER y inserta HIS_CER Y incerta tuc				
				$tables = $this->arixkernel->arixkernel_actualizar_guardar_multiple($datos,$tables,array('certificado_id'=>$cert_id,'ccondicion_id'=>3,'supdate'=>true));
				echo json_encode(array('status'=>$tables['status']));
			}else{// OTROS - actualiza CER y inserta HIS_CER
				$datos[0] = array(
					'ccondicion_id'=>1,
					'supdate'=>true,//se puede actualizar		
					'fechaisp'=>null,
					'factualizacion'=>date('Y-m-d H:i')
				);
				//array_merge($datos[0], array('estado'=>false,'expirated'=>true));
				//solo procesa los $datos [0:1] y tables[0:1]
				$tables = $this->arixkernel->arixkernel_actualizar_guardar_data($datos,$tables,array('certificado_id'=>$cert_id,'ccondicion_id'=>3,'supdate'=>true));
				echo json_encode(array('status'=>$tables['status']));
			}			
		}else{
			show_404();
		}
	}
	public function mpsr_post_vehicleadd(){//OK
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
	public function mpsr_post_driveradd(){//OK
		if($this->input->is_ajax_request() && $this->input->post('txtdriverownerid')){
			$data = array(
				'nsolicitud' => $this->input->post('txtdriverresol'),
				'nlicencia' => $this->input->post('txtdriverlicense'),
				'persona_id' => intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtdriverownerid'))),
				'lclasecategoria_id' => intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtdrivercatclass'))),
				'vigentefin' => date("Y-m-d", strtotime(str_replace('/', '-',$this->input->post('txtdrivervigencia')))),
				'vigenteini' => date("Y-m-d", strtotime(str_replace('/', '-',$this->input->post('txtdriverviginicio'))))
			);
			$data = $this->arixkernel->arixkernel_guargar_simple_data($data, 'conductores');
			$data['id']=$this->serv_cifrado->cod_cifrar_cadena($data['id']);
			echo json_encode($data);
		}else{
			show_404();
		}
	}
	//para agregar certificados
	// mpsr_post_certificado_add
	public function mpsr_post_asociacion_add(){//OK
		if($this->input->is_ajax_request() && $this->input->post('txtcertifempid')){
			//antes debes comparar cantidad de vehiculos autorizados para guardar
			$empresa_id = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtcertifempid')));			
			$flota_autori = $this->arixkernel->arixkernel_obtener_data_by_id('nvehiculos flota', 'autorizaciones', false, array('empresa_id'=>$empresa_id,'estado'=>true));
			$flota_actual = $this->arixkernel->arixkernel_obtener_data_by_id('count(*) flota', 'asociaciones', false, array('empresa_id'=>$empresa_id,'estado'=>true));
			//print_r(array('asociaciones'=>$flota_actual->flota ,'autorizacion'=>$flota_autori->flota));
			
			if($flota_actual->flota < $flota_autori->flota){//<ocurre antes de entrar datos
				$data = array(
					'vehiculo_id' => intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtcertifvehiplacaid'))),
					'empresa_id' => $empresa_id,
					'conductor_id' => intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtcertifdriverid')))			
				);
				$data = $this->arixkernel->arixkernel_guargar_simple_data($data, 'asociaciones');
				echo json_encode(array('status'=>$data['status']));
			}else{
				echo json_encode(array('status'=>false));
			}
		}else{
			show_404();
		}
	}
	//---------------------*****DELETE SECTION****************-----------------
	public function mpsr_delete_compania(){// OK
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$empresa_id = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtdata')));//pude ser ruc
			//esto puede tener 
			//1. autorizacion adelantada
			//2. vehiculos (asocianes activas)
			//3. certificados activos
			//4. tucs asociados			
			$autorizacion = $this->arixkernel->arixkernel_obtener_data_by_id('autorizacion_id', 'autorizaciones', false,array('estado'=>true,'empresa_id'=>$empresa_id,'advanced'=>false));
			$datos = array(
				array(
					'estado'=>false,
					'fmodificacion'=>date('Y-m-d H:i:s')
				),
				array(
					'estado'=>false,
					'ffinal'=>date('Y-m-d'),
					'fmodificacion'=>date('Y-m-d H:i:s')
				)
			);
			$tables = array('autorizacion','empresas');
			$conditions = array(
				array('cuenta_id'=>$cuenta->cuenta_id),
				array('contrato_id'=>$id_contrato->contrato_id)
			);				
			$datos = $this->arixkernel->arixkernel_actualizar_serial_data($datos, $tables,$conditions);
			echo json_encode(array('status'=>$datos['status']));
			/*if(!is_null($)){
				$temp = explode("@", $cuenta->correo);
				$datos = array(
					array(
						'estado'=>false,
						'fmodificacion'=>date('Y-m-d H:i:s'),
						'correo'=>$temp[0].'@'.uniqid()
					),
					array(
						'estado'=>false,
						'ffinal'=>date('Y-m-d'),
						'fmodificacion'=>date('Y-m-d H:i:s')
					)
				);
				$tables = array('config.cuentas','config.contratos');
				$conditions = array(
					array('cuenta_id'=>$cuenta->cuenta_id),
					array('contrato_id'=>$id_contrato->contrato_id)
				);				
				$datos = $this->arixkernel->arixkernel_actualizar_serial_data($datos, $tables,$conditions);
				echo json_encode(array('status'=>$datos['status']));
			}else{//no tiene cuenta
				$datos=array(
					'estado'=>false,
					'ffinal'=>date('Y-m-d'),
					'fmodificacion'=>date('Y-m-d H:i:s')
				);
				$datos=$this->arixkernel->arixkernel_actualizar_simple_data($datos,'config.contratos',array('contrato_id'=>$id_contrato->contrato_id));				
				echo json_encode(array('status'=>$datos['status']));
			}*/
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
		//echo ($this->serv_cifrado->cod_cifrar_cadena(1));
		//print_r($this->arixkernel->arixkernel_obtener_data_by_id('status', 'ccondiciones',2));
		//print_r ($this->serv_administracion_usuarios->use_obtener_dato_session('axlogin'));
		//echo ($this->serv_cifrado->cod_decifrar_cadena('E2F9DEA02F443NWNRUVVmWGphRWZuRUVmNmhEc3VsUT09'));
		//$datos = date('Y-m-d', strtotime('25/12/2022'));
		//echo $datos;
		//print_r(count(array('mas')));
		//echo(strtoupper(uniqid('ABC')));
		//echo json_encode(array('status'=>true));
		//echo(substr('123abc',-3).substr(uniqid(), 1)); // devuelve "de"
		
		//print_r($this->mpsr_private_check_rucToId('20387739418'));
		
			
		/*$flota_autori = $this->arixkernel->arixkernel_obtener_data_by_id('nvehiculos flota', 'autorizaciones', false, array('autorizacion_id'=>3));
			$flota_actual = $this->arixkernel->arixkernel_obtener_data_by_id('count(*) flota', 'asociaciones', false, array('empresa_id'=>3,'estado'=>true));
			if($flota_actual->flota < $flota_autori->flota){
				print_r(array($flota_actual->flota,$flota_autori->flota));
			}else{
				echo 'nada';
			}*/

		//echo (substr(date('Y'),2).random_int(10, 99).substr(uniqid()));
		//echo (strtoupper(substr($this->input->post('txtcertifvehiplacadoc'),-3).substr(uniqid(), 1)));
		//echo (date("Y-m-d", strtotime(str_replace('/', '-','19/7/2021'))));
		/*$this->load->library('serv_ejecucion_app');
		$array_tabla_tupla = $this->serv_ejecucion_app->exe_contruir_consulta(array(	
			'public.certificados'=>'ncertificado,lugarisp,fechaisp',
			'public.asociaciones'=>'conductor_id',									
			'public.vehiculos'=>'placa,modelo,color,fanio,clase',
			'puplic.hmarcas'=>'hmarca',
			'public.empresas'=>'empresa_id,administrador_id,ruc,nombre,rsocial',
			'public.autorizaciones'=>'autorizacion_id',
			'public.servicios'=>'descripcion',

		), array(1,0,0,0,1,0,0));
		print_r($array_tabla_tupla);*/
		$c = [1,3,4,array("abc", 'caca',2),2];
		print_r($c[1-4]);

	}
}