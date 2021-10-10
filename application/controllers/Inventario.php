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
		//if($this->input->is_ajax_request()){		
			$datos = $this->arixkernel->arixkernel_obtener_simple_data('producto_id axid,barcode,producto,stock,pventa,updated_at', 'sell.productos', 0, array('estado'=>true));
			for ($i=0; $i < count($datos); $i++) { 
				$datos[$i]->updated_at = date('d/m/Y', strtotime($datos[$i]->updated_at));
				$datos[$i]->axid = $this->serv_cifrado->cod_cifrar_cadena($datos[$i]->axid);
			}
			echo json_encode($datos);							
		/*}else{
			show_404();
		}*/

	}
	public function codbarras(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('templates/img_add');
		}
		else{
			show_404();
		}
	}
}