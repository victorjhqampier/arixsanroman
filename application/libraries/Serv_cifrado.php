<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
    Servicio de cifrado
    1- cifrar_palabra()
    2- decifrar_palabra()
    3- cifrar_passwd()
    4- probar_passwd()
*/

define ('ARIX_METADATA', array(
    array('sal'=>'50A8E49532917', 'llave'=>'Ed775748977badf18555efceb113f0fo'),
    array('sal'=>'1662C0C584302', 'llave'=>'E35f6dd00a439092ab9c07ca0o'),
    array('sal'=>'54F747562B763', 'llave'=>'Ed776ee8972c4d9f980eba5c4bce4f6o'),
    array('sal'=>'6ACA79F493CEE', 'llave'=>'E9d7d778315080579654597f8b90ef532bo'),
    array('sal'=>'EED2ACD308FC7', 'llave'=>'E79b2b5a84bf80fc3b45d93f5o'),
    array('sal'=>'7F775B1A70BE2', 'llave'=>'E7794a46d0b899732768ba2ff07d6bo'),
    array('sal'=>'FC6771F96143C', 'llave'=>'Ed77961c349b1e6b364b701e28a0961o'),
    array('sal'=>'E2F9DEA02F443', 'llave'=>'E9da4ea6f9d736fc901faa3ba91fo'),
    array('sal'=>'05FB4F64E94E2', 'llave'=>'Ed77a65019f225bc3cdc3e6f86aa1a6o'),
    array('sal'=>'CBEFB076C9E7F', 'llave'=>'Ed77ad547af8c4eadc658678d80d3bdo'),
    array('sal'=>'39E9789889EED', 'llave'=>'Ed7d77b9c52ca57419d28344dbd676e80o'),
    array('sal'=>'CDC84DE2700EE', 'llave'=>'Ed7d77c18941c693dbc39ba7e50e5697co'),
    array('sal'=>'10EC7A2B9686E', 'llave'=>'Edbc91a48b9d8d6e358b40a8o'),
    array('sal'=>'FB4E5326EF8C0', 'llave'=>'Ed77d44dcc76a6119bbade2f4e7a878o'),
    array('sal'=>'F9B3B5F2A8B08', 'llave'=>'E7d77dfdb17e7804983f12fab67a4fedo'),
    array('sal'=>'F31E4F846C153', 'llave'=>'Ed77eb8a95e8c85ed69deeaac9572d6o'),
    array('sal'=>'42B1F54D1306D', 'llave'=>'Ef771aa67c8bab7ee7d7288a6867o'),
    array('sal'=>'78A8A91824B27', 'llave'=>'Ef2de987b2b0a6157f4afe155d3o'),
    array('sal'=>'99C45646CFAF3', 'llave'=>'E7d780b35e7b6117303fda4d6de54931o'),
    array('sal'=>'0A05F1B023C48', 'llave'=>'Eece1433769969e583c27bdfcbo')
));
class Serv_cifrado {
    protected $ci;
    function __construct(){
		$this->ci =& get_instance();
        $this->ci->load->model('arixkernel');
    }
    private function cod_database_key($input){//puede ser numero o id
        if(gettype($input)=='integer'){
            return ARIX_METADATA[$input];
        }else{
            $key = array_search($input, array_column(ARIX_METADATA, 'sal')); 
            return ARIX_METADATA[$key]['llave'];
        }
    }
    public function cod_object_to_array($d) {//de STDclass a arrayPHP
        if (is_object($d)) {
            $d = get_object_vars($d);
        }
        if (is_array($d)) {
            return array_map(array($this, 'cod_object_to_array'), $d);
        } else {
            return $d;
        }
    }
    private function cod_cifrar_cadena_llave($data = true, $llave=0, $indice = '03446434C89C4'){
        if (is_bool($data)) {
            $data = $this->ci->arixkernel->select_one_content('sal indice, llave','private.traductores',array('traductor_id' => rand (1, 997)));
            return $data;
        }else{
            $data = openssl_encrypt($data, "AES-256-CBC", $llave, 0, "0xE5e50a9b198741");
            return $indice.base64_encode($data);
        }
    }
    public function cod_cifrar_cadena($data){
        //$data = preg_replace('([^A-Za-z0-9])', '', $data);//borra caracteres raros (SOLO ALPHANUMERICOS)
        //$key = $this->ci->arixkernel->select_one_content('sal, llave','private.traductores',array('traductor_id' => rand (1, 997)));
        $key = $this->cod_database_key(rand (0, 19));
        $sal = $key['sal'];
        $key = openssl_encrypt($data, "AES-256-CBC", $key['llave'], 0, "0xE5e50a9b198741");
        return $sal.base64_encode($key);
    }
    public function cod_decifrar_cadena($data){
        //$key = $this->ci->arixkernel->select_one_content('llave','private.traductores',array('sal' => substr($data,0, 13)));
        $key = $this->cod_database_key(substr($data,0, 13));
        if (isset($key)){
            $key = openssl_decrypt(base64_decode(substr($data,13)), "AES-256-CBC", $key, 0, "0xE5e50a9b198741");
            return $key;
        }else{
            return false;
        }        
    }    
    public function cod_cifrar_ids_matrices($array){ //REHACER CON TABLAS HASH -> debe ser optimizado
        $array = $this->cod_object_to_array($array);        
        if (is_array(reset($array))) {
            $key = array_keys(reset($array)); //guarda las llaves del array
            $key = array_values(preg_grep('/(_id)/', $key));//busca el patron y formatela las llaves del array
            if (count($key) > 0) {
                $llaves = $this->cod_cifrar_cadena_llave();
                for ($i = 0; $i < count($array); $i++) { 
                    for ($j = 0; $j < count($key); $j++) {
                        $array[$i][$key[$j]] = $this->cod_cifrar_cadena_llave($array[$i][$key[$j]], $llaves->llave, $llaves->indice);
                    }
                }
                unset($key, $llaves);
                return $array;
            }else{
                return $array;
            }
        }else{
            $key = array_keys($array);
            $key = array_values(preg_grep('/(_id)/', $key));        
            if (count($key) > 0) { 
                $llaves = $this->cod_cifrar_cadena_llave();
                for ($j = 0; $j < count($key); $j++) {
                    $array[$key[$j]] = $this->cod_cifrar_cadena_llave($array[$key[$j]], $llaves->llave, $llaves->indice);
                } 
                unset($key, $llaves);
                return $array;
            }else{
                return $array;
            }
        }
    }
}