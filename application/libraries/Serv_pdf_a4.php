<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Serv_pdf_a4{		
	public function __construct() {
		//parent::__construct();	
		require_once APPPATH.'third_party/fpdf/fpdf.php';		
		$pdf = new FPDF('P','mm','A4');
		//$pdf->SetMargins(30, 25 , 30);
		#Establecemos el margen inferior:
		$pdf->SetAutoPageBreak(true,0);
		$pdf->SetFont('Arial','',12);
		$pdf->AddPage();					
		$CI =& get_instance();
		$CI->fpdf = $pdf;
	}
}