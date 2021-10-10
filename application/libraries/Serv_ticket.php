<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'third_party/fpdf/fpdf.php';

class Serv_ticket extends FPDF{
    function __construct() {
        parent::__construct('P','mm',array(58,170));
        $this->SetMargins(0.5, 3, 0.5);
        //$this->SetTopMargin(3);
        $this->AddPage();        
        //$this->SetAutoPageBreak(false);
    }

    public function Header(){   
        $this->SetFont('Arial', 'B', 13);       
        $this->Cell(0, 5, 'Arix Corporation', 0, 1, 'C');
        $this->SetFont('Courier', '', 6);
        $this->Cell(0, 3, 'LiliPut S.A. - RUC: 20331085961', 0, 1, 'C');
        $this->Cell(0, 3, 'CENTRAL: Av. Amazonas No. 7123 Ilave', 0, 1, 'C');
        $this->ln(2);
        $this->Cell(0, 3, 'BOLETA DE VENTA ELECTRONICA No. 002022488', 0, 1, 'C');
        $this->Cell(0, 5, 'FECHA DE EMISION: 13/09/2021 12:39:55', 0, 1, 'L');
        $this->ln(3);    
    }
    public function tableDatos(){
        //$this->ln(); 
        $this->SetFont('Courier', '', 5);
        $this->MultiCell(0, 3, "---------------------------------------------------",  0, 'C');
        $this->Cell(12, 2, 'CODIGO', 0, 0, 'L');       
        $this->Cell(13, 2, 'DESCRIPCION', 0, 0, 'L');
        $this->Cell(8, 2, 'CANT', 0, 0, 'C'); 
        $this->Cell(9, 2, 'P.UNIT', 0, 0, 'C'); 
        $this->Cell(7, 2, 'DSCTO', 0, 0, 'C'); 
        $this->Cell(0, 2, 'IMPORTE', 0, 1, 'C');
        $this->MultiCell(0, 2, "---------------------------------------------------",  0, 'C');

        $this->Cell(12, 2, '00207109', 0, 0, 'L');       
        $this->Cell(0, 2, 'NUTRILAC 100-ml', 0, 1, 'L');
        $this->Cell(25, 3, '', 0, 0, 'C');
        $this->Cell(8, 3, '100.00', 0, 0, 'C'); 
        $this->Cell(9, 3, '100.00', 0, 0, 'C'); 
        $this->Cell(7, 3, '20%', 0, 0, 'C'); 
        $this->Cell(0, 3, '100.00', 0, 1, 'C');

        for($i=0;$i<20;$i++){
            $this->Cell(12, 2, rand(1,75).'207109', 0, 0, 'L');//codigo
            $this->Cell(0, 2, $i.'FORTICAO-CHOCOLATE BARRA'.$i.rand(1,75)."ml x40UND", 0, 1, 'L');//decripcion
			$this->Cell(25,3, '', 0, 0, 'C');//espacio
            $this->Cell(8, 3, rand(1,75).'.00', 0, 0, 'C'); //cant
            $this->Cell(9, 3, rand(1,99).".00", 0, 0, 'R'); //p. unitatio
            $this->Cell(7, 3, rand(0,20).'%', 0, 0, 'C'); //descto
            $this->Cell(0, 3, rand(20,500).".00", 0, 1, 'R');//importye
		}
        $this->Cell(0, 2, '--------------------------------------------------------', 0, 1, 'C'); 
        

        /*$this->MultiCell(0, 3, 'Guarda tu voucher. Es el sustento para validad su compra carajo',  0, 'L');
        for($i=0;$i<50;$i++){
			$this->Cell(0, 3, 'Guarda tu voucher. Es el sustento para validad su compra', 0, 1, 'L');
		}*/
    }
    //var $col = 0;

    /*public function SetCol($col=5){
        // Move position to a column
        $this->col = $col;
        $x = 10+$col*65;
        $this->SetLeftMargin($x);
        $this->SetX($x);
    }

    public function AcceptPageBreak(){
        if($this->col<2){
            // Go to next column
            $this->SetCol($this->col+1);
            $this->SetY(10);
            return false;
        }
        else{
            // Go back to first column and issue page break
            $this->SetCol(0);
            return true;
        }
    }*/
}

