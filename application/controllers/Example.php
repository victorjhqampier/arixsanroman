<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Example extends CI_Controller {
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
		$js = $this->serv_ejecucion_app->exe_cargar_axjs(array('axjs-dataTables','axjs-validate-p1','axjs-validate-p2','axjs-mask','axjs-crypto-md5'));
		$js = array($js,$css);
		$this->load->view('arixshellbase',compact('js'));
	}
}