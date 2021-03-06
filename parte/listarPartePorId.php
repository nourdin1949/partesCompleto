<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<title>Listar Parte Por iD</title>
		<!-- Compiled and minified CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
		<!-- Compiled and minified JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="css/estilo.css">
	</head>

	<body>
		<?php
 require_once '../configuracion/llamadaArchivos.php';
    $id="";
    $nombre="";
    $curso="";
	session_start();
	
    if(isset($_REQUEST["id"])){
        $id=$_REQUEST["id"];
    }
    $alumnoDao = new AlumnoDao();
  $tutorDao = new TutorDao();
  $parteDao = new ParteDao();
  $arrayAlumno =$alumnoDao->listarAlumnoPorID($id);
  $arrayTutor =$tutorDao->listarTutorPorID($id);
  $arrayParte =$parteDao->listarPartePorID($id);
  $_SESSION['alumno']=$arrayAlumno[0]['nombre'];
  $_SESSION['curso']=$arrayAlumno[0]['curso'];
  $arrayMotivos= explode("#",$arrayParte[0]['comentario']);
  $arrayMotivos[]="";
  $arrayMotivos[]="";
 
if($arrayMotivos[0]==1){
  
  $motivo="checked";
}else{
  $motivo="";
  
}
if( $arrayMotivos[1]==2 || $arrayMotivos[0]==2){
  $motivo2="checked";
}else{
  $motivo2="";
 
}
if($arrayMotivos[2]==3 ||$arrayMotivos[1]==3 || $arrayMotivos[0]==3){
  $motivo3="checked";
}else{
  $motivo3="";
 
}

