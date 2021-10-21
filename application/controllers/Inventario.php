<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventario extends CI_Controller {
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
		$css = $this->serv_ejecucion_app->exe_cargar_axcss(array('axcss-dataTables','croppercss'));
		$js = $this->serv_ejecucion_app->exe_cargar_axjs(array('axjs-dataTables','axjs-validate-p1','axjs-validate-p2','axjs-mask','cropperjs'));
		$js = array($js,$css);
		$this->load->view('arixshellbase',compact('js'));
	}
	public function productos(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_inventario/productos');
		}
		else{
			show_404();
		}
	}
	public function productos_add(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_inventario/productos_add');
		}
		else{
			show_404();
		}
	}
	public function productos_get(){
		if($this->input->is_ajax_request()){		
			$datos = $this->arixkernel->arixkernel_obtener_simple_data('producto_id axid,barcode,producto,stock,pventa,updated_at', 'sell.productos', 0, array('estado'=>true));
			for ($i=0; $i < count($datos); $i++) { 
				$datos[$i]->updated_at = date('d/m/Y', strtotime($datos[$i]->updated_at));
				$datos[$i]->axid = $this->serv_cifrado->cod_cifrar_cadena($datos[$i]->axid);
			}
			echo json_encode($datos);							
		}else{
			show_404();
		}
	}
	public function productos_get_metric(){
		if ($this->input->is_ajax_request()){							
			$consulta = $this->arixkernel->arixkernel_obtener_simple_data("unidad_id axid, concat(unidad,' (',sufijo,')') metric", 'sell.unidades',0,'',array('unidad','asc'));
			for ($i=0; $i < count($consulta); $i++) { 
				$consulta[$i]->axid= $this->serv_cifrado->cod_cifrar_cadena($consulta[$i]->axid);
			}
			echo json_encode($consulta);
		}else{
			show_404();
		}
	}
	public function productos_get_category(){
		if ($this->input->is_ajax_request()){							
			$consulta = $this->arixkernel->arixkernel_obtener_simple_data('categoria_id axid, categoria', 'sell.categorias',0,'',array('categoria','asc'));
			for ($i=0; $i < count($consulta); $i++) { 
				$consulta[$i]->axid= $this->serv_cifrado->cod_cifrar_cadena($consulta[$i]->axid);
			}
			echo json_encode($consulta);
		}else{
			show_404();
		}
	}
	public function productos_duplicate_check(){// OK
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$consulta = $this->arixkernel->arixkernel_obtener_data_by_id('barcode', 'sell.productos', false, array('barcode'=>$this->input->post('txtdata')));		
			if(!is_null($consulta)){
				echo json_encode(array('status'=>true));
			}else{
				echo json_encode(array('status'=>false));
			}
		}else{
			show_404();
		}
	}
	public function codbarras(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('templates/person_add');
		}
		else{
			show_404();
		}
	}
	/*public function proveedor_get_duplicate(){
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$doc = strrev($this->input->post('txtdata'));
			//$doc = '48207109';
			//solo buscamos en la db personas y ya está queda			
			$consulta = $this->arixkernel->arixkernel_obtener_data_by_id("persona_id axid, concat(documento,' - ', nombres,', ', paterno,' ', materno) datas", 'private.personas', false, array('documento'=>$doc));
			if(!is_null($consulta)){
				$consulta->axid= $this->serv_cifrado->cod_cifrar_cadena($consulta->axid);
				echo json_encode(array_merge((array)$consulta,array('status'=>true)));
			}else{
				echo json_encode(array('status'=>false));//ya esta registrado
			}
		}else{
			show_404();
		}
	}*/
}