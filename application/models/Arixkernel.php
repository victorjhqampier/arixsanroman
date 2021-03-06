<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
	este el nucleo de arix mee
	1- select_all_content(string, string, int)
	2- select_one_content(string, string, array)
	3- select_all_content_where(string, string, array, int)
	4- select_all_content_where_group(string,string, array, array)
	5- select_all_content_where_order($tupla,$tabla, $condicion [array], $order [array], $cant_registros = 100)
*/

/*
	Funciones del sistemas
	entrada == accesos
	15 === 8,4,2,1
	14 === 8,4,2
	12 === 8,4
	10 === 8,2
	08 === 8
	-----------------
	select = 8 (permiso)
	insert = 4 (permiso)
	update = 2 (permiso)
	delete = 1 (permiso)
*/

class Arixkernel extends CI_Model{	
	function __construct(){
		parent::__construct();
		date_default_timezone_set("America/Lima");
		$this->load->database('pdoarixdatabase');		
	}
	 private function arixkernel_table_to_id($plural){
        $plural = rtrim($plural, ' ');
        $plural = explode(".", $plural);
        $plural = $plural[count($plural)-1];
        $j = array('s','es','ces');
        $k = null;
        for ($i=0; $i < 3; $i++) {
            $ultimas = substr($plural,-1*($i+1));
            if($ultimas==$j[$i]){
                $k = $ultimas; 
            }else break;                       
        }
        $j = strlen($plural);
        $k = strlen($k);
        $plural = substr($plural, 0, $j-$k);
        return ($k==3)?$plural."z":$plural;
	}
	
	private function probar_permiso_user($dato = 'select'){// evalua si da permiso o no al usuario; resive como parametros CRUD
		$this->load->library('session');
		$this->db->select('binario');
		$permiso = $this->db->get_where('config.v_cuenta_permiso', array('cuenta_id' => $this->session->userdata('usuario')))->row();
		$dato = preg_replace('([^A-Za-z0-9])', '', $dato);
        $binario = array('select' => '1000', 'insert' => '0100', 'update' => '0010', 'delete' => '0001');        
        $permiso = $permiso->binario;
        $result = false;
        //usaremos compuerta logica AND
        for ($i=0; $i < 4; $i++) {
            $r = (substr($permiso, $i,1) and substr($binario[$dato], $i,1));
            if($r){
                $result = $r;
            }
            else{
                $r=false;//sin sentido
            }
        }
        return $result;
	}
	
	/*----------------------algoritmos obsoletos--- aun en uso-----------------*/
	public function select_all_content($tupla,$tabla, $cant_registros = 100){//selecciona N elementos de una tabla N>1
		$this->db->select($tupla);
		return $this->db->get($tabla,$cant_registros)->result();
	}
	public function select_all_content_where($tupla,$tabla, $condicion, $cant_registros = 100){ //selecciona N elementos de una tabla N>1 con una condicion
		$this->db->select($tupla);
		return $this->db->get_where($tabla, $condicion, $cant_registros)->result();
	}
	public function select_all_content_where_group($tupla,$tabla, $condicion, $group){
		$this->db->select($tupla);		
		$this->db->group_by($group);
		return $this->db->get_where($tabla,$condicion)->result();
	}
	public function select_all_content_order($tupla,$tabla, $orderby, $cant_registros = 100){
		$orderby = explode(",", $orderby);
		$this->db->select($tupla);		
		$this->db->order_by($orderby[0], $orderby[1]);
		return $this->db->get($tabla,$cant_registros)->result();
	}
	public function select_all_content_where_order($tupla,$tabla, $condicion, $orderby, $cant_registros = 100){
		$order = explode(",", $orderby);
		$this->db->select($tupla);		
		$this->db->order_by($orderby[0], $orderby[1]);
		return $this->db->get_where($tabla,$condicion,$cant_registros)->result();
	}
	public function select_one_content($tupla, $tabla, $condicion){//selecciona 1 elemento de un tabla
			$this->db->select($tupla);
			return $this->db->get_where($tabla, $condicion)->row();		
	}

/*----------------------algoritmos funcionales---------------------*/
	/*REESCRITURA DE LAS FUNCIONES*/

