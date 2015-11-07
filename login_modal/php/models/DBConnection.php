<?php
// Descripcion: Clase BD y QUERY

class bd {

	var $usuari = "alter_uloginform"; 
	var $clau = "C~2MRE_?";
	var $servidor = "192.254.142.42";
	var $nomBD = "altertv_loginform";
	var $conn;
	var $debug;
	
	function bd($debug=0){
		//para que en php 4 haya un destructor como en php 4
		register_shutdown_function(array(&$this, '__destruct'));		
		$this->debug = $debug;
		$this->conn = @mysql_connect($this->servidor, $this->usuari, $this->clau) or $this->error_mysql(mysql_error());
		mysql_select_db($this->nomBD) or $this->error_mysql(mysql_error());
		
	}

	function x(){
	//para cerrar la conexion mysql
	//debes utlizarla SIEMPRE al final de tu documento
		if(isset($this->conn))@mysql_close($this->conn);
	}
	
	function error_mysql($msg,$query=''){
	//muestra el error
		if($this->debug==1 && !empty($query)) $msg .= '<br><b />QUERY:</b><br />'.$query;
		$this->enmarcar($msg);
		$this->x();
		die();
	}

	function enmarcar($str){
	//para mostrar los errores dentro de un rectangulo
		echo '<span style="display:block;border:1px red solid;padding:5px;">',$str,'</span>';
	}

	function f( $valor ){
		
       	if(get_magic_quotes_gpc())
	      	$valor = stripslashes($valor);
		if( function_exists('mysql_real_escape_string') )
			return mysql_real_escape_string( $valor );
		else //per PHP inferior a 4.3.0
			return addslashes( $valor );
	}

	function __destruct(){
	//el destructor se ejecuta antes de cerrar la ejecucion y con esto cerramos la conexion a la base de datos
		$this->x();
	}

}

class query extends bd{
	var $bd;//conexion mysql, requerido para llamar funciones de la classe bd
	var $q; //query introducida
	var $n;//numero de resultados
	var $v;//los resultados en una tabla de objetos
	var $a;//numero de filas afectadas por la query
	var $i;//Ultimo registro Adicionado 

	public function query($query){
		//constructor
		//$argcv = func_get_args();
		//call_user_func_array(array(&$this, '__construct'), $argcv);
		$this->q = $query;
		$this->bd();
		$mysql_result = @mysql_query($query) or $this->error_mysql(mysql_error(),$query);
		$this->n = @mysql_num_rows($mysql_result);
		$this->a = @mysql_affected_rows();
		$this->i = @mysql_insert_id($this->conn);
		if($this->n)
			for($i=0;$i<$this->n;$i++) $taula[$i] = @mysql_fetch_object($mysql_result);
		else $taula = null;
		$this->v = $taula;
		if(  $this->n > 0  ) mysql_free_result($mysql_result);		
		$this->x();
		
		return true;
	}
}

?>

// <?php
	// $dbuser="alter_uloginform";
	// $dbpass="C~2MRE_?";
	// $dbname="altertv_loginform";
	// $chandle = mysql_connect("192.254.142.42", $dbuser, $dbpass) or die("error conectando a la bbdd");
	// echo "conectado correctamente";
	// mysql_select_db($dbname, $chandle) or die ($dbname . " base de datos no encontrada." . $dbuser);
	// echo "base de datos " . $database . " seleccionada";
	// mysql_close($chandle);	
// ?>

// <?php
	// $rs = new query("SELECT * FROM osinergmin_usuarios WHERE email = 'asd@asd.com'");
	// echo $rs->n;
// ?>
