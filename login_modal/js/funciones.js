
 var GLOBAL_EMAIL;
 var GLOBAL_NAME;
 
	function recuperarDatos_Nombre() { 
		var parametros = {
					"txtEmail": GLOBAL_EMAIL,
				};
				$.ajax({
					data: parametros,
					url: './login_modal/php/recu.php',
					type: 'post',
					beforeSend: function () {
					},
					success: function (response) {						
						GLOBAL_NAME = response;
						// response = eliminarEspacion(response);
					}
				});
	}
	
	function actualizarTema() {
		fechaActual = new Date();
		if ( fechaActual.getDate() == '6' ) {
			horaCtual = fechaActual.getHours();
			
		}		
	}
	
	function enviarPregunta(valorPregunta, valorExpositor) {

		if (valorPregunta == '') {
			$("#resultado-preguntas").css("color", "red");
			$("#resultado-preguntas").html("Es necesario ingresar la pregunta.");
		}
		else {
			var parametros = {
				"txtEmail": GLOBAL_EMAIL,
				"txtPregunta": valorPregunta,
				"txtUsuario": GLOBAL_NAME,
				"txtExpositor": valorExpositor
			};
			$.ajax({
				data: parametros,
				url: './login_modal/php/enviar_pregunta.php',
				type: 'post',
				beforeSend: function () {
					$("#resultado-preguntas").css("text-align", "center");
					$("#resultado-preguntas").html("<img src='http://rotacode.com/files/web/images/portada/loading.gif' width='20' height='20'/>");
				},
				success: function (response) {	
					
					response = eliminarEspacion(response);
										
					if (response == "1") {
						$("#resultado-preguntas").css("color", "#888");
						$("#resultado-preguntas").html("Pregunta enviada.");
					}
					else if (response == "0"){
						$("#resultado-preguntas").css("color", "red");
						$("#resultado-preguntas").html("La pregunta no fue enviada.");
					}
				}
			});
		}
	}
	
	function realizaProcesoLogeado(valorCaja1, valorCaja2) {
			if (valorCaja1 == '' && valorCaja2 == '') {
				$("#resultado-login").css("color", "red");
				$("#resultado-login").html("Es necesario ingresar email y clave.");
			} else if (valorCaja1 == '') {
				$("#resultado-login").css("color", "red");
				$("#resultado-login").html("Es necesario ingresar email.");
			} else if (valorCaja2 == '') {
				$("#resultado-login").css("color", "red");
				$("#resultado-login").html("Es necesario ingresar la contrase&#241;a.");
			}else if(!validateEmail(valorCaja1)) {
				$("#resultado-login").css("color", "red");
				$("#resultado-login").html(" Ingrese una direcci&oacute;n de email v&aacute;lida. ");
			}
			else {
				var parametros = {
					"txtEmail": valorCaja1,
					"txtClave": valorCaja2
				};
				$.ajax({
					data: parametros,
					url: './login_modal/php/login-form.php',
					type: 'post',
					beforeSend: function () {
						$("#resultado-login").css("text-align", "center");
						$("#resultado-login").html("<img src='http://rotacode.com/files/web/images/portada/loading.gif' width='20' height='20'/>");
					},
					success: function (response) {						
						response = eliminarEspacion(response);
											
						if (response == "1") {
							$("#table").css("display","block");
							$("#resultado-login").css("color", "#888");
							$("#resultado-login").html("Acceso a la transmisi&oacute;n concedido.");							
							 setTimeout(function () {
                            $('#resultado-login').slideUp('slow');
								$('.overlay-container').fadeOut().end().find('.window-container').removeClass('window-container-visible');
							}, 2000);
							
							GLOBAL_EMAIL = valorCaja1;
							recuperarDatos_Nombre();
						}
						else if (response == "2"){
							$("#resultado-login").css("color", "red");
							$("#resultado-login").html("El usuario ingresado no se encuentra registrado.");
						}
						else if (response == "0"){
							$("#resultado-login").css("color", "red");
							$("#resultado-login").html("Error en la contrase&#241;a, vuelva a ingresarla.");
						}
					}
				});
			}
		}

     function realizaCambio(valorCaja1, valorCaja2) {
		limpiaForm(valorCaja1);
		limpiaForm(valorCaja2);
        $(valorCaja1).css("visibility", "hidden");
        $(valorCaja1).css("position", "absolute");
		$(valorCaja1).css("width", "0");
		$(valorCaja1).css("height", "0");
        $(valorCaja2).css("visibility", "visible");
        $(valorCaja2).css("position", "relative");
		$(valorCaja2).css("width", "440");
		$(valorCaja2).css("height", "auto");
    }
	

    function realizaProcesoRemember(valorCaja1) {
        if (valorCaja1 == '') {
            $("#resultado-remember").css("color", "red");
            $("#resultado-remember").html("Es necesario ingresar el email con el que se registr&oacute;.");
        } else if(!validateEmail(valorCaja1)) {
				$("#resultado-remember").css("color", "red");
				$("#resultado-remember").html(" Ingrese una direcci&oacute;n de email v&aacute;lida. ");
		}
        else {
            var parametros = {
                "txtEmail": valorCaja1,
                "txtClave": ''
            };
            $.ajax({
                data: parametros,
                url: './login_modal/php/login-form.php',
                type: 'post',
                beforeSend: function () {
                    $("#resultado-remember").css("text-align", "center");
                    $("#resultado-remember").html("<img src='http://rotacode.com/files/web/images/portada/loading.gif' width='20' height='20'/>");
                },
                success: function (response) {
					response = eliminarEspacion(response);
                    if (response == "1") {
                        $("#resultado-remember").css("color", "blue");
                        $("#resultado-remember").html(" Se envi&oacute; la contrase&#241;a a su correo. <br \>Revise la carpeta de SPAM o correos no deseados.");
                        setTimeout(function () {
                            $('#resultado-remember').slideUp('slow');
                            realizaCambio('#remember', '#login');
                        }, 5000);
						
                    }
                    else {
                        $("#resultado-remember").css("color", "red");
                        $("#resultado-remember").html("El email ingresado no se encuentra registrado.");
                    }
                }
            });
            
        }
    }

    function realizaProcesoRegistration(valorName, valorApellido,valorEmail1, valorEmail2,valorClave1,valorClave2, valorPais, valorJerarquia) {		
        if (valorName == '' || valorApellido == '' || valorEmail1 == '' || valorEmail2 == '' || valorPais == '' || valorJerarquia == ''  || valorClave1 =='' || valorClave2 == '') {
            $("#resultado-registration").css("color", "red");
            $("#resultado-registration").html(" No deje ning&uacute;n campo requerido en vacio. ");			
        }  else if(!validateEmail(valorEmail1)) {
			$("#resultado-registration").css("color", "red");
            $("#resultado-registration").html(" Ingrese una direcci&oacute;n de email v&aacute;lida. ");
		}  else if (valorEmail1 != valorEmail2) {
            $("#resultado-registration").css("color", "red");
            $("#resultado-registration").html(" Los emails ingresados no coinciden ");
        }  else if (!validatePassword(valorClave1)) {
		    $("#resultado-registration").css("color", "red");
            $("#resultado-registration").html(" La contrase&#241;a deben de ser de un tama&#241;o entre 8 - 20 caracteres. ");
		}  else if (!isAlphaNumeric(valorClave1)) {
		    $("#resultado-registration").css("color", "red");
            $("#resultado-registration").html(" La contrase&#241;a deben de ser alfanum&eacute;rica (solo letras y n&uacute;meros). ");
		} else if (valorClave1 != valorClave2) {
            $("#resultado-registration").css("color", "red");
            $("#resultado-registration").html(" Las contrase&#241;as no coinciden ");
        }   
        else {
            var parametros = {
                "txtName": valorName, 
                "txtLastName":valorApellido,
                "txtEmail1": valorEmail1, 
                "txtPais": valorPais, 
                "txtJerarquia":valorJerarquia,
                "txtClave" : valorClave1
            };
            console.log(parametros)
            $.ajax({
                data: parametros,
                url: '../php/register.php',
                type: 'post',
                beforeSend: function () {
                    $("#resultado-registration").css("text-align", "center");
                    $("#resultado-registration").html("<img src='http://rotacode.com/files/web/images/portada/loading.gif' width='20' height='20'/>");
                },
                success: function (response) {     
					//response = eliminarEspacion(response);
					console.log(response)		
                    /*if (response == "1") {
                        $("#resultado-registration").css("color", "#888");
                        $("#resultado-registration").html("Se envi&oacute; los datos de acceso a su correo");
						 setTimeout(function () {
                            $('#resultado-login').slideUp('slow');
							
							}, 3000);
							window.location = "http://www.suruna.com/suruna_rep/suruna/Front-End/congresoregulacionperu2013/";						
						$('#preguntas-email').html(valorCaja1);
							GLOBAL_EMAIL = valorEmail1;
							recuperarDatos_Nombre();
                    }
                    else if (response == "2") {
                        $("#resultado-registration").css("color", "red");
                        $("#resultado-registration").html(" El email ingresado ya est&aacute; registrado. ");
                    } else if (response == "0") {
                        $("#resultado-registration").css("color", "red");
                        $("#resultado-registration").html(" No se pudo registrar los datos, actualize(F5) la p&aacute;gina. ");
                    } */
                }
            });
        }
    }
	
	
	function validateEmail(email) {
		//var emailReg = /^([\w]+@([\w-]+\.)+[\w-]{2,4})?$/;
		//if( !emailReg.test( email ) ) {
			//return false;
	//	} else {
			return true;
//		}
	}
	
	function validatePassword(password) {
		if (password.length > 20 || password.length < 8) {
			return false;
		} else {
			return true;
		}
	}
	
	function eliminarEspacion(respuesta) {
		for (var i = 0; i< respuesta.length; i++) {
			var caracter = respuesta.charAt(i);
			if (caracter == "2" || caracter == "1" || caracter == "0"){
				return caracter;
			}
		}
	}
	
	function isAlphaNumeric(val)
	{
		if (val.match(/^[a-zA-Z0-9]+$/))
		{
			return true;
		}
		else
		{
			return false;
		} 
	}
	
	function limpiaForm(miForm) {
		$(':input', miForm).each(function() {
			var type = this.type;
			var tag = this.tagName.toLowerCase();
			if (type == 'text' || type == 'password' || type == 'email')
			this.value = "";
		});
		$('#resultado-login').html("");
		$('#resultado-registration').html("");
		$('#resultado-remember').html("");
	}
	
	
	function limpiar() {
		$("#resultado-preguntas").html("");
		$("#textPregunta").value('');
	}