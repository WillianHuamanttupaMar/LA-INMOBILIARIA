<?php include '../extend/header.php'; ?>  

  <div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <span class="card-title">Alta de Usuarios</span>
          <form class="form" action="ins_usuarios.php" method="post"enctype="multipart/form-data">
            <div class="input-field">
              <input type="text" name="nick" required autofocus title="DEBE DE CONTENER ENTRE 8 A 15 CARACTERES, SOLO LETRAS" pattern="[A-Za-z]{8,15}"
              id="nick" onblur="may(this.value, this.id)">
              <label for="nick"> Nick:</label>
            </div>

            <div class="validacion"></div>

            <div class="input-field">
                <input type="password" name="pass1" title="CONTRASEÑA CON NUMEROS, LETRAS MAYUSCULAS Y MINUSCULAS ENTRE 8 Y 15 CARACTERES"
                pattern="[A-Za-z0-9]{8,15}" id="pass1" required>
                <label for="pass1">Contraseña:</label>
            </div>

            <div class="input-field">
                <input type="password" title="CONTRASEÑA CON NUMEROS, LETRAS MAYUSCULAS Y MINUSCULAS ENTRE 8 Y 15 CARACTERES"
                pattern="[A-Za-z0-9]{8,15}" id="pass2" required>
                <label for="pass2">Verificar Contraseña:</label>
            </div>

            <select name="nivel" required>
                <option value="" disabled selected>ELIGE UN NIVEL DE USUARIO</option>
                <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                <option value="ACESOR">ACESOR</option>
            </select>

            <div class="input-field">
                <input type="text" name="nombre" title="Nombre del Usuario" id="nombre" onblur="may(this.value, this.id)" required
                pattern="[A-Z/s]+">
                <label for="nombre">Nombre Completo de Usuario:</label>
            </div>

            <div class="input-field">
                <input type="email" name="correo" title="Correo Electronico" id="correo">
                <label for="correo">Correo Electronico:</label>
            </div>

            <div class="file-field input-field">
                <div class="btn">
                    <span>Foto:</span>
                    <input type="file" name="foto">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text">
                </div>
            </div>

<button type="submit" class="btn blue" id="btn_guardar">Guardar<i class="material-icons">send</i></button>
          </form>
        </div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col s12">
        <nav class="red lighten-3">
            <div class="nav-wrapper">
                <div class="input-field">
                    <input type="search" id="buscar" autocomplete="off" >
                    <label for="buscar"><i class="material-icons" >search</i></label>
                    <i class="material-icons ">close</i>
                </div>
            </div>
        </nav>
    </div>
  </div>


<?php $sel = $con->query("SELECT * FROM usuario");
$row = mysqli_num_rows($sel);
?>
<div class="row">
    <div class="col s12"> 
        <div class="card">
            <div class="card-content">
            <span class="card-title">Usuarios (<?php echo $row ?></span>
            <table>
                <thead>
                    <th>Nick</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Nivel</th>
                    <th>Foto</th>
                    <th>Bloqueo</th>
                    <th></th>
                    <th></th>
                </thead>
                <?php while($f = $sel->fetch_assoc()){ ?>
                    <tr>
                        <td><?php echo $f['nick'] ?></td>
                        <td><?php echo $f['nombre'] ?></td>
                        <td><?php echo $f['correo'] ?></td>
                        <td><?php echo $f['nivel'] ?></td>
                        <td><img src="<?php echo $f['foto'] ?>" width="50" class="circle"></td>
                        <td><?php echo $f['bloqueo'] ?></td>
                        <td></td>
                        <td></td>
                    </tr>
                <?php } ?>
            </table>
            </div>
        </div>
    </div>
  </div>

  <?php include '../extend/scripts.php'; ?> 
  <script src="../js/validacion.js"> </script>
  </body>
  </html>