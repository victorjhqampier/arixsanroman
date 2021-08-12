<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->library('serv_ejecucion_app');
		$controlador=explode("/",$_SERVER['PHP_SELF']);$this->load->library('serv_administracion_usuarios');
		//if(!$this->serv_administracion_usuarios->use_cargar_app_session($controlador[3])){show_404();}
		if(!$this->serv_administracion_usuarios->use_cargar_app_session($controlador[3])){redirect(base_url());}
	}
	public function index(){
		$css = $this->serv_ejecucion_app->exe_cargar_axcss(array('axcss-dataTables'));		
		$js = $this->serv_ejecucion_app->exe_cargar_axjs(array('inicio-arixjs'));
		$js = array($js,$css);
		$this->load->view('arixshellbase',compact('js'));
	}
	public function notificaciones(){
		$this->load->view('app_inicio/notificaciones');
	}
}