<?php
$id = '';

if(isset($_GET['id'])){
  $id = $_GET['id'];
}

$html = '<!DOCTYPE html>
<head>
<meta charset="utf-8">
 <!-- Compiled and minified CSS -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

 <!-- Compiled and minified JavaScript -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
 <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>          
</head>
 <body>
  <div class="container">

    <!-- TÍTULOS -->
    <div class="row">
      <h3 class="header left teal-text">Editar Justificación</h3>
    </div>
    <form action="editar.php?id='.$id.'" method="POST">
<!-- CAMPOS INPUT TEXT -->
         
          <!-- CAMPOS FECHA -->
          <!--Tabla Justificación-->
          <div class="row">
            <p>Faltó a clase en la/s fecha/s:</p>
            <div class="input-field col s6">
                 
            <input type = "date" id="fecha_inicio" name="fecha_inicio" class = "datepicker" required/>
            <!-- <label>Fecha Inicio</label>-->
          </div>  
          <div class="input-field col s6">
                        
            <input type = "date" id="fecha_fin" name="fecha_fin" class = "datepicker" required/>
            <!-- <label>Fecha Fin</label>  -->
          </div>  <p>Número de horas:</p>
          <div class="input-field col s6">
            <input id="horas_lectivas" type="text" name="horas_lectivas" class="validate" required>
            <label for="horas_lectivas">Horas lectivas</label>
          </div>
          <div class="input-field col s6">
            <input id="horas_colectivas" type="text" name="horas_colectivas" class="validate" required>
            <label for="horas_colectivas">Horas complementarias</label>
          </div>
          
          </div>
          <!-- CAMPOS CHECKBOX -->
          <!--Tabla Motivos (Dentro del checkbox)--> <!--Tabla Otros(Dentro del textarea)-->
          <div class="row">
          <p>Faltó a clase por los siguientes motivos:</p>
            <label>
              <input type="checkbox" id="motivos" name="motivos" />
              <span>Visita al médico</span>
            </label>
            <label>
              <input type="checkbox" id="motivos" name="motivos"/>
              <span>Cuidado de hijo</span>
            </label>
            <label>
              <input type="checkbox" id="motivos" name="motivos"/>
              <span>Emergencia familiar</span>
            </label>
            <label>
              <input type="text" id="otros_motivos" name="otros_motivos" />
              <label for="otros_motivos">Otros</label>
            </label>
          </p>
            </div>
        
         
      <button class="waves-effect waves-light btn" value="Enviar">Enviar</button>
    </form>
          
  </div>     


</body>

<script>

 //Evento para los campos fecha
 document.addEventListener("DOMContentLoaded", function() {
  var elems = document.querySelectorAll(".datepicker");
  
});
</script>

</html>';

echo $html;
?>

   
