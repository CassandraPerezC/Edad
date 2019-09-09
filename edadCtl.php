<!DOCTYPE html>
<html lang="es">
    <head>
        <title>Years progress</title>
                <meta charset="UTF-8">
        <link rel="stylesheet" href="css/estilos.css"> 
      
    </head>
    <body>
        <div id="agrupar">
            <header id="cabecera">
            </header>
            <nav id="menu">
            </nav>
            


<section id="seccion">
  <center>
   <h2 class="formulario">Progreso</h2>
     
        
           <table>
             <tr>
               <td>
                  <?php
                      include "Edad.php";
                      $alum=new Edad();
                      $alum->inicializar($_REQUEST['nacimiento'],$_REQUEST['actual']);
                      $alum->conectarBD();
                      $alum->insertarEdad();
                      $alum->operacion();
                      $alum->desconectarBD();               
            ?>

               </td>
             </tr>
           </table>



        
          
             
            
            
      
         </div>
      </form>
</center>
              </section>

            <aside id="columna">
                
            </aside>
            <footer id="pie">
                <small>
                &copy; Martha Cassandra Pérez Caravantes  
                </small>
            </footer>
        </div>
    
      </body>
    </html>