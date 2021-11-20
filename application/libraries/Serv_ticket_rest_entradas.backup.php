<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'third_party/fpdf/fpdf.php';

class Serv_ticket_rest_entradas extends FPDF{
    protected static $arrData;
    function __construct(&$arrDa) {        
        //parent::__construct('P','mm',array(80,119));
        $longPage = 105 + ((count($arrDa) -1) * 6);
        parent::__construct('P','mm',array(80,$longPage));
        self::$arrData = $arrDa;
        $this->SetMargins(2, 5, 2);
        $this->AddPage();
    }

    public function Header(){
        //$this->SetY(-15);
        $this->SetFont('Arial', 'B', 18);       
        $this->Cell(0, 5, 'DikeYa Cafe-Rest', 0, 1, 'C');           
    }
    function Footer(){
        //$this->SetY(-15);
        
        $this->Cell(0, 2, '-----------------------------------------------------', 0, 1, 'L');
        $this->ln(3); 
        $this->SetFont('Arial', '', 7);       
        $this->MultiCell(0, 3, "NOTA: Al recibir este documento, acepto todos los términos y condiciones del contrato Al recibir este documento, acepto todos los términos y condiciones del contrato Al recibir este documento, acepto todos los términos y condiciones del contrato Al recibir este documento, acepto todos los términos y condiciones del",  0, 'L');
        
    }
    public function tableDatos(){
        $this->ln(2);
        $this->SetFont('Times', '', 8);
        $this->Cell(0, 3, 'Arix Corp. S.A. - RUC: 20331085961', 0, 1, 'C');
        $this->Cell(0, 3, 'CENTRAL, Av. Amazonas No. 7123 Ilave', 0, 1, 'C');
        $this->Cell(0, 3, 'SUCURSAL, Av. Tred de mayo 334 segundo piso', 0, 1, 'C');
        $this->ln(3);
        $this->SetFont('Times', 'B', 9);
        $this->Cell(0, 4, 'REGISTRO DE ENTRADA No. 34', 0, 1, 'C');
        $this->SetFont('Times', '', 8);
        $this->MultiCell(0, 4, "BAJO BOLETA DE VENTA ELECTRONICA No. 002022488",  0, 'C');
        $this->ln(3);
        $this->Cell(0, 4, 'FECHA DE INGRESO: 13/09/2021 12:39:55', 0, 1, 'L');
        $this->MultiCell(0, 4, "PROVEEDOR: 48207109 VICTOR JHAMPIER CAXI MAQUERA",  0, 'L');        
        $this->ln(3);
        $this->Cell(0, 4, 'SUCURSAL: 100 - DIKEYA 2 PLAZA DE ARMAS', 0, 1, 'L');
        $this->MultiCell(0, 4, "RESPONSABLE: ROSA DELIA ALVARADO MAMANI",  0, 'L');
        $this->ln(2);

        //$this->ln(); 
        $this->SetFont('Times', '', 8);
        $this->Cell(0, 3, '-------------------------------------------------------------------------------', 0, 1, 'L'); 
        $this->Cell(15, 3, 'CODIGO', 0, 0, 'L');       
        $this->Cell(17, 3, 'PRODUCTO', 0, 0, 'L');
        $this->Cell(9, 3, 'VCTO', 0, 0, 'C'); 
        $this->Cell(10, 3, 'CANT', 0, 0, 'C'); 
        $this->Cell(12, 3, 'P.UNIT', 0, 0, 'C'); 
        $this->Cell(13, 3, 'IMPORTE', 0, 1, 'C');
        $this->Cell(0, 2, '-------------------------------------------------------------------------------', 0, 1, 'L');
        
        /*$this->Cell(15, 3, '00207109', 1, 0, 'L');       
        $this->Cell(0, 3, 'NUTRILAC 100-ml', 1, 1, 'L');
        $this->Cell(41, 3, '1924-23-40', 1, 0, 'R'); 
        $this->Cell(10, 3, '1', 1, 0, 'C'); 
        $this->Cell(12, 3, '100.00', 1, 0, 'R'); 
        $this->Cell(13, 3, '1000.00', 1, 1, 'R');*/

        for($i=0;$i<count(self::$arrData);$i++){
            $this->Cell(15, 3, rand(100,999).'007109', 0, 0, 'L');       
            $this->Cell(0, 3, str_shuffle('PRODUCTOS AORIO').' NUTRI100-ml', 0, 1, 'L');
            $this->Cell(41, 3, '2022-23-'.rand(1,31), 0, 0, 'R'); 
            $this->Cell(10, 3, rand(1,999), 0, 0, 'C'); 
            $this->Cell(12, 3, rand(7,999).'.00', 0, 0, 'C'); 
            $this->Cell(13, 3, rand(7,9999).'.00', 0, 1, 'R');
		}
        $this->Cell(0, 4, '-------------------------------------------------------------------------------', 0, 1, 'L');
        $this->SetFont('Times', 'B', 12);
        $this->Cell(50, 4, 'TOTAL S/', 0, 0, 'R');       
        $this->Cell(25, 4, '10000.00', 0, 1, 'R');
        
    }
}

