<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH.'third_party/fpdf/fpdf.php';

class Serv_ticket_rest_entradas extends FPDF{
    protected static $arrData;
    function __construct(&$arrDa) {        
        //parent::__construct('P','mm',array(80,119));
        $longPage = 105 + ((count($arrDa[1]) -1) * 6);
        parent::__construct('P','mm',array(80,$longPage));
        self::$arrData = $arrDa;
        $this->addFont('bahnschrift');
        //$this->AddFont('bahnschrift','','Bahnschrift.ttf',true);
        $this->SetMargins(2, 5, 2);
        $this->AddPage();
    }

    public function Header(){
        //$this->SetY(-15);
        $this->SetFont('Arial', 'B', 18);       
        $this->Cell(0, 5, utf8_decode(self::$arrData[0]->nombre), 0, 1, 'C');           
    }
    function Footer(){
        //$this->SetY(-15);
        
        $this->Cell(0, 2, '------------------------------------', 0, 1, 'C');        
        $this->SetFont('bahnschrift', '', 6);       
        $this->MultiCell(0, 3, utf8_decode("NOTA: Al recibir este documento, acepto todos los términos y condiciones del contrato Al recibir este documento, acepto todos los términos y condiciones del contrato Al recibir este documento, acepto todos los términos y condiciones del contrato Al recibir este documento, acepto todos los términos y condiciones del"),  0, 'L');
        $this->ln(2);
        $this->Cell(20, 3, date("d/m/Y H:i:s",strtotime(self::$arrData[0]->updated_at)), 0, 0, 'L');       
        $this->Cell(0, 3, 'Arix MEE v1.2', 0, 0, 'R');
    }
    public function tableDatos(){
        $this->ln(2);
        $this->SetFont('bahnschrift', '', 8);
        $this->MultiCell(0, 3, utf8_decode(self::$arrData[0]->rsocial),  0, 'C');
        $this->MultiCell(0, 3, utf8_decode(self::$arrData[0]->direccion),  0, 'C');
        //$this->MultiCell(0, 3, "BAJO BOLETA DE VENTA ELECTRONICA No. 002022488",  0, 'C');
        $this->ln(3);
        $this->SetFont('bahnschrift', '', 9);
        $this->Cell(0, 4, utf8_decode('REGISTRO DE ENTRADA No. '.self::$arrData[0]->entrada_id), 0, 1, 'C');
        $this->SetFont('bahnschrift', '', 8);
        $this->MultiCell(0, 4, utf8_decode("BAJO ".self::$arrData[0]->comprobante),  0, 'C');
        $this->ln(3);
        $this->Cell(0, 4, 'FECHA DE INGRESO: '.date("d/m/Y",strtotime(self::$arrData[0]->fecha)), 0, 1, 'L');
        $this->MultiCell(0, 4, utf8_decode("PROVEEDOR: ".self::$arrData[0]->proveedor),  0, 'L');        
        $this->ln(3);
        $this->Cell(0, 4, utf8_decode('SUCURSAL: '.self::$arrData[0]->numero.' '.self::$arrData[0]->nombre), 0, 1, 'L');
        $this->MultiCell(0, 4, utf8_decode("RESPONSABLE: ".self::$arrData[0]->responsable),  0, 'L');
        $this->ln(2);

        //$this->ln(); 
        $this->SetFont('bahnschrift', '', 8);
        $this->Cell(0, 3, '-------------------------------------------------------', 0, 1, 'L'); 
        $this->Cell(15, 3, 'CODIGO', 0, 0, 'L');       
        $this->Cell(17, 3, 'PRODUCTO', 0, 0, 'L');
        $this->Cell(9, 3, 'VCTO', 0, 0, 'C'); 
        $this->Cell(10, 3, 'CANT', 0, 0, 'C'); 
        $this->Cell(12, 3, 'P.UNIT', 0, 0, 'C'); 
        $this->Cell(13, 3, 'IMPORTE', 0, 1, 'C');
        $this->Cell(0, 2, '-------------------------------------------------------', 0, 1, 'L');
        
        /*$this->Cell(15, 3, '00207109', 1, 0, 'L');       
        $this->Cell(0, 3, 'NUTRILAC 100-ml', 1, 1, 'L');
        $this->Cell(41, 3, '1924-23-40', 1, 0, 'R'); 
        $this->Cell(10, 3, '1', 1, 0, 'C'); 
        $this->Cell(12, 3, '100.00', 1, 0, 'R'); 
        $this->Cell(13, 3, '1000.00', 1, 1, 'R');*/
        $suma = 0;
        foreach(self::$arrData[1] as $product){
            
            $this->Cell(15, 3,$product->barcode, 0, 0, 'L');       
            //$this->Cell(0, 3, utf8_decode($product->producto), 0, 1, 'L');
            $this->MultiCell(0, 3, utf8_decode($product->producto), 0 , 'L'); 
            $this->Cell(41, 3, $product->expire, 0, 0, 'R'); 
            $this->Cell(10, 3, $product->cant.'.00', 0, 0, 'C'); 
            $this->Cell(12, 3, $product->punit, 0, 0, 'C'); 
            $this->Cell(13, 3, $product->importe, 0, 1, 'R');
            $suma += $product->importe;
        }
       /* for($i=0;$i<count(self::$arrData[1]);$i++){
            $this->Cell(15, 3,self::$arrData[1][$i] , 0, 0, 'L');       
            $this->Cell(0, 3, utf8_decode("áma"), 0, 1, 'L');
            $this->Cell(41, 3, '2022-23-'.rand(1,31), 0, 0, 'R'); 
            $this->Cell(10, 3, rand(1,999), 0, 0, 'C'); 
            $this->Cell(12, 3, rand(7,999).'.00', 0, 0, 'C'); 
            $this->Cell(13, 3, rand(7,9999).'.00', 0, 1, 'R');
		}
        */
        $this->Cell(0, 4, '-------------------------------------------------------', 0, 1, 'L');
        $this->SetFont('bahnschrift', '', 12);
        $this->Cell(50, 4, 'TOTAL PAGADO S/', 0, 0, 'R');       
        $this->Cell(25, 4, number_format(round($suma, 1),2,".",","), 0, 1, 'R');
        
    }
}

