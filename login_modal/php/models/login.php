<?php
class login
{
	public 		$email;
	protected 	$password;
	public 		$autenticado;
	public 		$mensaje;
	public		$remember;
	
	

    public function __construct($mail, $clave)
    {
		$this->email = $mail;
		$this->password = $clave;
		$this->mensaje = 'Se contruyo el login.';
                $this->autenticado = 0;
		if ($clave == '') {
			$this->recuperarClave();
		}
		else {
			$this->autenticarUser();
                }
    }
	
	function validarEmail() 
	{
		$rs = new query("SELECT * FROM belcorp_usuarios WHERE email = '$this->email'");
		if ($rs->n > 0) {
			return true;
                }
		else { 
			return false;
                }
	}
	
	function autenticarUser()
	{	
		if( $this->validarEmail() == false ) {
			$this->mensaje		= 'Email invalido';
			$this->autenticado	= 2;
			return 2;
		} else {
	
			$rs = new query("SELECT * FROM belcorp_usuarios WHERE email = '$this->email' AND password = '$this->password'");

			if ($rs->n > 0)
			{
				$ingresos = new query("SELECT * FROM belcorp_usuarios WHERE email = '$this->email'");                                
                                foreach ($ingresos->v as $fila) {
                                    $n = $fila->ingresos;
                                    $n = $n+1;
                                    $ingresosI = new query("UPDATE belcorp_usuarios SET ingresos='$n' WHERE email='$this->email'");
                                  //  $ingresos1 = new query("INSERT INTO debug(linea) VALUES ('$n')");
                                }   
                                
				$this->autenticado	= 1;
				$this->mensaje		= 'Usuario Autenticado';
				return 1;
			}
			else {		
				$this->mensaje = 'Clave Invalidos';	
				$this->autenticado	= 0;			
				return 0;
			}
		}
	}
	
	function recuperarClave()
	{
		
		$rs = new query("SELECT * FROM belcorp_usuarios WHERE email = '$this->email'");
		if ($rs->n > 0)
		{
			foreach($rs->v as $filas);
			$this->password	= $filas->password;
			
			$this->remember	= 1;
			$this->mensaje		= $this->password;
			return true;
		}
		else {		
			$this->mensaje		= $this->password;	
			$this->remember	= 0;			
			return false;
		}
	}
	
	function __destruct() {
		unset($this);
	}		
}
?>