	//public function arixkernel_obtener_datos($tupla, $tabla, $limit = 100, $offset = 0, $array_condition = '', $array_orderby = '', $array_groupby = ''){

	//1: arixkernel_obtener_simple_data('submenu_id, submenu', 'config.v_menu_subapp', 0, 'app_id = 1003 AND rol >= 4', array('submenu_id','ASC'),array('submenu_id','submenu')
	public function arixkernel_obtener_simple_data($tupla, $tabla, $offset = 0, $array_condition = '', $array_orderby = '', $array_groupby = '',$limit=150){//PENDIENTE REVISAR SI TIENE ACCESO A TABLA 
		$array_condition = (null == $array_condition) ? array() : $array_condition;
		$array_orderby = (null == $array_orderby) ? array('','') : $array_orderby;
		$this->db->select($tupla);
		$this->db->group_by($array_groupby);
		$this->db->order_by($array_orderby[0],$array_orderby[1]);
		return $this->db->get_where($tabla, $array_condition, $limit, $offset)->result();
	}

	//public function arixkernel_obtener_id_dato($tupla, $tabla, $array_condicion){

	//1: arixkernel_obtener_data_by_id('*', 'private.personas', 2, array('documento'=>'70240254')
	//2: arixkernel_obtener_data_by_id('*', 'private.personas', false, array('documento'=>'70240254')
	public function arixkernel_obtener_data_by_id($tupla, $tabla, $compare_auto_id, $array_sec_condicion = ''){
		$array_sec_condicion = (null == $array_sec_condicion) ? array() : $array_sec_condicion;
		$this->db->select($tupla);
		if ($compare_auto_id==false) {			
			return $this->db->get_where($tabla, $array_sec_condicion)->row();
		}else{
			$table_id = $this->arixkernel_table_to_id($tabla).'_id';
			$this->db->where($table_id,$compare_auto_id);
			return $this->db->get_where($tabla, $array_sec_condicion)->row();
		}			
	}
	//1: arixkernel_obtener_complex_data(exe_contruir_consulta(array()), 0, array('sucursal_id >'=>0), array('sucursal_id','DESC'));
	public function arixkernel_obtener_complex_data($array_tabla_tupla, $offset = 0, $array_condition = '', $array_orderby = '',$array_groupby = '',$limit=150){//orderby en evaluacion
		$array_orderby = (null == $array_orderby) ? array('','') : $array_orderby;//PENDIENTE--- SOLO ACCESO A TABLAS PERMITIDAS
        $this->db->select(implode(",", $array_tabla_tupla[0]));
        $this->db->from($array_tabla_tupla[1][0]);
        for ($i=1; $i < count($array_tabla_tupla[1]); $i++) { 
            $this->db->join($array_tabla_tupla[1][$i], $array_tabla_tupla[2][$i],'inner');
		}
		$this->db->group_by($array_groupby);
        $this->db->order_by($array_orderby[0], $array_orderby[1]);
        $this->db->limit($limit, $offset);
        if($array_condition!=null){
        	$clave = array_keys ($array_condition);
        	$valor = array_values ($array_condition);
        	for ($i=0; $i < count($array_condition); $i++) {
            	$this->db->where($clave[$i], $valor[$i]);
        	}
        	return $this->db->get()->result();
        }
        else{
        	return $this->db->get()->result();
        }        
	}

