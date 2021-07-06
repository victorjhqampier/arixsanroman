<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mpsrpdfreport extends CI_Controller {
	function __construct(){
        parent::__construct();        
		date_default_timezone_set("America/Lima");	
		//$controlador=explode("/",$_SERVER['PHP_SELF']);$this->load->library('serv_administracion_usuarios');if(!$this->serv_administracion_usuarios->use_cargar_app_session($controlador[3])){show_404();}
    }
    public function index (){
        $this->load->library('serv_pdf_a4');
        $this->fpdf->AliasNbPages();
		$this->fpdf->SetTitle("San Roman Juliaca");
		$this->fpdf->SetLeftMargin(15);
		$this->fpdf->SetRightMargin(15);	    
        $this->fpdf->ln(24);

        $this->fpdf->Cell(40,10,'Maron hasla linda, esto es tu campo ggg',0);
        $this->fpdf->Cell(40,30,'applications/controllers/mpsrpdfreport',0);

        $this->fpdf->Output("Ejemplo de pdf", 'I');
    }
}