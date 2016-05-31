<?php

class AES {
    /*============MODOS DE OPERACION============*/
    /*Por defecto se usara el modo de operacion CBC*/
    const M_ECB = 'ecb';//bloques idénticos de mensaje sin cifrar, producirán idénticos textos. cifrados
    const M_CBC = 'cbc'; //a cada bloque de texto se le aplica una operación XOR con el previo bloque ya cifrado.
    const M_OFB = 'ofb';//emplea una clave para crear un bloque pseudoaleatorio que es operado a través de XOR con el texto plano para generar el texto cifrado. 

    /*VARIABLES*/
    protected $key;
    protected $cipher;
    protected $data;
    protected $mode;
    protected $IV;

    /*CONSTRUCTOR*/    
    function __construct($data, $key, $blockSize, $mode=null) {
        $this->setData($data);
        $this->setKey($key);
        $this->setBlockSize($blockSize);
        $this->setMode($mode);
		$this->setIV("");
    }


    public function setData($data) {
        $this->data = $data;
    }

 
    public function setKey($key) {
        $this->key = $key;
    }

  
    public function setBlockSize($blockSize) {
        switch ($blockSize) {
            //AES es tambien conocido como Rijndael (pronunciado "Rain Doll" en inglés)
            //aqui establecemos el tamaño de la clave y lo guardamos en cipher
            case 128:
                $this->cipher = MCRYPT_RIJNDAEL_128;
                break;

            case 192:
                $this->cipher = MCRYPT_RIJNDAEL_192;
                break;

            case 256:
                $this->cipher = MCRYPT_RIJNDAEL_256;
                break;
        }
    }

    public function setMode($mode) {
        //AES tiene varios modos de operacion para cifrar el texto por bloques,
        //aqui selecionamos uno; pero por defecto vamos a usar el modo MCRYPT_MODE_ECB
        switch ($mode) {
            case AES::M_CBC:
                $this->mode = MCRYPT_MODE_CBC;
                break;
            case AES::M_ECB:
                $this->mode = MCRYPT_MODE_ECB;
                break;
            case AES::M_OFB:
                $this->mode = MCRYPT_MODE_OFB;
                break;
            default:
                $this->mode = MCRYPT_MODE_ECB;
                break;
        }
    }
    
    //validamos que todos los parametros necesarios no esten vacios
    public function validateParams() {
        if ($this->data != null && $this->key != null && $this->cipher != null) {
            return true;
        } else {
            return FALSE;
        }
    }
	
    //establecemos el valor del vector de inicializacion(IV),por defecto va nulo, como se especifica en la linea 21
	 public function setIV($IV) {
		$this->IV = $IV;
	}
    
    //establecemos el vector de inicializacion(IV) SI se SELECCIONA el modo de operacion
    //MCRYPT_MODE_CBC o MCRYPT_MODE_OFB
     protected function getIV() {
        if ($this->IV == "") {
            //mcrypt_create_iv===>Crea un vector de inicialización (IV) desde una fuente aleatoria.
            //mcrypt_get_iv_size==>Toma el tamaño del IV perteneciente a una combinación específica de los parámetros cipher/mode.
            $this->IV = mcrypt_create_iv(mcrypt_get_iv_size($this->cipher, $this->mode), MCRYPT_RAND);
        }
            return $this->IV;
	}

    /*================FUNCION PARA ENCRIPTAR================*/
    public function encrypt() {
        if ($this->validateParams()) {//si la funcion nos da true
            return trim(base64_encode( //trim elimina espacios en blanco y base64 convierte de bytes a caracteres
                mcrypt_encrypt($this->cipher, $this->key, $this->data, $this->mode, $this->getIV())));
        } else {
            throw new Exception('Invlid params!');
        }
    }

    /*================FUNCION PARA DESENCRIPTAR================*/
    public function decrypt() {
        if ($this->validateParams()) {
            return trim(mcrypt_decrypt($this->cipher, $this->key, base64_decode($this->data), $this->mode, $this->getIV()));
        } else {
            throw new Exception('Invlid params!');
        }
    }

}