	public function arixkernel_obtener_complex($array_tabla_tupla, $offset = 0, $array_condition = '', $array_orderby = '',$array_groupby = '',$limit=150){//orderby en evaluacion
		$array_orderby = (null == $array_orderby) ? array('','') : $array_orderby;//PENDIENTE--- SOLO ACCESO A TABLAS PERMITIDAS
        $this->db->select(implode(",", $array_tabla_tupla[0]));
        $this->db->from($array_tabla_tupla[1][0]);
        for ($i=1; $i < count($array_tabla_tupla[1]); $i++) { 
            $this->db->join($array_tabla_tupla[1][$i], $array_tabla_tupla[2][$i],$array_tabla_tupla[3][$i]);
		}
		$this->db->group_by($array_groupby);
        $this->db->order_by($array_orderby[0], $array_orderby[1]);
        $this->db->limit($limit, $offset);
        if($array_condition!=null){
        	$clave = array_keys ($array_condition);
        	$valor = array_values ($array_condition);
        	for ($i=0; $i < count($array_condition); $i++) {
            	$this->db->where($clave[$i], $valor[$i]);
        	}
        	return $this->db->get()->result();
        }
        else{
        	return $this->db->get()->result();
        }        
	}
	//FUNCION DE ROLLBACK
	//FUNCION DE INSERT
	//data = array(=>);
	//vevuelve el id que se a ingresado
	public function arixkernel_guargar_simple_data($data, $table){
		$this->db->trans_start();
			$this->db->insert($table, $data);
			$id = $this->db->insert_id();
		$this->db->trans_complete();
		if($this->db->trans_status()===FALSE){
			return array('status'=>false);
		}else{
			return array('status'=>true, 'id'=>$id);
		}
	}
	
	public function arixkernel_guargar_sequencial_data($datas, $tables){
		$insert = array();
		$this->db->trans_start();
		if($this->db->insert($tables[0], $datas[0])){
			$ids = $this->db->insert_id();
			array_push($insert,$ids);
			for ($i=1; $i < count($tables); $i++) {
				$datas[$i][$this->arixkernel_table_to_id($tables[$i-1]).'_id'] = $ids;				
				try{
					$this->db->insert($tables[$i], $datas[$i]);
					$ids = $this->db->insert_id();
					array_push($insert,$ids);
				}catch (PDOException $e){
					$this->db->rollback();
				}
			}
			$this->db->trans_complete();
			if($this->db->trans_status()===FALSE){
				return array('status'=>false);
			}else{
				return array('status'=>true, 'ids'=>$insert);
			}
		}else{
			return false;
		}	
	}
	//data = array=> table = array
	//solo recibe tres tablas las dos primeras con relacion muchos  muchos, tercero es la relacions
	public function arixkernel_guargar_arbol_data($datas, $tables){
		//$insert = array();
		$this->db->trans_start();
			try{
				$this->db->insert($tables[0], $datas[0]);
				$ids[0] = $this->db->insert_id();
				//array_push($insert,$ids);

				$this->db->insert($tables[1], $datas[1]);
				$ids[1] = $this->db->insert_id();
				//array_push($insert,$ids);

				$datas[2][$this->arixkernel_table_to_id($tables[0]).'_id'] = $ids[0];
				$datas[2][$this->arixkernel_table_to_id($tables[1]).'_id'] = $ids[1];
				$this->db->insert($tables[2], $datas[2]);
			}catch (PDOException $e){
				$this->db->rollback();
			}
		$this->db->trans_complete();
		if($this->db->trans_status()===FALSE){
			return array('status'=>false);
		}else{
			return array('status'=>true, 'ids'=>$ids);
		}
	}
	//arixkernel_actualizar_guardar_data(array(=>actualizar),array(=>guardar),array(=>condiciones de actualizacion))
	public function arixkernel_actualizar_guardar_data($datas, $tables,$update_con){
		$ids = 0;		
		$this->db->trans_start();			
			try{
				$this->db->where($update_con);
				$this->db->update($tables[0], $datas[0]);
				if($this->db->affected_rows()){
					$this->db->insert($tables[1], $datas[1]);
					$ids = $this->db->insert_id();
				}else{
					throw new Exception('No affected rows');
				}				
			}catch (PDOException $e){
				$this->db->rollback();
			}
		$this->db->trans_complete();
		if($this->db->trans_status()===FALSE){
			return array('status'=>false);
		}else{
			return array('status'=>true,'ids'=>$ids);
		}
	}
	//arixkernel_actualizar_guardar_data(array(=>actualizar),array(=>guardar),array(=>condiciones de actualizacion))
	//esto puede reemplazar al de arriva  = arixkernel_actualizar_guardar_data
	public function arixkernel_actualizar_guardar_multiple($datas, $tables,$update_con){//solo el primero puede actualizarse $datas[0] el rrsto se inserta
		$this->db->trans_start();			
			try{
				$this->db->where($update_con);
				$this->db->update($tables[0], $datas[0]);
				if($this->db->affected_rows()){
					for($i=1;$i<count($datas);$i++){
						$this->db->insert($tables[$i], $datas[$i]);						
					}					
				}else{
					throw new Exception('No affected rows');
				}				
			}catch (PDOException $e){
				$this->db->rollback();
			}
		$this->db->trans_complete();
		if($this->db->trans_status()===FALSE){
			return array('status'=>false);
		}else{
			return array('status'=>true);
		}
	}
	
