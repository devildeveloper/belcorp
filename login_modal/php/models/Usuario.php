<?php
class Usuario {

	var $email;
	var $password;		
	var $query;
	var $autenticado;
	public 		$mensaje;


	public function __construct($email,$password,$pais,$jerarquia,$lastName,$name)
    {		
		$this->name = $name;
		$this->lastName = $lastName;
		$this->pais = $pais;
		$this->jerarquia = $jerarquia;
		$this->email = $email;
		$this->password = $password;					
    }
	
	public function insertALL() 
	{		
			
			$rs = new query("SELECT * FROM belcorp_usuarios WHERE email = '$this->email'");
			if ($rs->n > 0) {
				return 2;
			}
			else {
			
				$this->query = "INSERT INTO belcorp_usuarios (name,lastName,email,pais,jerarquia,password)
									VALUES	('$this->name','$this->lastName','$this->email','$this->pais','$this->jerarquia','$this->password' )";

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