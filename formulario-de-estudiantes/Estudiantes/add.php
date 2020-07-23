<?php 
include '../layout/layout.php';
include '../ayuda/utilidad.php';

session_start();

if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['estatus']) && isset($_POST['carrera'])){


    $_SESSION['estudiantes'] = isset($_SESSION['estudiantes'])? $_SESSION['estudiantes']: array();

  $estudiantes =  $_SESSION['estudiantes'];

    $estudianteid= 1;

    if(!empty($estudiantes)){


        $lastElement = getLastElement($estudiantes);

        $estudianteid = $lastElement['id'] + 1 ;
    }




    array_push($estudiantes,[ 'id'=>$estudianteid , 'nombre'=> $_POST['nombre'],
    'apellido'=>$_POST['apellido'],'estatus'=>$_POST['estatus'], 'carrera'=>$_POST['carrera']]);


    $_SESSION['estudiantes']=$estudiantes; 

 header("Location:../index.php");
 exit();
}

?>

<?php printHeader(true);?>

<main role="main">
    <div style="margin-top: 2%;">

<div class="card">
  <div class="card-header bg-dark text-light" >
 <a href="../index.php" class="btn btn-warning"> Volver Atras</a> Crear Nuevo Estudiante
  </div> 
  <div class="card-body">

  <form action="add.php" method="POST">
  <div class="form-group">
    <label for="nombre">Nombre del estudiante:</label>
    <input type="text" class="form-control" id="nombre" name="nombre">
  </div>
  <div class="form-group">
    <label for="apellido">Apellido del estudiante:</label>
    <input type="text" class="form-control" id="apellido" name="apellido">
  </div>
  
  <div class="form-group">
    <label for="estatus">Estatus del estudiante:</label>
    <select class="form-control" id="estatus" name="estatus">

   <?php   foreach($estatus as $id => $text):?>

   <option value="<?php  echo $id; ?>">  <?php echo $text; ?></option>

    <?php endforeach;?>
    </select>
    </div>

  <div class="form-group">
    <label for="carrera">Carrera del estudiante:</label>
    <select class="form-control" id="carrera" name="carrera">

    <?php   foreach($carrera as $id => $text):?>

<option value="<?php  echo $id; ?>">  <?php echo $text; ?></option>

 <?php endforeach;?>
    
    </select>
    </div>

    <button type="submit" class=" btn btn-success">Guardar</button>

</form>
  </div>
</div>


  
</main>

<?php printFooter(true);?>