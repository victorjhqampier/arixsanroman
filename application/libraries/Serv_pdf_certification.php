<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*class Serv_pdf_a4{		
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
}*/


//require ('fpdf/fpdf.php');
require_once APPPATH.'third_party/fpdf/fpdf.php';
//esto es la plantilla
class Serv_pdf_certification extends FPDF{
    /*function __construct() {
        //constructoir this-pdf(m,t,a4)
        parent::__construct();	
        $this->ci =& get_instance();
        $this->ci->load->library('serv_barcode');
    }*/
    
    // Cabecera de página
    public function Header(){        
        $this->Image('public/images/img/axmpsrheader.png', 0, 0, 210);//x,y,long
        $this->SetFont('helvetica', 'B', 14);
        $this->Cell(0, 71, utf8_decode('CERTIFICACION VEHICULAR - BIOSEGURIDAD -  COVID 19') , 0, 0, 'C');       
    }
    // Pie de página
    public function Footer(){
        $this->SetXY(10, 131);
        $this->SetFont('Arial', '', 9);
        $this->SetDrawColor(155, 155, 155);//borde color
        $this->SetFillColor(224, 235, 255);//relleno

        $this->Cell(0, 6, utf8_decode('CERTIFICA LO SIGUIENTE:') , 0, 1, 'L');

        $this->Cell(6, 6, utf8_decode('N°') , 1, 0, 'C', true);
        $this->Cell(81, 6, utf8_decode('DESCRIPCIÓN CERTIFICACIÓN VEHICULAR') , 1, 0, 'C', true);        
        $this->Cell(8, 6, 'B/M', 1, 0, 'C', true);
        $this->Cell(6, 6, '16', 1, 0, 'L', true);
        $this->Cell(81, 6, 'AVISO, ASIENTO REFERENCIAL (ROJO)', 1, 0, 'L', false);
        $this->Cell(0, 6, '', 1, 1, 'L', false);
        
        $this->Cell(6, 6, utf8_decode('1') , 1, 0, 'C', true);    
        $this->Cell(81, 6, utf8_decode('TARJETA DE PROP., SOAT, REVISIÓN TÉC.') , 1, 0, 'L', false);        
        $this->Cell(8, 6, '', 1, 0, 'C', false);
        $this->Cell(6, 6, '17', 1, 0, 'L', true);
        $this->Cell(81, 6, 'PASAMANOS MANIJAS, LUZ DE SALA', 1, 0, 'L', false);
        $this->Cell(0, 6, '', 1, 1, 'L', false);             
        
        $this->Cell(6, 6, utf8_decode('2') , 1, 0, 'C', true);
        $this->Cell(81, 6, 'LICENCIA DE CONDUCIR', 1, 0, 'L', false);        
        $this->Cell(8, 6, '', 1, 0, 'C', false);
        $this->Cell(6, 6, '18', 1, 0, 'L', true);
        $this->Cell(81, 6, 'SALIDA DE EMERGENCIA, TARIFARIO', 1, 0, 'L', false);
        $this->Cell(0, 6, '', 1, 1, 'L', false);        
        
        $this->Cell(6, 6, utf8_decode('3') , 1, 0, 'C', true);  
        $this->Cell(81, 6, 'CARNET DE EDUCACIÓN VIAL VIGENTES', 1, 0, 'L', false);
        $this->Cell(8, 6, '', 1, 0, 'C', false);
        $this->Cell(6, 6, '19', 1, 0, 'L', true);
        $this->Cell(81, 6, 'STICKER DE RECORRIDO DE RUTA', 1, 0, 'L', false);
        $this->Cell(8, 6, '', 1, 1, 'L', false);        
        
        $this->Cell(6, 6, utf8_decode('4') , 1, 0, 'C', true);       
        $this->Cell(81, 6, utf8_decode('LOGOTICO, CÓDIGO') , 1, 0, 'L', false);        
        $this->Cell(8, 6, '', 1, 0, 'C', false);
        $this->Cell(6, 6, '20', 1, 0, 'L', true);
        $this->Cell(81, 6, 'LETRERO "FUERA DE SERVICIO"', 1, 0, 'L', false);
        $this->Cell(8, 6, '', 1, 1, 'L', false);        
        
        $this->Cell(6, 6, utf8_decode('5') , 1, 0, 'C', true);        
        $this->Cell(81, 6, utf8_decode('LÁMINA RETRO REFLECTOR') , 1, 0, 'L', false);        
        $this->Cell(8, 6, '', 1, 0, 'C', false);
        $this->Cell(6, 6, '21', 1, 0, 'L', true);
        $this->Cell(81, 6, 'UNIFORME DEL CONDUCTOR Y COBRADOR', 1, 0, 'L', false);
        $this->Cell(8, 6, '', 1, 1, 'L', false);       
        
        $this->Cell(6, 6, utf8_decode('6') , 1, 0, 'C', true);
        $this->Cell(81, 6, utf8_decode('NEUMÁTICOS, LLANTA DE REPUESTO') , 1, 0, 'L', false);        
        $this->Cell(8, 6, '', 1, 0, 'C', false);        
        $this->Cell(6, 6, '22', 1, 0, 'L', true);
        $this->Cell(81, 6, 'MALLA PROTECTORA Y SU SEGURO', 1, 0, 'L', false);
        $this->Cell(8, 6, '', 1, 1, 'L', false);
        
        $this->Cell(6, 6, utf8_decode('7') , 1, 0, 'C', true);
        $this->Cell(81, 6, utf8_decode('PLACA ÚNICA DE RODAJE') , 1, 0, 'L', false);
        $this->Cell(8, 6, '', 1, 0, 'C', false);        
        $this->Cell(6, 6, utf8_decode('N°') , 1, 0, 'L', true);
        $this->Cell(81, 6, 'BIOSEGURIDAD - COVID 19', 1, 0, 'C', true);
        $this->Cell(8, 6, 'B/M', 1, 1, 'L', true);
        
        $this->Cell(6, 6, utf8_decode('8') , 1, 0, 'C', true);
        $this->Cell(81, 6, utf8_decode('PLACAS ÚNICA EN EXTERIOR DEL VEH.') , 1, 0, 'L', false);        
        $this->Cell(8, 6, '', 1, 0, 'C', false);        
        $this->Cell(6, 6, '1', 1, 0, 'C', true);
        $this->Cell(81, 6, 'SEPARADORES', 1, 0, 'L', false);
        $this->Cell(8, 6, '', 1, 1, 'L', false);        
        
        $this->Cell(6, 6, utf8_decode('9') , 1, 0, 'C', true);
        $this->Cell(81, 6, 'VENTANAS  (PARABRISAS)', 1, 0, 'L', false);        
        $this->Cell(8, 6, '', 1, 0, 'L', false);        
        $this->Cell(6, 6, '2', 1, 0, 'C', true);
        $this->Cell(81, 6, 'AVISO INFORMATIVO DE COVID - 19', 1, 0, 'L', false);
        $this->Cell(8, 6, '', 1, 1, 'L', false);
        
        $this->Cell(6, 6, utf8_decode('10') , 1, 0, 'C', true);
        $this->Cell(81, 6, utf8_decode('EXTINGIDOR, BOTIQUÍN, CONOS, TRIÁNGULOS') , 1, 0, 'L', false);        
        $this->Cell(8, 6, '', 1, 0, 'L', false);        
        $this->Cell(6, 6, '3', 1, 0, 'C', true);
        $this->Cell(81, 6, utf8_decode('SOLUCIONES DE LEGÍA, AGUA OXIGENADA') , 1, 0, 'L', false);
        $this->Cell(8, 6, '', 1, 1, 'L', false);        
        
        $this->Cell(6, 6, utf8_decode('11') , 1, 0, 'C', true);
        $this->Cell(81, 6, 'TRIANGULOS, CAJA DE HTAS', 1, 0, 'L', false);        
        $this->Cell(8, 6, '', 1, 0, 'C', false);        
        $this->Cell(6, 6, '4', 1, 0, 'C', true);
        $this->Cell(81, 6, utf8_decode('JABÓN LÍQUIDO, PAPEL TOALLA') , 1, 0, 'L', false);
        $this->Cell(8, 6, '', 1, 1, 'L', false);      
        
        $this->Cell(6, 6, utf8_decode('12') , 1, 0, 'C', true);
        $this->Cell(81, 6, 'LIMPIA PARABRISAS, BOCINA', 1, 0, 'L', false);        
        $this->Cell(8, 6, '', 1, 0, 'C', false);        
        $this->Cell(6, 6, '5', 1, 0, 'C', true);
        $this->Cell(81, 6, 'ALCOHOL GEL O ALCOHOL LIQUIDO ', 1, 0, 'L', false);
        $this->Cell(8, 6, '', 1, 1, 'L', false);       
        
        $this->Cell(6, 6, utf8_decode('13') , 1, 0, 'C', true);
        $this->Cell(81, 6, utf8_decode('SONORO RETRO, CINTURÓN DE SEG.') , 1, 0, 'L', false);        
        $this->Cell(8, 6, '', 1, 0, 'C', false);        
        $this->Cell(6, 6, '6', 1, 0, 'C', true);
        $this->Cell(81, 6, 'PROTECTOR FACIAL, BARBIJO', 1, 0, 'L', false);
        $this->Cell(8, 6, '', 1, 1, 'L', false);        
        
        $this->Cell(6, 6, utf8_decode('14') , 1, 0, 'C', true);
        $this->Cell(81, 6, 'FRANELAS (ROJO, VERDE, AMARILLO)', 1, 0, 'L', false);        
        $this->Cell(8, 6, '', 1, 0, 'C', false);        
        $this->Cell(6, 6, '7', 1, 0, 'C', true);
        $this->Cell(81, 6, 'BASURERO', 1, 0, 'L', false);
        $this->Cell(8, 6, '', 1, 1, 'L', false);
                
        $this->Cell(6, 6, utf8_decode('15') , 1, 0, 'C', true);
        $this->Cell(81, 6, utf8_decode('ASIENTO SEGÚN RM.385-2020-MTC, (25-30CM)') , 1, 0, 'L', false);        
        $this->Cell(8, 6, '', 1, 0, 'C', false);        
        $this->Cell(6, 6, '8', 1, 0, 'C', true);
        $this->Cell(81, 6, utf8_decode('VENTILACIÓN') , 1, 0, 'L', false);
        $this->Cell(8, 6, '', 1, 1, 'L', false);

        $this->Image('public/images/img/axmpsrfooter.png', 0, 235, 210);//x,y,long
        $this->SetXY(10, 282);
        $this->Settextcolor(85, 85, 85);        
        $this->SetFont('courier', 'B', 8);
        
        $this->Cell(0, 2, utf8_decode('*POR EL INCUMPLIMIENTO DE LOS PROTOCOLOS DE BIOSEGURIDAD DE ACUERDO A LA RESOLUCIÓN MINISTERIAL 258-2020-MTC.') , 0, 1, 'L');
        $this->Cell(0, 4, utf8_decode('ME SOMETO A LAS SANCIONES QUE DETERMINE LA AUTORIDAD COMPETENTE.') , 0, 1, 'L');
        $this->Cell(0,5,$this->PageNo().'/{nb}',0,0,'R');
    }

