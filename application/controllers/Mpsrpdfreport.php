<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mpsrpdfreport extends CI_Controller {
	function __construct(){
        parent::__construct();        
		date_default_timezone_set("America/Lima");	
		//$controlador=explode("/",$_SERVER['PHP_SELF']);$this->load->library('serv_administracion_usuarios');if(!$this->serv_administracion_usuarios->use_cargar_app_session($controlador[3])){show_404();}
    }
    public function index (){
        $this->load->library('serv_pdf_certification');
        //$this->serv_pdf_certification->FPDF('P','mm','A4');
        $this->serv_pdf_certification->SetTitle("San Roman Juliaca");
        $this->serv_pdf_certification->AliasNbPages();
        for ($i=0; $i <6 ; $i++) {
            $this->serv_pdf_certification->AddPage(); 
            $this->serv_pdf_certification->tableDatos();
        }
        $this->serv_pdf_certification->Output("Ejemplo de pdf", 'I');
    }
}