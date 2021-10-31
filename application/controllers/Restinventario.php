<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restinventario extends CI_Controller {
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
	public function ids_post_generator(){
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')) {
			$i = intval($this->input->post('txtdata'));
			//$i = 1;
			$i = $this->arixkernel->arixkernel_obtener_simple_data('inicio,id,sufijo', 'rest.ids', 0, ['id'=>$i]);			
			$this->arixkernel->arixkernel_actualizar_simple_data(['inicio'=>$i[0]->inicio + 1], 'rest.ids',['id'=>$i[0]->id]);
			echo json_encode(['status'=>true, 'data'=>$i[0]->sufijo.strval($i[0]->inicio + 1)]);
		}
		else{
			show_404();
		}
	}
	public function productos(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_restinventario/productos');
		}
		else{
			show_404();
		}
	}
	public function productos_add(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_restinventario/productos_add');
		}
		else{
			show_404();
		}
	}
	public function productos_edit_form(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_restinventario/productos_edit_form');
		}
		else{
			show_404();
		}
	}
	public function productos_get(){
		if($this->input->is_ajax_request()){
			$datos= array(
				array("pro.producto_id axid,pro.barcode,pro.producto,pro.descripcion,pro.cant,pro.pventa,pro.updated_at,cat.categoria"),
				array('rest.productos pro','rest.categorias cat'),
				array('NULL', 'pro.categoria_id = cat.categoria_id')
			 );
			$datos = $this->arixkernel->arixkernel_obtener_complex_data($datos,0,['pro.estado'=>true],['pro.cant','asc']);
			//$datos = $this->arixkernel->arixkernel_obtener_simple_data('producto_id axid,barcode,producto,descripcion,cant,pventa,updated_at', 'rest.productos', 0, ['estado'=>true],['cant','desc']);
			for ($i=0; $i < count($datos); $i++) { 
				$datos[$i]->updated_at = date('d/m/Y', strtotime($datos[$i]->updated_at));
				$datos[$i]->axid = $this->serv_cifrado->cod_cifrar_cadena($datos[$i]->axid);
			}
			echo json_encode($datos);							
		}else{
			show_404();
		}
	}
	public function productos_get_one(){
		if($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$producto_id = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtdata')));
			$datos= array(
				array("pro.barcode,pro.producto,pro.descripcion,pro.image,pro.pventa,cat.categoria,uni.unidad"),
				array('rest.productos pro','rest.categorias cat','rest.unidades uni'),
				array('NULL', 'pro.categoria_id = cat.categoria_id','pro.unidad_id = uni.unidad_id')
			 );
			$datos = $this->arixkernel->arixkernel_obtener_complex_data($datos,0,['pro.estado'=>true,'pro.producto_id'=>$producto_id]);
			echo json_encode(array_merge((array)$datos[0],['status'=>true]));					
		}else{
			show_404();
		}
	}
	
	public function productos_get_metric(){
		if ($this->input->is_ajax_request()){							
			$consulta = $this->arixkernel->arixkernel_obtener_simple_data("unidad_id axid, concat(unidad,' (',sufijo,')') metric", 'rest.unidades',0,'',array('unidad','desc'));
			for ($i=0; $i < count($consulta); $i++) { 
				$consulta[$i]->axid= $this->serv_cifrado->cod_cifrar_cadena($consulta[$i]->axid);
			}
			echo json_encode($consulta);
		}else{
			show_404();
		}
	}
	public function productos_get_category(){
		if ($this->input->is_ajax_request()){							
			$consulta = $this->arixkernel->arixkernel_obtener_simple_data('categoria_id axid, categoria', 'rest.categorias',0,'',array('categoria','desc'));
			for ($i=0; $i < count($consulta); $i++) { 
				$consulta[$i]->axid= $this->serv_cifrado->cod_cifrar_cadena($consulta[$i]->axid);
			}
			echo json_encode($consulta);
		}else{
			show_404();
		}
	}
	public function productos_duplicate_check(){// OK
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$consulta = $this->arixkernel->arixkernel_obtener_data_by_id('barcode', 'rest.productos', false, array('barcode'=>$this->input->post('txtdata')));		
			if(!is_null($consulta)){
				echo json_encode(array('status'=>true));
			}else{
				echo json_encode(array('status'=>false));
			}
		}else{
			show_404();
		}
	}
	public function codbarras(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('templates/person_add');
		}
		else{
			show_404();
		}
	}
	/*public function proveedor_get_duplicate(){
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$doc = strrev($this->input->post('txtdata'));
			//$doc = '48207109';
			//solo buscamos en la db personas y ya está queda			
			$consulta = $this->arixkernel->arixkernel_obtener_data_by_id("persona_id axid, concat(documento,' - ', nombres,', ', paterno,' ', materno) datas", 'private.personas', false, array('documento'=>$doc));
			if(!is_null($consulta)){
				$consulta->axid= $this->serv_cifrado->cod_cifrar_cadena($consulta->axid);
				echo json_encode(array_merge((array)$consulta,array('status'=>true)));
			}else{
				echo json_encode(array('status'=>false));//ya esta registrado
			}
		}else{
			show_404();
		}
	}*/
	public function productos_post_add(){
		if ($this->input->is_ajax_request() && $this->input->post('txtcontnumber')){
			//$datos = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtproveedorid')));
			$proveedor = $this->input->post('txtproveedorid');
			$proveedor = $proveedor==""?null:intval($this->serv_cifrado->cod_decifrar_cadena($proveedor));
			$pcompra = floatval($this->input->post('txtproductcompraunit'));//compra ???
			$cant = intval($this->input->post('txtproductstock'));//cant
			$cat = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtproductcat'))); //categoria
			//$proveedor = $datos>0?$datos:null;			
			$datas[0] = [
				'barcode' => $this->input->post('txtcontnumber'),//barcode
				'cant' => $cant,//cant
				'producto' => $this->input->post('txtproductname'),//name
				'pventa' => floatval($this->input->post('txtproductpriseunit')),//venta
				'descripcion' => $this->input->post('txtproductdescription'),								
				'proveedor_id' => $proveedor,
				'ownmake'=>$cat==1?true:false,///only for restaurant
				'image' => $this->input->post('txtimgproductid'),//img
				'unidad_id' => intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtunidadme'))), //unidad
				'categoria_id' => $cat,
				'updated_at' => date("Y-m-d H:i:s"),
				'created_at' => date("Y-m-d H:i:s")
			];
			if ($cant > 0){//contar como ingresos ->  ingresar productos -> ingresar x_entradas
				$datas[1] = [
					'proveedor_id'=>$proveedor,
					'sucursal_id'=>$this->serv_administracion_usuarios->use_obtener_sucursal_id_actual(),
					'cuenta_id'=> $this->serv_administracion_usuarios->use_obtener_actual_cuenta_id(),
					'comprobante_id'=>2,
					'comprobserie'=> 'init'.uniqid(),
					'fecha' => date("Y-m-d H:i:s"),
					'axlog' => $this->serv_administracion_usuarios->use_obtener_actual_usuario().' -> CREADO -> EL '.date('d-m-Y H:i'),
					'updated_at' => date("Y-m-d H:i:s"),
					'created_at' => date("Y-m-d H:i:s")
				];
				$datas[2] = [
					//'entrada_id'=>'automaticamente',
					//'producto_id'=>'automaticamente',
					'cant'=> $cant, // |i++| //agrega al stock(cantidad)
					'punit'=>$pcompra,
					'axlog'=>$this->serv_administracion_usuarios->use_obtener_actual_usuario().' -> CREADO -> EL '.date('d-m-Y H:i'),
					'updated_at' => date("Y-m-d H:i:s"),
					'created_at' => date("Y-m-d H:i:s")
				];
				unset($pcompra,$cant,$cat,$proveedor);
				//echo json_encode($datas);
				$datas = $this->arixkernel->arixkernel_guargar_arbol_data($datas, ['rest.productos','rest.entradas','rest.x_entradas']);
				echo json_encode(['status'=>$datas['status']]);
			}else{
				unset($pcompra,$cant,$cat,$proveedor);
				$datas = $this->arixkernel->arixkernel_guargar_simple_data($datas[0], 'rest.productos');
				echo json_encode(['status'=> $datas['status']]);
			}
		}else{
			show_404();
		}
	}
	public function productos_path_suspend(){
		if($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$producto_id = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtdata')));		
			//$producto_id = 3;
			$producto_id = $this->arixkernel->arixkernel_actualizar_simple_data(['estado'=>false,'updated_at'=>date('Y-m-d H:i:s')],'rest.productos',['producto_id'=>$producto_id]);
			echo json_encode($producto_id);
		}else{
			show_404();
		}
	}
	/************PROVEEDORES******* */

	//debe buscar en proveedores°°personas |si no hay|  buscarn en personas si hay| agregar persona-> rest.proveedores 
	public function proveedores_post_search(){
		if ($this->input->is_ajax_request() && $this->input->post()){
			$doc = strrev($this->input->post('txtdata'));
			//$doc = '702402540';				
			$tablebase = array(
				array("pro.proveedor_id axid ,concat(per.documento,' - ', per.nombres,', ', per.paterno,' ', per.materno) as data"),
				array('rest.proveedores pro','private.personas per'	),
				array('NULL', 'pro.persona_id = per.persona_id')
			 );
			$consulta = $this->arixkernel->arixkernel_obtener_complex_data($tablebase,0,array('per.documento'=>$doc));
			if(!empty($consulta)){				
				$consulta[0]->axid = $this->serv_cifrado->cod_cifrar_cadena($consulta[0]->axid);				
				echo json_encode(array_merge((array)$consulta[0],['status'=>true]));
			}else{
				//sin resultados
				echo json_encode(array('status'=>false));
			}
			/*}else{//buscar en personas y agregar automicamente en schema rest
				$consulta = $this->arixkernel->arixkernel_obtener_data_by_id("persona_id", 'private.personas', false, array('documento'=>$doc));
				if(!is_null($consulta)){
					$consulta = $this->arixkernel->arixkernel_guargar_simple_data(['persona_id'=>$consulta->persona_id], 'rest.proveedores');
					//recumera los datos recien registrados
					$consulta = $this->arixkernel->arixkernel_obtener_complex_data($tablebase,0,array('pro.proveedor_id'=>$consulta['id']));
					$consulta[0]->axid = $this->serv_cifrado->cod_cifrar_cadena($consulta[0]->axid);
					echo json_encode(array_merge((array)$consulta[0],array('status'=>true)));
				}else{
					//sin resultados
					echo json_encode(array('status'=>false));
				}
			}	*/		
		}else{
			show_404();
		}
	}
	public function proveedores_form_add(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_restinventario/templates/proveedores_form_add');
		}else{
			show_404();
		}
	}
	public function proveedores_post_add(){
		if($this->input->is_ajax_request() && $this->input->post('txtperdni')){
			$persona_id = $this->input->post('txtpesonaid')==''?null:intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtpesonaid')));
			$datos = array(
				array(
					'documento'=>$this->input->post('txtperdni'),
					'nombres'=>$this->input->post('txtpername'),
					'paterno'=>$this->input->post('txtperlasname'),
					'materno'=>$this->input->post('txtfirstname'),
					'nacimiento'=>date("Y-m-d", strtotime(str_replace('/', '-',$this->input->post('txtborndate')))),
					'sexo'=>intval($this->input->post('txtpersexe')),
					'direccion'=>$this->input->post('txtperaddress'),
					'distrito_id'=>intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtperdistrite'))),
					'correo'=>$this->input->post('txtperemail'),
					'telefono'=>$this->input->post('txtperphone'),
					'tipo'=>boolval($this->input->post('txtpertype')),
					'fotografia'=>'public/images/users/tu39hnri84fhe2.png'
				),
				array(
					//'persona_id' => $persona_id
					'updated_at'=> date("Y-m-d")
				)
			);
			if(is_null($persona_id)==true){//insert personas
				$datos = $this->arixkernel->arixkernel_guargar_sequencial_data($datos,['private.personas','rest.proveedores']);
				$persona_id = end($datos['ids']);
				$persona_id = $this->serv_cifrado->cod_cifrar_cadena($persona_id);
				echo json_encode(array_merge(['status'=>$datos['status']],['ids'=>$persona_id]));
			}else{//update personas
				$datos[1]['persona_id'] = $persona_id;
				$datos = $this->arixkernel->arixkernel_actualizar_guardar_data($datos, ['private.personas','rest.proveedores'],["persona_id"=>$persona_id]);
				$datos['ids'] = $this->serv_cifrado->cod_cifrar_cadena($datos['ids']);
				echo json_encode($datos);
			}
		}else{
			show_404();
		}
	}
	public function proveedores_duplicate_check(){// OK
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$doc = strrev($this->input->post('txtdata'));
			//$doc = '71790783';
			$tablebase = array(
				array("pro.proveedor_id axid"),
				array('rest.proveedores pro','private.personas per'	),
				array('NULL', 'pro.persona_id = per.persona_id')
			 );
			$consulta = $this->arixkernel->arixkernel_obtener_complex_data($tablebase,0,array('per.documento'=>$doc));
			if(!empty($consulta)){
				//se encuantra registrado
				echo json_encode(array('status'=>true));
			}else{//no se encuntra registrado
				//busquemos resitros en private.peronsas
				$consulta = $this->arixkernel->arixkernel_obtener_data_by_id("persona_id axid,distrito_id,nombres,paterno,materno,nacimiento,sexo,telefono,direccion,correo,tipo", 'private.personas', false, array('documento'=>$doc));
				if(!is_null($consulta)){
					$consulta->tipo = intval($consulta->tipo);
					$consulta->nacimiento = date("d/m/Y", strtotime($consulta->nacimiento));
					$consulta->axid= $this->serv_cifrado->cod_cifrar_cadena($consulta->axid);
					$depas = $this->arixkernel->arixkernel_obtener_data_by_id("distrito,provincia,departamento", 'config.v_distr_prov_depa', false, array('distrito_id'=>$consulta->distrito_id));
					echo json_encode(['status'=>false, 'extra'=>array_merge((array)$consulta,(array)$depas)]);
				}else{
					echo json_encode(array('status'=>false, 'extra'=>false));
				}				
			}
		}else{
			show_404();
		}
	}

	public function axconfig_generate_ticket() {
		$this->load->library('serv_ticket');
		$this->serv_ticket->SetTitle("Arix Ticket Layout");
		$this->serv_ticket->AliasNbPages();
		//$this->serv_ticket->AddPage(); 
		$this->serv_ticket->tableDatos();		
		$this->serv_ticket->Output("Arix Tiket".date('d-m-Y H:i:s').'.pdf', 'I');
    }
}