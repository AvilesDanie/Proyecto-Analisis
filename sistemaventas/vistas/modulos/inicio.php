<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Bienvenido
    
    </h1>


  </section>

  <section class="content">

    <div class="row">
      
    <?php

    if($_SESSION["perfil"] =="Administrador"){

      include "inicio/cajas-superiores.php";
    }

    ?>

    </div> 

     <div class="row">
       
        <div class="col-lg-12">

          <?php

          if($_SESSION["perfil"] =="Administrador"){
          
          }

          ?>

        </div>

        <div class="col-lg-6">

          <?php

          if($_SESSION["perfil"] =="Administrador"){
          

         }

          ?>

        </div>

         <div class="col-lg-6">

          <?php

          if($_SESSION["perfil"] =="Administrador"){
          

         }

          ?>

        </div>

         <div class="col-lg-12">
           
          <?php

          if($_SESSION["perfil"] =="Especial" || $_SESSION["perfil"] =="Vendedor"){

             echo '<div class="box box-success">

             <div class="box-header">

             <h1>Bienvenid@ ' .$_SESSION["nombre"].'</h1>

             </div>

             </div>';

          }

          ?>

         </div>

     </div>

  </section>
 
</div>
