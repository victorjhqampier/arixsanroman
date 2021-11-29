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
		$js = $this->serv_ejecucion_app->exe_cargar_axjs(array('axjs-dataTables','axjs-validate-p1','axjs-validate-p2','axjs-mask','cropperjs','restinventariojs'));
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
	public function consultar(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_restinventario/pruebas');
		}
		else{
			show_404();
		}
	}
	public function productos_get(){
		if($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$catCondition = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtdata')));
			
			$datos= array(
				array("pro.producto_id axid,pro.barcode,pro.producto,pro.descripcion,xps.cant, concat('S/ ',pro.pcompra) pcompra, concat('S/ ',pro.pventa) pventa,cat.categoria"),
				array(
					'rest.x_productosucursal xps',
					'rest.productos pro',
					'rest.categorias cat'),
				array('NULL',
					'xps.producto_id = pro.producto_id',
					'pro.categoria_id = cat.categoria_id')
			);
			$suc_id = $this->serv_administracion_usuarios->use_obtener_sucursal_id_actual();
			$catCondition  = $catCondition == 0?['pro.estado'=>true,'xps.sucursal_id'=>$suc_id]:['pro.estado'=>true,'pro.categoria_id'=>$catCondition,'xps.sucursal_id'=>$suc_id];
			
			$datos = $this->arixkernel->arixkernel_obtener_complex_data($datos,0,$catCondition,['xps.cant','asc']);
			for ($i=0; $i < count($datos); $i++) {
				$datos[$i]->axid = $this->serv_cifrado->cod_cifrar_cadena($datos[$i]->axid);
			}
			echo json_encode($datos);							
		}else{
			show_404();
		}
	}
	public function productos_get_simple(){
		if($this->input->is_ajax_request() && $this->input->post('txtdata')){			
			$catCondition = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtdata')));
			//$catCondition = 1;
			$datos= array(
				array("pro.barcode,concat('(',xps.cant,') ',pro.descripcion) descripcion, concat(pro.producto,' - S/',pro.pventa) producto,pro.image"),
				array(
					'rest.x_productosucursal xps',
					'rest.productos pro'),
				array(
					'NULL',
					'xps.producto_id = pro.producto_id')
			);
			$suc_id = $this->serv_administracion_usuarios->use_obtener_sucursal_id_actual();
			$catCondition  = $catCondition == 0?['pro.estado'=>true,'xps.sucursal_id'=>$suc_id]:['pro.estado'=>true,'pro.categoria_id'=>$catCondition,'xps.sucursal_id'=>$suc_id];
			
			$datos = $this->arixkernel->arixkernel_obtener_complex_data($datos,0,$catCondition,['pro.producto','asc']);
			echo json_encode($datos);

		}else{
			show_404();
		}
	}
	public function productos_get_one(){
		if($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$producto_id = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtdata')));
			//$producto_id = 26;
			$datos= array(
				array("pro.proveedor_id axid,pro.barcode,pro.producto,pro.descripcion,pro.image,pro.pventa,pro.pcompra,cat.categoria, concat(uni.unidad,' (',uni.sufijo,')') unidad"),
				array('rest.productos pro','rest.categorias cat','rest.unidades uni'),
				array('NULL', 'pro.categoria_id = cat.categoria_id','pro.unidad_id = uni.unidad_id')
			 );
			$datos = $this->arixkernel->arixkernel_obtener_complex_data($datos,0,['pro.estado'=>true,'pro.producto_id'=>$producto_id]);
			$datos = (array)$datos[0];

			if (!is_null($datos['axid'])){
				$tablebase = array(
					array("concat(per.documento,' - ', per.nombres,', ', per.paterno,' ', per.materno) as data"),
					array('rest.proveedores pro','private.personas per'	),
					array('NULL', 'pro.persona_id = per.persona_id')
				);
				$tablebase = $this->arixkernel->arixkernel_obtener_complex_data($tablebase,0,['pro.proveedor_id'=>$datos['axid']]);
				$datos['proveedor'] = $tablebase[0]->data;
				$datos['axid'] = $this->serv_cifrado->cod_cifrar_cadena($datos['axid']);
			}
			echo json_encode(array_merge($datos,['status'=>true]));				
		}else{
			show_404();
		}
	}
	public function entraddas_productos_get_one(){
		if($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$producto_id = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtdata')));
			//$producto_id = 26;
			$datos= array(
				array("pro.proveedor_id axid,pro.barcode,pro.producto,pro.descripcion,pro.image,pro.pventa,pro.pcompra,cat.categoria, concat(uni.unidad,' (',uni.sufijo,')') unidad"),
				array('rest.productos pro','rest.categorias cat','rest.unidades uni'),
				array('NULL', 'pro.categoria_id = cat.categoria_id','pro.unidad_id = uni.unidad_id')
			 );
			$datos = $this->arixkernel->arixkernel_obtener_complex_data($datos,0,['pro.estado'=>true,'pro.producto_id'=>$producto_id]);
			$datos = (array)$datos[0];

			if (!is_null($datos['axid'])){
				$tablebase = array(
					array("concat(per.documento,' - ', per.nombres,', ', per.paterno,' ', per.materno) as data"),
					array('rest.proveedores pro','private.personas per'	),
					array('NULL', 'pro.persona_id = per.persona_id')
				);
				$tablebase = $this->arixkernel->arixkernel_obtener_complex_data($tablebase,0,['pro.proveedor_id'=>$datos['axid']]);
				$datos['proveedor'] = $tablebase[0]->data;
				$datos['axid'] = $this->serv_cifrado->cod_cifrar_cadena($datos['axid']);
			}
			echo json_encode(array_merge($datos,['status'=>true]));				
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
	public function productos_get_comprobantes(){
		if ($this->input->is_ajax_request()){							
			$consulta = $this->arixkernel->arixkernel_obtener_simple_data("comprobante_id axid, comprobante", 'rest.comprobantes');
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
	public function productos_post_add(){
		if ($this->input->is_ajax_request() && $this->input->post('txtcontnumber')){

			$proveedor = $this->input->post('txtproveedorid');
			$proveedor = $proveedor==""?null:intval($this->serv_cifrado->cod_decifrar_cadena($proveedor));
			$pcompra = floatval($this->input->post('txtproductcompraunit'));//compra ???
			$cant = intval($this->input->post('txtproductstock'));//cant
			$cat = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtproductcat'))); //categoria
						
			$datas[0] = [
				'barcode' => $this->input->post('txtcontnumber'),//barcode
				//'cant' => $cant,//cant
				//'cantvirtual' => $cant,//cant
				'producto' => $this->input->post('txtproductname'),//name
				'pventa' => floatval($this->input->post('txtproductpriseunit')),//venta
				'pcompra' => $pcompra,
				'descripcion' => $this->input->post('txtproductdescription'),								
				'proveedor_id' => $proveedor,
				'ownmake'=>$cat==1?true:false,///only for restaurant
				'image' => $this->input->post('txtimgproductid'),//img
				'unidad_id' => intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtunidadme'))), //unidad
				'categoria_id' => $cat,
				'updated_at' => date("Y-m-d H:i:s"),
				'created_at' => date("Y-m-d H:i:s")
			];
			$cat = $this->serv_administracion_usuarios->use_obtener_sucursal_id_actual();
			$manyDatas[0] = [
				'sucursal_id' => $cat,		
				'cant' => $cant,
				'cantvirtual' => $cant
			];
			$consulta = $this->arixkernel->arixkernel_obtener_simple_data('sucursal_id', 'config.sucursales',0,['sucursal_id !='=>$cat]);
			for ($i=0; $i < count($consulta); $i++) {
				$manyDatas[$i+1] = [
					'sucursal_id' => $consulta[$i]->sucursal_id,		
					'cant' => 0,
					'cantvirtual' => 0
				];
			}
			if ($cant > 0){//contar como ingresos ->  ingresar productos -> ingresar x_entradas
				$datas[1] = [
					'proveedor_id'=>$proveedor,
					'sucursal_id'=>$cat,
					'cuenta_id'=> $this->serv_administracion_usuarios->use_obtener_actual_cuenta_id(),
					'comprobante_id'=>2,
					'comprobserie'=> 'axini'.uniqid(),
					'fecha' => date("Y-m-d"),
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
				$datas = $this->arixkernel->arixkernel_guargar_arbol_batch($datas, $manyDatas,['rest.productos','rest.entradas','rest.x_entradas','rest.x_productosucursal']);
				echo json_encode(['status'=>$datas['status']]);
			}else{
				unset($pcompra,$cant,$cat,$proveedor);
				$datas = $this->arixkernel->arixkernel_guargar_sequencial_batch($datas[0], $manyDatas,['rest.productos','rest.x_productosucursal']);
				echo json_encode(['status'=> $datas['status']]);
			}
		}else{
			show_404();
		}
	}

	public function productos_update(){
		if ($this->input->is_ajax_request() && $this->input->post('txtcontnumber')){
			$producto_id = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtproductoid')));
			$proveedor = $this->input->post('txtproveedorid');
			$proveedor = $proveedor==""?null:intval($this->serv_cifrado->cod_decifrar_cadena($proveedor));
			$cant = intval($this->input->post('txtproductstock'));//add to stoq
			$cat = intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtproductcat'))); //categoria
			$datas = [
				'barcode' => $this->input->post('txtcontnumber'),//barcode
				//'cant' => $cant,//esto debe agregar al stok actual
				'producto' => $this->input->post('txtproductname'),//name
				'pventa' => floatval($this->input->post('txtproductpriseunit')),//venta
				'pcompra' => floatval($this->input->post('txtproductcompraunit')),//compra
				'descripcion' => $this->input->post('txtproductdescription'),								
				'proveedor_id' => $proveedor,
				'ownmake'=>$cat==1?true:false,///only for restaurant
				'image' => $this->input->post('txtimgproductid'),//img
				'unidad_id' => intval($this->serv_cifrado->cod_decifrar_cadena($this->input->post('txtunidadme'))), //unidad
				'categoria_id' => $cat,
				'updated_at' => date("Y-m-d H:i:s")
			];
			$cat = $this->serv_administracion_usuarios->use_obtener_sucursal_id_actual();
			$datas = $this->arixkernel->arixkernel_actualizar_producto_data($datas, ['rest.productos','rest.x_productosucursal'],["producto_id"=>$producto_id],['producto_id' =>$producto_id, 'sucursal_id'=>$cat],$cant);
			echo json_encode($datas);
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

	/*****------------- cajas------------** */
	public function cajas(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_restinventario/cajas');
		}
		else{
			show_404();
		}
	}
	public function cajas_get(){
		if($this->input->is_ajax_request()){
			$datos= array(
				array("caj.updated_at,caj.caja_id axid, caj.caja, caj.num,caj.base,caj.sesion,concat(suc.numero,' ',suc.nombre) sucur"),
				array('rest.cajas caj','config.sucursales suc'),
				array('NULL', 'caj.sucursal_id = suc.sucursal_id')
			 );
			$datos = $this->arixkernel->arixkernel_obtener_complex_data($datos,0);
			for ($i=0; $i < count($datos); $i++) {
				$datos[$i]->sesion = $datos[$i]->sesion == true? 'Activo': 'Libre';
				$datos[$i]->axid = $this->serv_cifrado->cod_cifrar_cadena($datos[$i]->axid);
			}
			echo json_encode($datos);							
		}else{
			show_404();
		}
	}
	
	/*****------------- ENTRADAS,PRODUCTOS ------------** */
	public function enproductos(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_restinventario/enproductos_get_view');
		}
		else{
			show_404();
		}
	}
	public function enproductos_final_form(){
		if ($this->input->is_ajax_request()) {
			$this->load->view('app_restinventario/templates/en_product_final');
		}
		else{
			show_404();
		}
	}
	public function entradas_productos_get_one(){
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){
			$barcode = $this->input->post('txtdata');
			//$barcode = "4852452021";						
			$consulta = $this->arixkernel->arixkernel_obtener_simple_data('producto_id axid,barcode,producto,pcompra', 'rest.productos',0,['barcode'=>$barcode]);
			if (!empty($consulta)){
				$consulta[0]->axid= $this->serv_cifrado->cod_cifrar_cadena($consulta[0]->axid);
				echo json_encode(array_merge((array)$consulta[0],['status'=>true]));
			}else{
				echo json_encode(['status'=>false,'error'=>true]);
			}			
		}else{
			show_404();
		}
	}
	public function en_productos_post_add(){
		if ($this->input->is_ajax_request() && $this->input->post('txtdata')){
			//$alldata = json_decode('[{"name":"txtproveedordoc","value":"48207109"},{"name":"txtproveedordscrb","value":"48207109 - VICTOR JHAMPIER, CAXI MAQUERA"},{"name":"txtproveedorid","value":"7F775B1A70BE2RWt1QXBDNkU3dWtEZnVIbW5DdWNOQT09"},{"name":"txtunidadme","value":"7F775B1A70BE2MnFEVGhDR2RIRHI1MlpvVVlMRHgrUT09"},{"name":"txtproductnumcompro","value":"01234556"},{"name":"txtproductvenci","value":"2021-11-19"},[{"txtproductid":"F9B3B5F2A8B08NjNqSWh6UHZCdkFsV2U5cG9kVm5adz09","txtproductvenc":"","txtproductbarcode":"PR2100031","txtproductname":"Vodka RUSSKAYA Botella 750ml","txtproductcant":"1","txtproductpcompra":"0.00","txtproductimporte":"0.00"},{"txtproductid":"42B1F54D1306Dc085c3Bna2loNmFWY2RWTGtrcjEwUT09","txtproductvenc":"","txtproductbarcode":"45677584345","txtproductname":"JOHNNIE WALKER Red Label 750ml + Gaseo + Vaso","txtproductcant":"1","txtproductpcompra":"30.00","txtproductimporte":"30.00"}]]');
			$alldata = json_decode($this->input->post('txtdata'));
			$entradas = [
				'proveedor_id'=>$alldata[2]->value ==""?null:intval($this->serv_cifrado->cod_decifrar_cadena($alldata[2]->value)),
				'sucursal_id'=>intval($this->serv_administracion_usuarios->use_obtener_sucursal_id_actual()),
				'cuenta_id'=> $this->serv_administracion_usuarios->use_obtener_actual_cuenta_id(),
				'comprobante_id'=>intval($this->serv_cifrado->cod_decifrar_cadena($alldata[3]->value)),
				'comprobserie'=> $alldata[4]->value,
				'fecha' => $alldata[5]->value,
				'axlog' => $this->serv_administracion_usuarios->use_obtener_actual_usuario().' -> CREADO -> EL '.date('d-m-Y H:i'),
				'updated_at' => date("Y-m-d H:i:s"),
				'created_at' => date("Y-m-d H:i:s")
			];

			$alldata = $alldata[6];
			for($i=0;$i<count($alldata);$i++){
				$alldata[$i]->txtproductid = $this->serv_cifrado->cod_decifrar_cadena($alldata[$i]->txtproductid);
			}
			$alldata = $this->arixkernel->arixkernel_guargar_actualizar_entradas($entradas, $alldata,$this->serv_administracion_usuarios->use_obtener_sucursal_id_actual());
			$alldata['ids'] = $this->serv_cifrado->cod_cifrar_cadena($alldata['ids']);
			echo json_encode($alldata);
		}else{
			show_404();
		}
	}

	public function en_productos_get_ticket($ids) {
		//if(intval($this->serv_cifrado->cod_decifrar_cadena($ids))){
			//$arrDa =	[1,2,3];
			//echo round(count($arrDa)*10.15) + 1;
		$ids = intval($this->serv_cifrado->cod_decifrar_cadena($ids));
		if(intval($ids)){
			$datos= array(
				['ent.entrada_id, ent.proveedor_id proveedor, ent.fecha, ent.updated_at',
				"suc.numero,CONCAT(UPPER(suc.rsocial),' - RUC: ',suc.ruc) rsocial,suc.nombre, CONCAT(suc.direccion,' - ',dis.distrito) direccion",
				"CONCAT(UPPER(com.comprobante),' No. ',ent.comprobserie) comprobante, concat(per.nombres,' ',per.paterno,' ',per.materno) responsable"
				],
				['rest.entradas ent',
					'config.sucursales suc',
					'private.distritos dis',
					'rest.comprobantes com',
					'config.cuentas cue',
					'config.contratos con',
					'private.personas per'
				],
				['NULL',
					'ent.sucursal_id = suc.sucursal_id',
					'suc.distrito_id = dis.distrito_id',
					'ent.comprobante_id = com.comprobante_id',
					'ent.cuenta_id = cue.cuenta_id',
					'cue.contrato_id = con.contrato_id',
					'con.persona_id = per.persona_id',
				]//,
				//['NULL','inner','inner','inner','inner','inner','inner']	
			);
			$datos = $this->arixkernel->arixkernel_obtener_complex_data($datos,0,['ent.entrada_id'=>$ids]);		
			if(!is_null($datos[0]->proveedor)){
				$prov = array(
					["concat(per.documento,' - ',per.nombres,' ',per.paterno,' ',per.materno,' (',per.telefono,')') proveedor"],
					['rest.proveedores pro','private.personas per'],
					['NULL','pro.persona_id=per.persona_id']
				);			
				$prov = $this->arixkernel->arixkernel_obtener_complex_data($prov,0,['pro.proveedor_id'=>$datos[0]->proveedor]);
				$datos[0]->proveedor = $prov[0]->proveedor;
			}
			$listPro = array(
				["right(pro.barcode,9) barcode, upper(pro.producto) producto,xen.expire,xen.cant,xen.punit,(xen.cant*xen.punit) importe"],
				['rest.x_entradas xen','rest.productos pro'],
				['NULL','xen.producto_id=pro.producto_id']
			);			
			$listPro = $this->arixkernel->arixkernel_obtener_complex_data($listPro,0,['xen.entrada_id'=>$ids]);
			
			array_push($datos,$listPro);
			
			$this->load->library('serv_ticket_rest_entradas',$datos);
			$this->serv_ticket_rest_entradas->SetTitle("Arix Ticket Entrada");
			
			$this->serv_ticket_rest_entradas->AliasNbPages();
			//$this->serv_ticket->AddPage(); 
			$this->serv_ticket_rest_entradas->tableDatos();
			$this->serv_ticket_rest_entradas->Output("Entradas".date('d-m-Y H:i:s').'.pdf', 'I');
		}else{
			show_404();
		}
    }



	function rest_awaut(){
		//sleep(5);
		//echo json_encode(['status'=>true]);
		echo ($this->serv_cifrado->cod_cifrar_cadena('3'));
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