    function tableDatos($array_data){
        $this->SetXY(10, 51);
        $this->SetFont('Arial', '', 10);
        $this->SetDrawColor(155, 155, 155);
        $this->SetFillColor(224, 235, 255);
        
        $this->Image(base_url('arixapi/probar_arixapi/'.$array_data['ncertificado']),150,58,52,8,'PNG');//x,y,long
        
        $this->Cell(25, 5.5, 'LUGAR', 1, 0, 'C', true);        
        $this->Cell(0, 5.5, utf8_decode($array_data['lugarisp']), 1, 1, 'L', false);       

        $this->Cell(25, 5.5, 'FECHA', 1, 0, 'C', true);     
        $this->Cell(55, 5.5, date('d/m/Y',strtotime($array_data['fechaisp'])), 1, 0, 'L', false);
        $this->Cell(25, 5.5, 'N. Certificado', 1, 0, 'R', true);
        $this->Cell(35, 5.5, $array_data['ncertificado'], 1, 1, 'C', false);      

        $this->Cell(25, 5.5, 'EMPRESA', 1, 0, 'C', true);
        $this->Cell(25, 5.5, 'RUC', 1, 0, 'R', true);
        $this->Cell(90, 5.5, $array_data['ruc'], 1, 1, 'C', false);
        //$this->Cell(0, 5.5, $array_data['ncertificado'], 0, 1, 'C', false);
        $this->Cell(0, 5.5, utf8_decode($array_data['rsocial']), 1, 1, 'C', false);

        $this->Cell(25, 5.5, 'DNI', 1, 0, 'C', true); 
        $this->Cell(0, 5.5, 'REPRESENTANTE DE LA EMPRESA', 1, 1, 'C', true);
        $this->Cell(25, 5.5, $array_data['repre_dni'], 1, 0, 'C', false); 
        $this->Cell(0, 5.5, utf8_decode($array_data['repre_persona']), 1, 1, 'L', false); 

        $this->Cell(25, 5.5, 'DNI', 1, 0, 'C', true);
        $this->Cell(115, 5.5, 'PROPIETARIO', 1, 0, 'C', true);
        $this->Cell(0, 5.5, utf8_decode('N° de Celular'), 1, 1, 'C', true);
        $this->Cell(25, 5.5, $array_data['prop_dni'], 1, 0, 'C', false); 
        $this->Cell(0, 5.5, utf8_decode($array_data['prop_persona']), 1, 1, 'L', false);
        $this->Cell(140, 5.5, utf8_decode($array_data['prop_direccion']), 1, 0, 'C', false); 
        $this->Cell(0, 5.5, $array_data['prop_telefono'], 1, 1, 'C', false);

        $this->Cell(25, 5.5, 'DNI', 1, 0, 'C', true);
        $this->Cell(115, 5.5, 'CONDUCTOR', 1, 0, 'C', true);
        $this->Cell(30, 5.5, utf8_decode('N" LICENCIA'), 1, 0, 'C', true);
        $this->Cell(0, 5.5, utf8_decode('CAT.'), 1, 1, 'C', true);
        $this->Cell(25, 5.5, $array_data['con_dni'], 1, 0, 'C', false); 
        $this->Cell(115, 5.5, utf8_decode($array_data['con_persona']), 1, 0, 'L', false);
        $this->Cell(30, 5.5, $array_data['con_licencia'], 1, 0, 'C', false);
        $this->Cell(0, 5.5, $array_data['con_categoria'], 1, 1, 'C', false);

        $this->Cell(25, 5.5, 'PLACA', 1, 0, 'C', true);
        $this->Cell(80, 5.5, utf8_decode('VEHÍCULO'), 1, 0, 'C', true);
        $this->Cell(65, 5.5, utf8_decode('SERVICIO'), 1, 0, 'C', true);
        $this->Cell(0, 5.5, utf8_decode('CÓDIGO'), 1, 1, 'C', true);
        $this->Cell(25, 5.5, $array_data['placa'], 1, 0, 'C', false); 
        $this->Cell(80, 5.5, $array_data['vehiculo'], 1, 0, 'L', false);
        $this->Cell(65, 5.5, utf8_decode($array_data['serv_servicio']), 1, 0, 'C', false);
        $this->Cell(0, 5.5, '', 1, 1, 'C', false);

        $this->Cell(25, 5.5, 'DISTRITO', 1, 0, 'R', true);
        $this->Cell(35, 5.5, utf8_decode('JULIACA'), 1, 0, 'C', false);
        $this->Cell(25, 5.5, 'PROVINCIA', 1, 0, 'R', true);
        $this->Cell(35, 5.5, utf8_decode('SAN ROMÁN'), 1, 0, 'C', false);
        $this->Cell(35, 5.5, 'DEPARTAMENTO', 1, 0, 'R', true);
        $this->Cell(35, 5.5, utf8_decode('PUNO'), 1, 1, 'C', false);
    }
}