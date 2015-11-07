<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Belcorp TV</title>
    <link href="http://www.suruna.com/Views/StylesWebsite/css/font_awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="css/site.css" rel="stylesheet" type="text/css" />
    <link href="css/footer.css" rel="stylesheet" type="text/css" />
    <link href="css/login.css" rel="stylesheet" type="text/css" />
    <link rel="shortcut icon" href="">
  </head>

  <body>
    <div class="div-login-body">

      <!-- Estructura del formulario de acceso. -->
      <div class="div-login-form">
        <form class="login-form" action="./login-form.php" method="post">
          <!-- Imagen del logotipo -->
          <div class="logo">
            <img alt="SURUNA" src="images/login.jpg" />
          </div>
          <!-- Campos del formulario -->
          <div style="margin-top: 20px;">
            <!-- Nombre de usuario -->
            <p class="field">
                <input type="text" name="txtEmail" id="txtEmail" placeholder="Usuario" required="required" autofocus="autofocus" />
              <i class="icon-user icon-large"></i>
            </p>
            <!-- Password -->
            <p class="field">
              <input type="password" name="txtClave" id="txtClave" required="required" placeholder="Contraseña" />
              <i class="icon-lock icon-large"></i>
            </p>          
            <!-- Boton de envio -->
            <p class="submit">
              <button type="submit" name="submit">
                <i class="icon-arrow-right icon-large"></i>
              </button>
            </p>
          </div>
          <a class="registrate" href="login_modal/php/index.html" target="_self">Regístrate</a>
        </form>

      </div>

      <!-- Diseño del pie de pagina  -->
      <div class="div-page-footer">
        <footer class="page-footer">
          <p class="copyright">
            
          </p>
        </footer>
      </div>
    </div>
  </body>
</html>