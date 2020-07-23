<?php 
include 'layout/layout.php';
include 'ayuda/utilidad.php';

session_start();
$_SESSION['estudiantes'] = isset($_SESSION['estudiantes'])? $_SESSION['estudiantes']: array();

$listadoEstudiantes = $_SESSION['estudiantes'];

if(!empty($listadoEstudiantes)){

if(isset($_GET['$CarreraId'])){


  $listadoEstudiantes = searchProperty ($listadoEstudiantes,'carrera',$_GET['CarreraId']);   

}
}

if(!empty($listadoEstudiantes)){

  if(isset($_GET['$EstatusId'])){
  
  
    $listadoEstudiantes = searchProperty ($listadoEstudiantes,'estatus',$_GET['EstatusId']);   
  
  }
  }


?>

<?php printHeader();?>

<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Fomulario  De Estudiante</font></font></h1>
      <p class="lead text-muted"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Crea tu formulario de  estudiante del itla.</font></font></p>
      <p>
        <a href="Estudiantes/add.php" class="btn btn-primary my-2"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Crear Nuevo Estudiante </font></font></a>
 
      </p>
    </div>
  </section>


  <div class="album py-5 bg-light">
    <div class="container">





    <div class="row">
      <div class = "col-md-3"></div>
    <div class = "col-md-3">

      <div class="btn-group">

          <a href="index.php" class="btn btn-dark text-light">Todos</a>
          <a href="index.php?EstatusId=1" class="btn btn-dark text-light">Activos</a>
          <a href="index.php?EstatusId=2" class="btn btn-dark text-light">Inactivos</a>
         
          
       </div>
    </div>
</div> 




    <div class="row">
      <div class = "col-md-3"></div>
    <div class = "col-md-3">

      <div class="btn-group">

          <a href="index.php" class="btn btn-dark text-light">Todas</a>
          <a href="index.php?CarreraId=1" class="btn btn-dark text-light">Redes</a>
          <a href="index.php?CarreraId=2" class="btn btn-dark text-light">Software</a>
          <a href="index.php?CarreraId=3" class="btn btn-dark text-light">Multimedia</a>
          <a href="index.php?CarreraId=4" class="btn btn-dark text-light">Mecatronica</a>
          <a href="index.php?CarreraId=5" class="btn btn-dark text-light">Seguridad informática</a>
          
       </div>
    </div>
</div> 


    



      <div class="row">

      <?php if(empty($listadoEstudiantes)): ?>


       <h2> No hay estudiantes registrados, registralo aqui: <a href="Estudiantes/add.php" class="btn btn-primary"> Nuevo Estudiante</a></h2>

      <?php  else:?>


     

      <?php   foreach($listadoEstudiantes as $estudiante):  ?>

        
        

        <div class="card" >
          <div class="card-body">
            <h5 class="card-title"><?php echo $estudiante['nombre'];?></h5>
            
            <p class="card-text"><?php echo $estudiante['apellido']; ?></p>
          
            <h6 class="card-subtitle mb-2 text-muted"><?php echo getEstatusName($estudiante['estatus']); ?></h6>
            
            <h6 class="card-subtitle mb-2 text-muted"><?php echo  getCarreraName($estudiante['carrera']); ?></h6>
           
            <a href="Estudiantes/edit.php?id=<?php echo $estudiante['id']; ?>" class="card-link">Editar</a>

            <a href="Estudiantes/borrar.php?id=<?php echo $estudiante['id']; ?>" class="card-link">Borrar</a>
         
          </div>
        </div>


      <?php endforeach; ?>
        
        

      <?php   endif;?>
 

        </div>
      </div>
    </div>
  </div>

</main>

<?php printFooter();?>