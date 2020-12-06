<?php
    $Nombre_Usuario = $_POST["nombre"];
    $Correo_Usuario = $_POST["email"];

    function Consulta($Consulta){
        $Conexion = mysqli_connect("localhost","root","","prograweb");
        /* Verificar conexión */
        if(!$Conexion)
            die("Fallo en la conexion al servidor " . mysqli_connect_error());

        $Respuesta = mysqli_query($Conexion,$Consulta);
        
        mysqli_close($Conexion);
        return $Respuesta;
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.css">
    <script src="https://kit.fontawesome.com/b05dfbb384.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="checausr.js"></script>
    <title>Envio de informaci&oacute;n</title>
</head>
<body>
    <section class="hero is-primary">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">Universisdad de Colima</h1>
                <h2 class="subtitle">Facultad de Telemática</h2>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="colums is-centered mt-5">
            <div class="column has-text-centered">
                <h1 class="title">Control de usuario</h1>

                <?php
                    $Usuario_Valido = Consulta('SELECT usuarios.login FROM usuarios WHERE usuarios.login = "' .$Nombre_Usuario . '"');
                    if($Usuario_Valido){
                        echo "
                            <div class='level'>
                                <div class='level-left'></div>
                                <div class='level-right'><p class='level-item'><a id='Agregar' class='button is-success'>Agregar usuario</a></p></div>
                            </div>
                            
                            <table class='table is-fullwidth'>
                                <thead>
                                    <th><strong><abbr title='Id'>#</abbr></strong></th>
                                    <th><strong>Nombre</strong></th>
                                    <th><strong>Correo</strong></th>
                                    <th><strong>Login</strong></th>
                                    <th><strong>Acciones</strong></th>
                                </thead>
                                <tbody>                    
                        ";
                        $Lista_Usuarios = Consulta('SELECT id, nombre, correo, usuarios.login FROM usuarios');
                        while($Fila = mysqli_fetch_assoc($Lista_Usuarios)){
                            echo "
                                <tr>
                                    <th>".$Fila['id']."</th>
                                    <td>".$Fila['nombre']."</td>
                                    <td>".$Fila['correo']."</td>
                                    <td>".$Fila['login']."</td>
                                    <td><button class='button is-info mx-1'>Editar</button><button class='button is-danger mx-1'>Borrar</button>
                                </tr>
                            ";
                        }
                        echo "</tbody></table>";
                    }else{
                        echo "
                            <h2 class='subtitle'>El usuario no existe</h2>
                            <button class='button is-info' action='index.php'>Regresar</button>
                        ";
                    }
                    ?>
            </div>
        </div>
    </section>

    <div id="Form_Agregar" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                    <p class="modal-card-title">Agregar usuario</p>
                <button class="delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <div class="field">
                    <label class="label">Nombre</label>
                    <div class="control">
                        <input type="text" class="input" placeholder="Nombre">
                    </div>
                </div>

                <div class="field">
                    <label class="label">Usuario</label>
                    <div class="control has-icons-left">
                        <input type="text" class="input" placeholder="Usuario">
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Contraseña</label>
                    <div class="control has-icons-left">
                        <input type="password" class="input" placeholder="Contraseña">
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                </div>

                <div class="field">
                    <label class="label">Correo</label>
                    <div class="control has-icons-left">
                        <input type="email" class="input" placeholder="Correo">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>
                </div>
            </section>

            <footer class="modal-card-foot">
                <button id="Agregar_Nuevo_Usuario" class="button is-info">Agregar usuario</button>
                <button id="Cancelar_Nuevo_Usuario" class="button is-info is-light">Cancelar</button>
            </footer>
            
        </div>
    </div>

    <footer class="footer">
    <div class="content has-text-centered">
        <p>
          <strong>&copy;Desarrollado</strong> por <a href="#">Emiliano Vázquez Banda</a>. 
        </p>
      </div>
    </footer>
     <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quos veniam inventore aliquid consequatur delectus, provident placeat tempora repellat fuga necessitatibus doloribus? Accusantium corrupti odit eum dolorem! Consequatur soluta voluptate quia.</p>           
</body>
</html>

    