<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Restpuntodeventa extends CI_Controller {
	function __construct(){
        parent::__construct();
        $controlador=explode("/",$_SERVER['PHP_SELF']);
        $this->load->library('serv_administracion_usuarios');
		if(!$this->serv_administracion_usuarios->use_cargar_app_session($controlador[3])){show_404();}        
	}
	public function index(){
		$this->load->library('serv_ejecucion_app');
		$this->load->library('serv_cifrado');
		$this->load->model('arixkernel');
		$this->load->library('serv_administracion_usuarios');
		$css = $this->serv_ejecucion_app->exe_cargar_axcss(array('axcss-dataTables'));
		$js = $this->serv_ejecucion_app->exe_cargar_axjs(array('axjs-dataTables','axjs-validate-p1','axjs-validate-p2','axjs-mask','restinventariojs'));
		$js = array($js,$css);
		$this->load->view('arixshellbase',compact('js'));
	}

	public function cajas(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_restpuntoventa/cajas');
		}
		else{
			show_404();
		}
	}
	public function punto_venta_view(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_restpuntoventa/punto_venta_view');
		}
		else{
			show_404();
		}
	}
	public function cajas_get_cajas(){
		/*$datos= array(
			["caj.cuenta_id, caj.caja,caj.num, caj.sesion"],
			['rest.cajas caj',
				'config.cuentas cue'],
			['NULL',
				'caj.cuenta_id = cue.cuenta_id'],
			['NULL',
				'LEFT']
		);
		http://www.fpdf.org/en/script/script94.php
		<?php
			require('fpdf_merge.php');
			$merge = new FPDF_Merge();
			$merge->add('doc1.pdf');
			$merge->add('doc2.pdf');
			$merge->output();
		?>
		*/
		if ($this->input->is_ajax_request()) {
			$consulta = array(
				["caj.caja_id axid, concat(caj.num,': ',caj.caja) caja, caj.sesion, concat(per.documento,' - ',per.nombres,', ', per.paterno,' ', per.materno) person"],
				['config.cuentas cue',
					'config.contratos con',
					'private.personas per',
					'rest.cajas caj'],
				['NULL',
					'cue.contrato_id = con.contrato_id',
					'con.persona_id = per.persona_id',
					'cue.cuenta_id = caj.cuenta_id'],				
				['NULL',
					'INNER',
					'INNER',
					'RIGHT']
			);	
			$consulta = $this->arixkernel->arixkernel_obtener_complex($consulta,0,['caj.sucursal_id'=>$this->serv_administracion_usuarios->use_obtener_sucursal_id_actual()],['caj.caja_id','asc']);
			for ($i=0; $i < count($consulta); $i++) { 
				$consulta[$i]->axid= $this->serv_cifrado->cod_cifrar_cadena($consulta[$i]->axid);
			}
			//print_r($consulta);
			echo json_encode($consulta );			
		}
		else{
			show_404();
		}		
	}
	public function cajas_post_user_access(){
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$caja_id = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtdata')));
			//$caja_id = 2;
			$cuenta_id = $this->serv_administracion_usuarios->use_obtener_actual_cuenta_id();
			$sucursal_id = $this->serv_administracion_usuarios->use_obtener_sucursal_id_actual();
			$consulta = $this->arixkernel->arixkernel_obtener_simple_data('cuenta_id,sesion', 'rest.cajas', 0, ['caja_id'=>$caja_id,'sucursal_id'=>$sucursal_id]);
			//print_r($consulta);
			if ($consulta[0]->sesion == true){
				if($consulta[0]->cuenta_id == $cuenta_id){
					echo json_encode(['status'=>true]);
				}else{
					echo json_encode(['status'=>false]);
				}
			}else{
				//actualizar la tabla cajas				
				$consulta = $this->arixkernel->arixkernel_actualizar_guardar_multiple(array(['cuenta_id'=>$cuenta_id,'sesion'=>true],['cuenta_id'=>$cuenta_id,'caja_id'=>$caja_id,'inisession'=>date('Y-m-d H:i:s')]), ['rest.cajas','rest.cajasesiones'],['caja_id'=>$caja_id,'sucursal_id'=>$sucursal_id]);
				echo json_encode($consulta);
			}
		}else{
			show_404();
		}
	}
	public function ventas_productos_get_one(){
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$barcode = $this->input->post('txtdata');
			//$barcode = "4852452021";						
			$consulta = $this->arixkernel->arixkernel_obtener_simple_data('producto_id axid,barcode,producto,pventa,dscto', 'rest.productos',0,['barcode'=>$barcode]);
			if (!empty($consulta)){
				$consulta[0]->axid= $this->serv_cifrado->cod_cifrar_cadena($consulta[0]->axid);
				echo json_encode(array_merge((array)$consulta[0],['status'=>true]));
			}else{
				echo json_encode(['status'=>false,'error'=>true]);
			}			
		}else{
			show_404();
		}
	}
}