$otros="";
  foreach($arrayMotivos as $ar){
$otros.= $ar;
  }

   ?>
			<div class="container">
				<table class="cabecera-table">
					<tr>
						<td><img src="../imagenes/logo_JE .jpg" class="logoJE" id="logoJE" style="height: 100px; width: 250px;">
							<img src="../imagenes/logoIESA.JPG" class="logoIESA" id="logoIESA" style="height: 100px; width: 300px;">
						</td>
						<td style="width:350px">
							<ul>
								<li><i class="material-icons">&#xe0e1;</i> C/Antonio Concha, 71</li>
							</ul>
							<ul>
								<li>10300 Navalmoral de la Mata (C??ceres)</li>
							</ul>
							<ul>
								<li><i class="material-icons">&#xe61d;</i> 927 01 68 90 FAX 927 01 68 90</li>
							</ul>
							<ul>
								<li><a href="https://iesaugustobriga.educarex.es/">https://iesaugustobriga.educarex.es/</a></li>
							</ul>
						</td>
						<td><img src="../imagenes/logo_UE.jpg" class="logoUE" id="logoUE"></td>
					</tr>
				</table>
				<!-- T??TULOS -->
				<div class="row">
					<h3 class="header left teal-text">PARTE DE MALA CONDUCTA</h3>
				</div>
				<form class="col s12" action="" method="POST">
					<!-- Informaci??n acerca de a qui??n se le env??a el parte -->
					<div class="row">
						<div class="input-field col s9">
							<input id="id" name="id" type="hidden" value="<?php echo $id?>" class="validate">

						</div>
						<div class="input-field col s9">
							<input id="nombre" name="nombre" type="text" value="<?php echo $arrayTutor[0]['nombrePadre']; ?>" class="validate">
							<label for="nombre">Sr.De/Sra.De</label>
						</div>
						<div class="input-field col s3">
							<input id="cp" name="cp" type="text" value="<?php echo $arrayTutor[0]['codigo_postal'];?>" class="validate">
							<label for="cp">CP</label>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s6">
							<input id="direccion" type="text" name="direccion" value="<?php echo $arrayTutor[0]['direccion'];?>" class="validate">
							<label for="direccion">C/Pl/Avda</label>
						</div>
						<div class="input-field col s6">
							<input id="ciudad" name="ciudad" type="text" value="<?php echo $arrayTutor[0]['ciudad'];?>" class="validate">
							<label for="ciudad">Ciudad</label>
						</div>
					</div>
					
					<!-- Asunto del parte -->
					<div class="row">
						<h5 class="header left teal-text">ASUNTO: Amonestaci??n por conducta contraria a las normas de convivencia</h5>
						<br><br>
						
							Muy se??ores nuestros: En consonancia con alumno/a, podr?? anular dicha amonestaci??n, quedando ??sta invalidada a todos los efectos. <br> Por lo tanto, nos ponemos en contacto con ustedes para informarles de los motivos que han llevado a tramitar dicho "Parte de mala conducta" a su hijo/a:
							<input type="text" name="alumno" id="alumno" value="<?php echo $arrayAlumno[0]['nombre'];?>" class="materialize-textarea" placeholder="Nombre hijo/a"> del curso<input type="text" name="curso" id="curso" value="<?php echo $arrayAlumno[0]['curso'];?>" class="materialize-textarea" placeholder="Curso"> ha tenido lugar el dia<br> <input type="date" value="<?php echo $arrayParte[0]['fecha_suceso'];?>" class="datepicker" name="fecha_suceso" id="fecha_suceso" />
							<br>
							<!-- Motivos por los que se pone el parte tipo checkbox-->
							<p id="mot">Motivos:</p>
							<div class="row">
								<p>
									<label>
                    <input type="checkbox" <?php echo $motivo?> name="motivos[]" value="1"  id="1" />
                    <span>El alumno ha agredido fisica y/o verbalmente a un compa??ero</span>
                  </label>
									<br>
									<label>
                    <input type="checkbox"  <?php echo $motivo2?> name="motivos[]"value="2"  id="2" />
                    <span>El alumno ha sido visualizado por las camaras o por los docentes saliendo del centro sin permiso en medio de las clases</span>
                  </label>
									<br>
									<label>
                    <input type="checkbox" <?php echo $motivo3?> name="motivos[]" value="3" id="3" />
                    <span>El alumno se ha negado a seguir instrucciones de un docente, llegando a levantar la voz hacia el mismo</span>
                  </label>
									<br>
								</p>
							</div>
							Otros<input name="motivos[]" type="text" value=" <?php echo $otros?>" id="4" class="materialize-textarea" placeholder="Otros motivos"> Se llama a la familia el d??a<br>
							<div class="input-field col s6">
								<input type="date" class="datepicker" value="<?php echo $arrayParte[0]['fecha_llamada'];?>" id="fecha_llamada" name="fecha_llamada" />
							</div>
							<div class="input-field col s6">
								<input type="time" class="datepicker" value="<?php echo $arrayParte[0]['hora'];?>" name="horaCita" id="horaCita" placeholder="Hora" />
							</div>
							<br><br> Persona con la que se contacta
							<br>
							<input type="text" name="personaCitada" value="<?php echo $arrayParte[0]['personaCitada'];?>" id="personaCitada" class="materialize-textarea" placeholder="Contacto"><br><br> Para cualquier aclaraci??n, p??ngase en contacto con el Centro.
							<br> Navalmoral de la Mata, a <input type="date" value="<?php echo $arrayParte[0]['fecha_rellenar'];?>" class="datepicker" name="fecha_rellenar" id="fecha_rellenar" />
							<br><br><br><br> Fdo. Ra??l Garrido Jim??nez <br> Jefe de Estudios
							<br><br> Fdo. Profesor<input type="text" name="profesor" value="<?php echo $arrayParte[0]['profesor'];?>" id="profesor" class="materialize-textarea" placeholder="Firma"><br>
							<br>
							<a href="../enviarEmail.php" class="waves-effect waves-light btn" id="btn1" name="btn1" role="button"><i class='material-icons'>email</i></a>
							<a href="crearPDF.php" class="waves-effect waves-light btn" id="btn2" name="btn2" role="button"><i class='material-icons'>picture_as_pdf</i></a>
							<a href="listarDatos.php" class="waves-effect waves-light btn green lighten-2" id="btn3" name="btn3" role="button"><i class="material-icons">keyboard_return</i></a>
					</div>
					<!-- PIE DE P??GINA -->
					<footer class="page-footer teal lighten-2">
						<div class="row">
							<div class="col s12 m6 l6">
								<h5 class="white-text">Aplicaci??n</h5>
							</div>
						</div>
					</footer>
				</form>
			</div>

	</body>
	<script>
		var inputs =document.getElementsByTagName("input");
		
		  for(let i=0;i<inputs.length;i++){
		      inputs[i].disabled=true;
		  }
		
		
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
