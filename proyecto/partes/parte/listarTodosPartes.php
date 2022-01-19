<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Datos</title>
    <title>Formulario Insertar Parte</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>          
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <div class="container">
    
    <div class = "row">
    <div class="row">
					<h3 class="header left teal-text">LISTA DE PARTES </h3>
				</div>
              <table>
                <thead>
                  <tr>
                      <th>id</th>
                      <th>Persona Citada</th>
                      <th>Profesor</th>
                      <th>Fecha suceso</th>
                  </tr>
                </thead>
        
                <tbody>
                  <?php
                  ini_set('display_errors', 1);

                  ini_set('display_startup_errors', 1);
                  
                  error_reporting(E_ALL);
                    include_once '../dao/ParteDao.php';
                    $parteDao = new ParteDao();
                    foreach($parteDao->listar() as $fila){
                        echo '  <tr>
                        <td>'.$fila['id'].'</td>
                        <td>'.$fila['personaCitada'].'</td>
                        <td>'.$fila['profesor'].'</td>
                        <td>'.$fila['fecha_suceso'].'</td>
                        <td>  <a href="../comprobarTipo.php?id='.$fila['id'].'&tipo='.$fila['tipo'].'" class="waves-effect waves-light btn  teal lighten-3"><i class="material-icons">remove_red_eye</i></a></td>
                        <td>  <a href="modificarFormularioParte.php?id='.$fila['id'].'" class="waves-effect waves-light btn"><i class="material-icons">edit</i></a></td>
                        <td>  <a href="eliminarParte.php?id='.$fila['id'].'" class="waves-effect waves-light btn red lighten-2"><i class="material-icons">delete</i></a></td>
                      </tr>';
                    }
                  ?>
                 
                </tbody>
              </table>
             <br>
             <a href="formulario.html" class="waves-effect waves-light  btn">INSERTAR PARTE MALA CONDUCTA <i class="material-icons">library_add</i></a>
             <a href="../buenaConducta/formularioBuenaConducta.html" class="waves-effect waves-light  btn">INSERTAR PARTE BUENA CONDUCTA <i class="material-icons">library_add</i></a>
      <a href="../../index.html" class="waves-effect waves-light  btn">HOME<i class="material-icons">home</i></a>
    </div>
</body>
</html>