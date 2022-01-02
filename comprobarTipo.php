<?php

if(isset($_REQUEST['tipo'])){
    $tipo=$_REQUEST['tipo'];
}
echo $tipo;
if($tipo=='malaConducta'){
    header('Location: ./parte/listarPartePorId.php?id='.$_REQUEST['id']);
}else if($tipo=='buenaConducta'){
    header('Location: ./buenaConducta/listarPartePorId.php?id='.$_REQUEST['id']);
}


?>