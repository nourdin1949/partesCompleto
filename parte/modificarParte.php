

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>Modificar parte</title>
   <!-- Compiled and minified CSS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   <!-- Compiled and minified JavaScript -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
   <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>          
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/estilo.css">
</head>
<?php
  


?>
   <body>
    <div class="container">
    <table class="cabecera-table">
                <tr>
                    <td><img src="imagenes/logo_JE.jpg" class="logoJE" id="logoJE" style="height: 100px; width: 250px;">
                        <img src="imagenes/logoIESA.JPG" class="logoIESA" id="logoIESA" style="height: 100px; width: 300px;">
                    </td>
                    <td style="width:350px">
                        <ul>
                            <li><i class="material-icons">&#xe0e1;</i> C/Antonio Concha, 71</li>
                        </ul>
                        <ul>
                            <li>10300 Navalmoral de la Mata (Cáceres)</li>
                        </ul>
                        <ul>
                            <li><i class="material-icons">&#xe61d;</i> 927 01 68 90 FAX 927 01 68 90</li>
                        </ul>
                        <ul>
                            <li><a href="https://iesaugustobriga.educarex.es/">https://iesaugustobriga.educarex.es/</a></li>
                        </ul>
                    </td>
                    <td><img src="imagenes/logo_UE.jpg" class="logoUE" id="logoUE"></td>
                </tr>
            </table>
      <!-- TÍTULOS -->
      <div class="row">
      <h3 class="header left teal-text">PARTE DE MALA CONDUCTA</h3>
    </div>
    <form class="col s12" action="insertarDatos.php" method="POST">
      <!-- Información acerca de a quién se le envía el parte -->
      <div class="row">
        <div class="input-field col s9">
          <input id="nombre" name="nombre" type="text" class="validate">
          <label for="nombre">Sr.De/Sra.De</label>
        </div>
        <div class="input-field col s3">
          <input id="cp" name="cp" type="text" class="validate">
          <label for="cp">CP</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <textarea id="direccion" name="direccion"class="materialize-textarea"></textarea>
          <label for="direccion">C/Pl/Avda</label>
        </div>
        <div class="input-field col s6">
          <textarea id="ciudad" name="ciudad" class="materialize-textarea"></textarea>
          <label for="ciudad">Ciudad</label>
        </div>
      </div>
      <div class="row">
      </div>
      <!-- Asunto del parte -->
      <div class="row">
        <h5 class="header left teal-text">ASUNTO: Amonestación por conducta contraria a las normas de convivencia</h5>
        <br><br>
        <p>
          Muy señores nuestros:
          En consonancia con alumno/a, podrá anular dicha amonestación, quedando ésta
          invalidada a todos los efectos. <br>
          Por lo tanto, nos ponemos en contacto con ustedes para informarles de los motivos que han
          llevado a tramitar dicho "Parte de mala conducta" a su hijo/a:
          <textarea name="hijo" id="hijo" class="materialize-textarea" placeholder="Nombre hijo/a"></textarea>
          del curso<textarea name="curso" id="curso" class="materialize-textarea" placeholder="Curso"></textarea>
          <br>
          <!-- Motivos por los que se pone el parte tipo checkbox-->
        <p id="mot">Motivos:</p>
        <div class="row">
          <p>
            <label>
              <input type="checkbox" name="motivos" id="1" />
              <span>El alumno ha agredido fisica y/o verbalmente a un compañero</span>
            </label>
            <br>
            <label>
              <input type="checkbox" name="motivos" id="2" />
              <span>El alumno ha sido visualizado por las camaras o por los docentes saliendo del centro sin permiso en medio de las clases</span>
            </label>
            <br>
            <label>
              <input type="checkbox" name="motivos" id="3" />
              <span>El alumno se ha negado a seguir instrucciones de un docente, llegando a levantar la voz hacia el mismo</span>
            </label>
            <br>
          </p>
        </div>
        Otros<textarea name="motivos" id="5" class="materialize-textarea" placeholder="Otros motivos"></textarea>
        </p>
        <!-- Fecha del día que se llama al padre/madre/tutor legal -->
        Se llama a la familia el día <br>
        <div class="input-field col s6">
          <input type="text" class="datepicker" id="fecha_llamada" name="fecha_llamada" />
        </div>
        <div class="input-field col s6">
          <input type="text" class="datepicker" name="horaCita" id="horaCita" placeholder="Hora" />
        </div>
        <br><br><br><br>
        <!-- Persona que coge el teléfono y atiende la llamada -->
        Persona con la que se contacta
        <br>
        <textarea name="personaCitada" id="personaCitada" class="materialize-textarea" placeholder="Contacto"></textarea><br><br>
        Para cualquier aclaración, póngase en contacto con el Centro.
        <br>
        Navalmoral de la Mata, a <input type="text" class="datepicker" name="fecha_rellenar" id="fecha_rellenar" />
        <br><br><br><br>
        Fdo. Raúl Garrido Jiménez <br>
        Jefe de Estudios
        <br><br>
        <!-- Firma del profesor que pone el parte y la asignatura o el modulo que imparte -->
        Fdo.<textarea name="profesor" id="profesor" class="materialize-textarea" placeholder="Firma"></textarea><br>
        Profesor de <textarea name="asignatura" id="asignatura" class="materialize-textarea"
          placeholder="Asignatura"></textarea><br><br>
        <input type="submit" value="Guardar" id="btn1" name="botonGuardar" class="waves-effect waves-light btn">
        <input type="reset" value="Limpiar" id="btn2" name="btn2" class="waves-effect waves-light btn red lighten-2">
        <a href="listarDatos.php" class="waves-effect waves-light btn green lighten-2" id="btn3" name="btn3" role="button">+Info</a>
      </div>
<!-- PIE DE PÁGINA -->
<footer class="page-footer teal lighten-2">
              <div class="row">
                 <div class="col s12 m6 l6">
                    <h5 class="white-text">Aplicación</h5>
                 </div>
                 
              </div>
              
           </footer>
  </div>
  </form>
</body>
<script>
  


  //Evento para el select
  document.addEventListener('DOMContentLoaded', function () {
    var elems = document.querySelectorAll('select');
    var options = document.querySelectorAll('option');
    var instances = M.FormSelect.init(elems, options);
  })
  //Evento para los campos fecha
  document.addEventListener('DOMContentLoaded', function () {
    var elems = document.querySelectorAll('.datepicker');
  });
</script>
</html>