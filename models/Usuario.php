<?php
class Usuario {

	var $email;
	var $password;		
	var $query;
	var $autenticado;
	public 		$mensaje;


	public function __construct($email, $password)
    {		
		$this->email = $email;
		$this->password = $password;	
    }
	
	public function insertALL() 
	{		
			
			$rs = new query("SELECT * FROM belcrop_usuarios WHERE email = '$this->email'");
			if ($rs->n > 0) {
				return 2;
			}
			else {
			
				$this->query = "INSERT INTO belcorp_usuarios (email, password)
									VALUES	('$this->email', '$this->password')";

				if(new query($this->query)) { 
					$this->mensaje = 'Se agrego al usuario correctamente...!'; 
					return 1;
				}
				else
				{ 
					$this->mensaje = 'No se ha agregado al Usuario'; 
					return 0;
				}		
			}				
	}

		
	function __destruct() {
		unset($this);
	}	
	
	
	

}
?>