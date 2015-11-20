   <?php 
   ob_start();
   session_start();
   $error = ob_get_clean();

   if(!empty($error)){

   }else{

   }

   ob_start();
   session_start();
   $error = ob_get_clean();

   if(!empty($error)){

   }else{

   }

   include "plantillas/plantilla/php/conexion.php";
   conectar();


   $nn=$_SESSION["name"];
   $ii=$_SESSION["id"];
   $uu=$_SESSION["user"];
   $ee= $_SESSION["email"];
   $rol=$_SESSION["rol"];


   if ($rol=="1") {

     ?>

     <nav>
      <section id='cssmenu' class="contenedor">

        <ul>
          <li class='active '><a href='inicio.php'><span>Inicio</span></a></li>
          <li class='has-sub '><a href='#'><span>Ingresar</span></a>
            <ul>
              <li class='has-sub '><a href='/code/plantillas/ingreso_reserva.php'><span>Reserva</span></a></li>
              <li class='has-sub '><a href='/code/plantillas/ingreso_pasajero.php'><span>Pasajero</span></a></li>
              <li class='has-sub '><a href='/code/plantillas/ingreso_aeropuertos.php'><span>Aeropuertos</span></a></li>                        
              <li class='has-sub '><a href='/code/plantillas/ingreso_ciudad.php'><span>Ciudad</span></a></li>
              <li class='has-sub '><a href='/code/plantillas/ingreso_departamento.php'><span>Departamento</span></a></li>

            </ul>
          </li>
          <li class='has-sub '><a href='#'><span>Ingreso Avion</span></a>
            <ul>
              <li class='has-sub '><a href='/code/plantillas/ingreso_vuelos.php'><span>Vuelos</span></a></li>
              <li class='has-sub '><a href='/code/plantillas/ingreso_aviones.php'><span>Aviones</span></a></li>
              <li class='has-sub '><a href='/code/plantillas/ingreso_compania.php'><span>Compañia</span></a></li>                       
            </ul>
          </li>
          <li class='has-sub '><a href='#'><span>Consultas</span></a>
            <ul>
              <li class='has-sub '><a href='/code/plantillas/consulta_reserva.php'><span>Reserva</span></a></li>
              <li class='has-sub '><a href='/code/plantillas/consulta_pasajero.php'><span>Pasajero</span></a></li>
              <li class='has-sub '><a href='/code/plantillas/consulta_aeropuertos.php'><span>Aeropuertos</span></a></li>                        
              <li class='has-sub '><a href='/code/plantillas/consulta_ciudad.php'><span>Ciudad</span></a></li>
              <li class='has-sub '><a href='/code/plantillas/consulta_departamento.php'><span>Departamento</span></a></li>

            </ul>
          </li>
          <li class='has-sub '><a href='#'><span>Consultas Avion</span></a>
            <ul>
              <li class='has-sub '><a href='/code/plantillas/consulta_vuelos.php'><span>Vuelos</span></a></li>
              <li class='has-sub '><a href='/code/plantillas/consulta_aviones.php'><span>Aviones</span></a></li>
              <li class='has-sub '><a href='/code/plantillas/consulta_compania.php'><span>Compañia</span></a></li>                       
            </ul>
          </li>
          <li class='has-sub '><a href='#'><span>Usuario</span></a>
            <ul class="">
              <li><a href="#">id: <?php echo $ii; ?> </a></li>
              <li><a href="#">usuario: <?php echo $uu; ?>  </a></li>
              <li><a href="#">email:<?php echo $ee; ?> </a></li>

              <li ><a href="/code/plantillas/logOut.php">Salir</a></li>

            </ul>
          </li>

        </ul>

                <!---<li><a href='#'><span>Acerca De</span></a></li>
                    <li><a href='#'><span>Contactenos</span></a></li>
                <ul>

                   <li><a href="#">Inicio</a></li>
                   <li><a href="#">Productos</a></li>
                   <li><a href="#">Contacto</a></li>
                   <li><a href="#">Nosotros</a></li>
               </ul>
              <ul>
                   <li><a href="#">Inicio</a></li>
                   <li><a href="#">Productos</a></li>
                   <li><a href="#">Contacto</a></li>
                   <li><a href="#">Nosotros</a></li>
               </ul>
               
               <ul>
                   <li class='active '><a href='index.html'><span>Home</span></a></li>
                   <li class='has-sub '><a href='#'><span>Products</span></a>
                       <ul>
                           <li class='has-sub '><a href='#'><span>Product 1</span></a></li>
                           <li class='has-sub '><a href='#'><span>Product 2</span></a></li>
                           <li class='has-sub '><a href='#'><span>Product 2</span></a></li>
                           <li class='has-sub '><a href='#'><span>Product 1</span></a></li>
                           <li class='has-sub '><a href='#'><span>Product 2</span></a></li>
                           <li class='has-sub '><a href='#'><span>Product 2</span></a></li>
                       </ul>
                   </li>
                   <li><a href='#'><span>About</span></a></li>
                   <li><a href='#'><span>Contact</span></a></li>
                 </ul>-->


               </section>
             </nav>

             <?php
       # code...
           }elseif ($rol=="2") {
    # code...

            ?>


            <nav>
              <section id='cssmenu' class="contenedor">

                <ul>
                  <li class='active '><a href='inicio.php'><span>Inicio</span></a></li>
                  <li class='has-sub '><a href='#'><span>Ingresar</span></a>
                    <ul>
                      <li class='has-sub '><a href='/code/plantillas/ingreso_reserva.php'><span>Reserva</span></a></li>
                      <li class='has-sub '><a href='/code/plantillas/ingreso_pasajero.php'><span>Pasajero</span></a></li>
                      <li class='has-sub '><a href='/code/plantillas/ingreso_aeropuertos.php'><span>Aeropuertos</span></a></li>                        
                      <li class='has-sub '><a href='/code/plantillas/ingreso_ciudad.php'><span>Ciudad</span></a></li>
                      <li class='has-sub '><a href='/code/plantillas/ingreso_departamento.php'><span>Departamento</span></a></li>

                    </ul>
                  </li>
                  <li class='has-sub '><a href='#'><span>Ingreso Avion</span></a>
                    <ul>
                      <li class='has-sub '><a href='/code/plantillas/ingreso_vuelos.php'><span>Vuelos</span></a></li>
                      <li class='has-sub '><a href='/code/plantillas/ingreso_aviones.php'><span>Aviones</span></a></li>
                      <li class='has-sub '><a href='/code/plantillas/ingreso_compania.php'><span>Compañia</span></a></li>                       
                    </ul>
                  </li>
                  <li class='has-sub '><a href='#'><span>Consultas</span></a>
                    <ul>
                      <li class='has-sub '><a href='/code/plantillas/consulta_reserva.php'><span>Reserva</span></a></li>
                      <li class='has-sub '><a href='/code/plantillas/consulta_pasajero.php'><span>Pasajero</span></a></li>
                      <li class='has-sub '><a href='/code/plantillas/consulta_aeropuertos.php'><span>Aeropuertos</span></a></li>                        
                      <li class='has-sub '><a href='/code/plantillas/consulta_ciudad.php'><span>Ciudad</span></a></li>
                      <li class='has-sub '><a href='/code/plantillas/consulta_departamento.php'><span>Departamento</span></a></li>

                    </ul>
                  </li>
                  <li class='has-sub '><a href='#'><span>Consultas Avion</span></a>
                    <ul>
                      <li class='has-sub '><a href='/code/plantillas/consulta_vuelos.php'><span>Vuelos</span></a></li>
                      <li class='has-sub '><a href='/code/plantillas/consulta_aviones.php'><span>Aviones</span></a></li>
                      <li class='has-sub '><a href='/code/plantillas/consulta_compania.php'><span>Compañia</span></a></li>                       
                    </ul>
                  </li>
                  <li class='has-sub '><a href='#'><span>Consultas Avion</span></a>
                    <ul class="">
                      <li><a href="#">id: <?php echo $ii; ?> </a></li>
                      <li><a href="#">usuario: <?php echo $uu; ?>  </a></li>
                      <li><a href="#">email:<?php echo $ee; ?> </a></li>

                      <li ><a href="logOut.php">Salir</a></li>

                    </ul>
                  </li>
                  
                </ul>

                <!---<li><a href='#'><span>Acerca De</span></a></li>
                    <li><a href='#'><span>Contactenos</span></a></li>
                <ul>

                   <li><a href="#">Inicio</a></li>
                   <li><a href="#">Productos</a></li>
                   <li><a href="#">Contacto</a></li>
                   <li><a href="#">Nosotros</a></li>
               </ul>
              <ul>
                   <li><a href="#">Inicio</a></li>
                   <li><a href="#">Productos</a></li>
                   <li><a href="#">Contacto</a></li>
                   <li><a href="#">Nosotros</a></li>
               </ul>
               
               <ul>
                   <li class='active '><a href='index.html'><span>Home</span></a></li>
                   <li class='has-sub '><a href='#'><span>Products</span></a>
                       <ul>
                           <li class='has-sub '><a href='#'><span>Product 1</span></a></li>
                           <li class='has-sub '><a href='#'><span>Product 2</span></a></li>
                           <li class='has-sub '><a href='#'><span>Product 2</span></a></li>
                           <li class='has-sub '><a href='#'><span>Product 1</span></a></li>
                           <li class='has-sub '><a href='#'><span>Product 2</span></a></li>
                           <li class='has-sub '><a href='#'><span>Product 2</span></a></li>
                       </ul>
                   </li>
                   <li><a href='#'><span>About</span></a></li>
                   <li><a href='#'><span>Contact</span></a></li>
                 </ul>-->


               </section>
             </nav>


             <?php 

           }

           ?>