	//arixkernel_actualizar_simple_data(array(), string, array())
	public function arixkernel_actualizar_simple_data($data, $table,$condition){
		$this->db->trans_start();			
			try{
				$this->db->where($condition);
				$this->db->update($table, $data);
				if(!$this->db->affected_rows()){
					throw new Exception('No affected rows');
				}				
			}catch (PDOException $e){
				$this->db->rollback();
			}
		$this->db->trans_complete();
		if($this->db->trans_status()===FALSE){
			return array('status'=>false);
		}else{
			return array('status'=>true);
		}
	}
	
	//arixkernel_actualizar_serial_data(array([],[]), [],array([],[]));
	public function arixkernel_actualizar_serial_data($datas, $tables,$conditions){
		$this->db->trans_start();			
			try{
				for($i=0;$i<count($tables);$i++){
					$this->db->where($conditions[$i]);
					$this->db->update($tables[$i], $datas[$i]);
					if(!$this->db->affected_rows()){
						throw new Exception('No affected rows');
					}
				}								
			}catch (PDOException $e){
				$this->db->rollback();
			}
		$this->db->trans_complete();
		if($this->db->trans_status()===FALSE){
			return array('status'=>false);
		}else{
			return array('status'=>true);
		}
	}

	/***--------------------ARIX JOB--------USABLE */
	//arixkernel_actualizar_simple_data(array(), string, array())
	public function arixkernel_update_data_noanswer($data,$table,$condition){
		$this->db->trans_start();			
			$this->db->where($condition);
			$this->db->update($table, $data);
		$this->db->trans_complete();
		if($this->db->trans_status()===FALSE){
			return array('status'=>false);
		}else{
			return array('status'=>true);
		}
	}

	/* ------------------------------NON TRANSACTIONS---------------------------------- */
	public function arixkernel_guargar_simple_data_nontransaction($data, $table){
		$this->db->insert($table, $data);
		return $this->db->insert_id();
		
	}
	public function arixkernel_actualizar_or_guardar_data_nontransaction($datas, $table,$update_con){//solom acepta dos condiciones
		for($i=0;$i<count($datas);$i++){
			$this->db->where(array($update_con[0]=>$datas[$i][$update_con[0]],$update_con[1]=>$datas[$i][$update_con[1]]));
			$this->db->update($table, $datas[$i]);
			if(!$this->db->affected_rows()){
				$this->db->insert($table, $datas[$i]);
			}
		}
	}

	/***********  CONSULTAS PERSONALIZADAS POR REST******* */
	//selecciona una columna y le agrea lo deseado arr_columna [columna, cant a sumar ] ['producto_id' =>0, 'sucursal_id'=>0]
	public function arixkernel_actualizar_producto_data($data, $table,$arrConOne, $arrContwo,$inCant){
		$this->db->trans_start();			
			try{
				$this->db->select('cant, cantvirtual');
				$temp = $this->db->get_where($table[1], $arrContwo)->row();
				$xdata['cant'] = intval($temp->cant) + (intval($inCant));
				$xdata['cantvirtual'] = intval($temp->cantvirtual) + (intval($inCant));

				$this->db->where($arrConOne);
				$this->db->update($table[0], $data);

				$this->db->where($arrContwo);
				$this->db->update($table[1], $xdata);
				if(!$this->db->affected_rows()){
					throw new Exception('No affected rows');
				}				
			}catch (PDOException $e){
				$this->db->rollback();
			}
		$this->db->trans_complete();
		if($this->db->trans_status()===FALSE){
			return array('status'=>false);
		}else{
			return array('status'=>true);
		}
	}
	// data[0]=entradas, data[1]=productos || [entradas,productos,x_entradas, x_producsucu] || --- || [canttidad, , $var]
	public function arixkernel_guargar_actualizar_entradas($entrada, $productos, $sucuId){
		$this->db->trans_start();			
			try{

				$this->db->insert('rest.entradas', $entrada);
				$entrada_id = $this->db->insert_id();
				$xProducto= [];
				for($i=0;$i<count($productos);$i++){

					$producto_id = $productos[$i]->txtproductid;
					$productCompra['pcompra'] = floatval($productos[$i]->txtproductpcompra);

					$this->db->select('cant,cantvirtual');
					$arrProSuc = $this->db->get_where('rest.x_productosucursal', ['producto_id'=>$producto_id,'sucursal_id'=>$sucuId])->row();
										
					$xProducto['cant'] = intval($arrProSuc->cant) + (intval($productos[$i]->txtproductcant));
					$xProducto['cantvirtual'] = intval($arrProSuc->cantvirtual) + (intval($productos[$i]->txtproductcant));
								
					$this->db->where(['producto_id'=>$producto_id]);
					$this->db->update('rest.productos', $productCompra);

					$this->db->where(['producto_id'=>$producto_id,'sucursal_id'=>$sucuId]);
					$this->db->update('rest.x_productosucursal', $xProducto);
					if(!$this->db->affected_rows()){
						throw new Exception('No affected rows');
					}else{
						$xentradas = [
							'entrada_id'=>$entrada_id,
							'producto_id'=>$producto_id,
							'cant'=> intval($productos[$i]->txtproductcant),
							'punit'=>$productos[$i]->txtproductpcompra,
							'expire'=>$productos[$i]->txtproductvenc==""?null:$productos[$i]->txtproductvenc
						];
						$this->db->insert('rest.x_entradas', $xentradas);
					}
				}				
			}catch (PDOException $e){
				$this->db->rollback();
			}
		$this->db->trans_complete();
		if($this->db->trans_status()===FALSE){
			return array('status'=>false);
		}else{
			return array('status'=>true,'ids'=>$entrada_id);
		}
	}
	public function arixkernel_guargar_sequencial_batch($data,$manyDatas, $tables){
		
		$this->db->trans_start();
		try{
			$this->db->insert($tables[0], $data);
			$entrada_id = $this->db->insert_id();
			for ($i=0; $i < count($manyDatas); $i++) {
				$manyDatas[$i][$this->arixkernel_table_to_id($tables[0]).'_id'] = $entrada_id;
			}
			$this->db->insert_batch($tables[1], $manyDatas);			
		}catch (PDOException $e){
			$this->db->rollback();
		}
		$this->db->trans_complete();
		if($this->db->trans_status()===FALSE){
			return array('status'=>false);
		}else{
			return array('status'=>true);
		}	
	}
	public function arixkernel_guargar_arbol_batch($datas,$manyDatas,$tables){
		//$insert = array();
		$this->db->trans_start();
			try{
				$this->db->insert($tables[0], $datas[0]);
				$ids[0] = $this->db->insert_id();
				//array_push($insert,$ids);

				for ($i=0; $i < count($manyDatas); $i++) {
					$manyDatas[$i][$this->arixkernel_table_to_id($tables[0]).'_id'] = $ids[0];
				}
				$this->db->insert_batch($tables[3], $manyDatas);

				$this->db->insert($tables[1], $datas[1]);
				$ids[1] = $this->db->insert_id();
				//array_push($insert,$ids);

				$datas[2][$this->arixkernel_table_to_id($tables[0]).'_id'] = $ids[0];
				$datas[2][$this->arixkernel_table_to_id($tables[1]).'_id'] = $ids[1];
				$this->db->insert($tables[2], $datas[2]);
			}catch (PDOException $e){
				$this->db->rollback();
			}
		$this->db->trans_complete();
		if($this->db->trans_status()===FALSE){
			return array('status'=>false);
		}else{
			return array('status'=>true, 'ids'=>$ids);
		}
	}
	
}